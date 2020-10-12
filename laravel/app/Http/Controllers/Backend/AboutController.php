<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function edit(){
        $about = About::find(1);
        if(empty($about)){
            return view('backend/about/edit');
        }else{
            return view('backend/about/edit',compact('about'));
        }
    }

    public function update(Request $request){
        if(!file_exists('uploads/about')){
            mkdir('uploads/about',0755,true);
        }

        $about = About::find(1);
        if(empty($about)){
            $about = new About;
            $fileName = 'default.jpg';
        }

        if($request->hasFile('image')){
            if($about->image != 'default.jpg'){
                @unlink('uploads/about/',$about->image);
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/uploads/home/';
                $file->move($path,$fileName);
            }
        }
        $about->content = $request->input('content');
        if($fileName){
            $about->image = $fileName;
        }

        $about->save();

        return redirect()->route('admin/about/edit');
    }
}
