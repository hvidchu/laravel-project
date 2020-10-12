<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function edit(){
        $home = Home::find(1);
        if(empty($home)){
            return view('backend/home/edit');
        }else{
            return view('backend/home/edit',compact('home'));
        }
    }

    public function update(Request $request){
        if(!file_exists('uploads/home')){
            mkdir('uploads/home',0755,true);
        }

        $home = Home::find(1);
        if(empty($home)){
            $home = new Home;
            $fileName = 'default.jpg';
        }

        if($request->hasFile('image')){
            if($home->image != 'default.jpg'){
                @unlink('uploads/home'.$home->image);
                $file = file('image');
                $path = public_path().'/uploads/home/';
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move($path,$fileName);
            }
        }
        $home->content_1 = $request->input('content_1');
        $home->content_2 = $request->input('content_2');
        if($fileName){
            $home->image = $fileName;
        }

        $home->save();

        return redirect()->route('admin.home.edit');

    }
}
