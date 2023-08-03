<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Access\User\User;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $user = Auth::user();
        return view('frontend.user.profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * @param  UserRepositoryContract         $user
     * @param  UpdateProfileRequest $request
     * @return mixed
     */
    public function update(UserRepositoryContract $user, Request $request)
    {

        User::where('email', $request->email)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('frontend.user.dashboard')->with('succes', 'Successfully Updated');
    }
}
