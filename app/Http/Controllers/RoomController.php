<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Facility;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRoom(Request $request)
    {
        $jumlah_halaman = 5;

        $keyword = $request->get('search') ? $request->get('search') : '';

        $rooms = Room::where("name", "LIKE", "%$keyword%")->simplePaginate($jumlah_halaman);

        $number = numberPagination($jumlah_halaman);

        // dd($rooms->find(2)->facility);

        return view('admin.room.index', compact('rooms', 'number'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoom($id)
    {
        $room = Room::find($id);

        return view('admin.room.show', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRoom()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRoom(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            $image_path = uploadOriginalImage($image, "room", "room");
        } else {
            $image_path = "NO IMAGE";
        }

        Room::create([
            'name' => $request->get('room_name'),
            'slug_room' => Str::slug($request->get('room_name')),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'image_path' => $image_path,
        ]);

        return redirect()->route('admin.room.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRoom($id)
    {
        $jumlah_halaman = 5;
        $room = Room::find($id);

        $number = numberPagination($jumlah_halaman);
        $facilities = Facility::simplePaginate($jumlah_halaman);

        return view('admin.room.edit', compact('room', 'facilities', 'number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoom(Request $request, $id)
    {
        // dd($request->all(), $request->file(), $id);

        $room = Room::find($id);
        
        $room->name = $request->get('room_name');
        $room->slug_room = Str::slug($request->get('room_name'));
        $room->price = $request->get('price');
        $room->description = $request->get('description');

        $gambar = $request->file('image');
        
        if ($gambar) {
            if ($room->image_path && file_exists(storage_path('app/public/' . $room->image_path)))
            {
                Storage::delete('public/' . $room->image_path);
            }

            $image_path = uploadOriginalImage($gambar, "room", "room");
            $room->image_path = $image_path;
        }

        $room->save();

        return redirect()->route('admin.room.index');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function processRoomFacility(Request $request, $id, $facility_id)
    {
        $type = $request->get('type');

        $room = Room::findOrFail($id);

        // jika tipenya 'ADD'
        if ($type == 'add') {
            $room->facility()->attach($facility_id); // tambah relasi/fasilitas kamar

            return redirect()->back();
        } else if (($type == 'delete')) {
            $room->facility()->detach($facility_id); // hapus relasi/fasilitas kamar

            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
