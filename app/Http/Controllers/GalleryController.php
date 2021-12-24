<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGallery()
    {
        $galleries = Gallery::all();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGallery()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGallery(Request $request)
    {
        $gambar = $request->file('gambar');

        if ($gambar) {
            $image_path = uploadOriginalImage($gambar, "image", "gallery");
        } else {
            $image_path = "NO IMAGE";
        }

        Gallery::create([
            "path" => $image_path
        ]);

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editGallery($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $gambar = $request->file('gambar');
        
        if ($gambar) {
            if ($gallery->path && file_exists(storage_path('app/public/' . $gallery->path)))
            {
                Storage::delete('public/' . $gallery->path);
            }

            $image_path = uploadOriginalImage($gambar, "image", "gallery");
            $gallery->path = $image_path;
        }

        $gallery->save();

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyGallery($id)
    {
        $gallery = Gallery::find($id);
        
        if ($gallery) {
            if ($gallery->path != "NO IMAGE" && file_exists(storage_path('app/public/' . $gallery->path))) {
                Storage::delete('public/' . $gallery->path);
            }

            $gallery->delete();
        }

        return redirect()->route('admin.gallery.index');
    }
}
