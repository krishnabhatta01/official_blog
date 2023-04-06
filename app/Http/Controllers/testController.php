<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class testController extends Controller
{
    public function create(Request $request)
    {
        return Tag::create([
            $validated = $request->validate([
                'tagName' => 'required|max:10',

            ]),

            'tagName' => $request->tagName,

        ]);
    }

    public function get()
    {
        return Tag::orderBy('id', 'desc')->get();
    }

    public function edit(Request $request)
    {
        return Tag::where('id', $request->id)->update([
            'tagName' => $request->tagName
        ]);
    }

    public function del(Request $request)
    {
        return Tag::where('id', $request->id)->delete();
    }

    public function upload(Request $request)
    {

        $name = time() . '.' . $request->file->extension();

        $request->file->move(public_path('uploads'), $name);

        return $name;
    }

    public function deleteImage(Request $request)
    {

        $file_path = $request->image;


        if (file_exists($file_path)) {

            @unlink($file_path); // then delete previous photo
        }

        
    }



    public function addCategory(Request $request)
    {
        return Category::create([
            $validated = $request->validate([
                'categoryName' => 'required',
                'iconImage' => 'required',

            ]),

            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage,

        ]);
    }

    public function getCategory()
    {
        return Category::orderBy('id', 'desc')->get();
    }

    public function editCategory(Request $request)
    {
        return Category::where('id', $request->id)->update([
            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage,


        ]);
    }
}
