<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DownloadController extends Controller
{
    public function downfunc(){
        $downloads=DB::table('downloadpdf')->get();
        $user=User::all();
    	return view('download.viewfile',compact('downloads', 'user'));
    }
}
