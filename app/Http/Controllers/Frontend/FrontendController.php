<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        return view('frontend.index');
    }

    public function submitResume(Request $request)
    {

        try {
            if ($request->hasFile('file')) {
                $file = $request->file;
                $destinationPath = 'uploads/resumes';
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $url = $destinationPath . '/' . $fileName;
                $upload_success = $file->move($destinationPath, $fileName);

                $data = Resume::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'state' => $request->state,
                    'postcode' => $request->postcode,
                    'date_of_birth' => $request->date_of_birth,
                    'file' => $url
                ]);

                return redirect("/")->withFlashSuccess("Your Resume has been submitted successfully");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withError("Error Saving file, Please check file and try again");
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
