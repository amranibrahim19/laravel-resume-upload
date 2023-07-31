<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use DB;

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
        $downloads = DB::table('downloadpdf')->get();
            
            return view('frontend.user.dashboard',compact('downloads'))->withUser(access()->user());
    }

    
}
