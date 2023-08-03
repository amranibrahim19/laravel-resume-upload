<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $downloads = DB::table('downloadpdf')->where('user_id', $user->id)->get();
        $resume = Resume::where('email', $user->email)->get();

        return view('frontend.user.dashboard', compact(
            'downloads',
            'user',
            'resume'
        ));
    }
}
