<?php

use App\Http\Controllers\Backend\Access\Permission\PermissionController;
use App\Http\Controllers\Backend\Access\Permission\PermissionGroupController;
use App\Http\Controllers\Backend\Access\Role\RoleController;
use App\Http\Controllers\Backend\Access\User\UserController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Language\LanguageController;
use Arcanedev\LogViewer\Http\Controllers\LogViewerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/login', [FrontendController::class, 'login'])->name('frontend.login');

Route::group(['middleware' => 'web'], function () {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        // require(__DIR__ . '/Routes/Language/Language.php');
        Route::get('lang/{lang}', [LanguageController::class, 'swap']);
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        // require (__DIR__ . '/Routes/Frontend/Frontend.php');
        // require (__DIR__ . '/Routes/Frontend/Access.php');

        /**
         * Frontend Controllers
         */
        Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

        Route::post('submitResume', [FrontendController::class, 'submitResume'])->name('frontend.submit');

        Route::get('macros', [FrontendController::class, 'macros'])->name('frontend.macros');

        /**
         * These frontend controllers require the user to be logged in
         */
        Route::group(['middleware' => 'auth'], function () {
            Route::group(['namespace' => 'User'], function () {
                Route::get('dashboard', [DashboardController::class, 'index'])->name('frontend.user.dashboard');
                Route::get('profile/edit',  [ProfileController::class, 'edit'])->name('frontend.user.profile.edit');
                Route::post('profile/update', [ProfileController::class, 'update'])->name('frontend.user.profile.update');
            });
        });

        Route::get('update/password', function () {
            return "User Can Update Password";
        })->name('auth.password.change');
    });

    Route::get('logout', function () {
        Session::flush();

        Auth::logout();

        return redirect('/');
    })->name('auth.logout');
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    // require(__DIR__ . '/Routes/Backend/Dashboard.php');
    // require(__DIR__ . '/Routes/Backend/Access.php');
    // require(__DIR__ . '/Routes/Backend/LogViewer.php');

    Route::group([
        'prefix'     => 'access',
        'namespace'  => 'Access',
        'middleware' => 'access.routeNeedsPermission:view-access-management',
    ], function () {
        /**
         * User Management
         */
        Route::group(['namespace' => 'User'], function () {
            Route::resource('users', UserController::class, ['except' => ['show']]);

            Route::get('users/deactivated', [UserController::class, 'deactivated'])->name('admin.access.users.deactivated');
            Route::get('users/deleted', [UserController::class, 'deleted'])->name('admin.access.users.deleted');
            Route::get('account/confirm/resend/{user_id}', [UserController::class, 'resendConfirmationEmail'])->name('admin.account.confirm.resend');

            /**
             * Specific User
             */
            Route::group(['prefix' => 'user/{id}', 'where' => ['id' => '[0-9]+']], function () {
                Route::get('delete', [UserController::class, 'delete'])->name('admin.access.user.delete-permanently');
                Route::get('restore', [UserController::class, 'restore'])->name('admin.access.user.restore');
                Route::get('mark/{status}', [UserController::class, 'mark'])->name('admin.access.user.mark')->where(['status' => '[0,1]']);
                Route::get('password/change', [UserController::class, 'changePassword'])->name('admin.access.user.change-password');
                Route::post('password/change', [UserController::class, 'updatePassword']);
            });
        });

        /**
         * Role Management
         */
        Route::group(['namespace' => 'Role'], function () {

            Route::resource('roles', RoleController::class)->except([
                'show',
            ]);
        });

        /**
         * Permission Management
         */
        Route::group(['prefix' => 'roles', 'namespace' => 'Permission'], function () {

            Route::resource('permission-group', PermissionGroupController::class)->except([
                'index', 'show'
            ]);

            Route::resource('permissions', PermissionController::class)->except([
                'show',
            ]);

            Route::group(['prefix' => 'groups'], function () {
                Route::post('update-sort', [PermissionGroupController::class, 'updateSort'])->name('admin.access.roles.groups.update-sort');
            });
        });
    });

    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('admin.dashboard');

    Route::group([
        'prefix'     => 'log-viewer',
    ], function () {
        Route::get('/', [
            'as'   => 'log-viewer::dashboard',
            // 'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index',
            'uses' => [LogViewerController::class, 'index']
        ]);

        Route::group([
            'prefix' => 'logs',
        ], function () {
            Route::get('/', [
                'as'   => 'log-viewer::logs.list',
                'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs',
            ]);
            Route::delete('delete', [
                'as'   => 'log-viewer::logs.delete',
                'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete',
            ]);
        });

        Route::group([
            'prefix' => '{date}',
        ], function () {
            Route::get('/', [
                'as'   => 'log-viewer::logs.show',
                'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show',
            ]);
            Route::get('download', [
                'as'   => 'log-viewer::logs.download',
                'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download',
            ]);
            Route::get('{level}', [
                'as'   => 'log-viewer::logs.filter',
                'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel',
            ]);
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
