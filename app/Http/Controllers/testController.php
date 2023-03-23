<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class testController extends Controller
{
    public function create(Request $request){
        return Tag::create([
             $validated = $request->validate([
                'tagName' => 'required|max:10',
               
             ]),

            'tagName' => $request->tagName,
           
        ]);
    }

    public function get(){
        return Tag::orderBy('id','desc')->get();
    }

    public function edit(Request $request)
    {
        return Tag::where('id',$request->id)->update([
            'tagName' =>$request->tagName
        ]);
       
    }

    public function del(Request $request){
        return Tag::where('id', $request->id)->delete();
    }

    public function upload(Request $request){

         $name = time().'.'.$request->file->extension();
 
         $request->file->move(public_path('uploads'), $name);

        return $name;
    }
}
