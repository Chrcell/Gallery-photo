<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('photo.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|required|image',
            'image_title' => 'required',
            'tag' => 'required',
            'description' => 'required',
        ]);

        // Mengambil file gambar dan memindahkannya ke direktori yang sesuai
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $slugimage = Str::slug($image->getClientOriginalName());
            $new_image = time() . '_' . $slugimage;
            $image->move('image/', $new_image);
        }

         // Membuat instansi Image dan menyimpan data
         $photo = new Photo;
         $photo->image = 'image/' . $new_image;
         $photo->image_title = $request->image_title;
         $photo->tag = $request->tag;
         $photo->description = $request->description;
         $photo->save();

        return redirect()->route('photo.dashboard')->with(['info' => $request->name . " Berhasil Upload!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
