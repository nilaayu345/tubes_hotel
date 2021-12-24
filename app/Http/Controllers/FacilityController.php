<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFacility(Request $request)
    {
        $jumlah_halaman = 5;

        $keyword = $request->get('search') ? $request->get('search') : '';

        $facilities = Facility::where("facility_name", "LIKE", "%$keyword%")->simplePaginate($jumlah_halaman);

        $number = numberPagination($jumlah_halaman);

        return view('admin.facility.index', compact('facilities', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFacility()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFacility(Request $request)
    {
        Facility::create([
            'facility_name' => $request->get('facility_name'),
        ]);

        return redirect()->route('admin.facility.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFacility($id)
    {
        $facility = Facility::find($id);
        return view('admin.facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFacility(Request $request, $id)
    {
        $facility = Facility::find($id);
        
        $facility->name = $request->get('facility_name');
        $facility->save();

        return redirect()->route('admin.facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFacility($id)
    {
        $facility = Facility::find($id);
        $facility->delete();

        return redirect()->route('admin.facility.index');
    }
}
