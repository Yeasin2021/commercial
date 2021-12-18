<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function indexDashborad()
    {
       
        return view('admin.partial.content.main');
    }

    public function userProfileView()
    {
        $profile = User::first();
        return view('admin.partial.content.user-profile',compact('profile'));
    }

    public function userProfileStoreData(Request $request)
    {
        try{
            $profile = User::find(auth()->user()->id);
            
            $filename = "";

            if($request->hasfile('photo')){
                $file = $request->file('photo');
                if($file->isValid()){
                    $extension = $file->getClientOriginalExtension();
                    $filename = date('Ymdhms').'.'.$extension;
                    $file->move('uploads/users/',$filename);
                }
                if (file_exists('uploads/users/'.$profile->photo))
                unlink('uploads/users/'.$profile->photo);
            }else{
                $filename = $profile->image;
            }
              
            $profile->update([
                'name' => $request->name,
                'photo' => $filename,
                'email' => $request->email,
                'description' => $request->description,
                'designation' => $request->designation,
            ]);
            toastr()->success("Congrats !!!! ");
            return redirect()->route('admin.dashboard');

        }catch(Exception $error){
            toastr()->error($error->getMessage());
            return redirect()->back();
        }

    }


}
