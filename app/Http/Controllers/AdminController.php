<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function daftar()
    {
        return view('admin.daftar');
    }


    public function addengineer(Request $request)
    {
        // $engineer = new User();
        // $engineer->name=$request->name; 
        // $engineer->email=$request->email;
        // $engineer->password=Hash::make($request->password);
        // $engineer->usertype='engineer';
        // $engineer->save();
        // return redirect()->back()->with('message','Engineer has been added');


        $engineer = new Engineer();
        $engineer->name=$request->name; 
        $engineer->email=$request->email;
        $engineer->password=Hash::make($request->password);
        $engineer->save();
        return redirect()->back()->with('message','Engineer has been added');



    }

    public function engineerlist()
    {
        $engineer = Engineer::all();
        return view('admin.engineerlist',compact('engineer'));
    }

    public function deleteengineer($id)
    {
        $engineer = Engineer::find($id);
        $engineer->delete();
        return redirect()->back();
    }

    public function updateengineer($id)
    {
        $engineer = Engineer::find($id);
        return view('admin.updateengineer',compact('engineer'));

    }

    public function editengineer(Request $request, $id)
    {
        $engineer = Engineer::find($id);
        $engineer->name=$request->name;
        $engineer->email=$request->email;
        $engineer->password=Hash::make($request->password);
        $engineer->save();
        return redirect()->back()->with('message','Engineer Details Updated Successfully');
        

    }
}
