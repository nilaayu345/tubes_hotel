@extends('layouts.app')

@section('title', "Facility")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Facility</h2>
      </div>

      <div class="row">
         <div class="col md-3">
            <a href="{{ route('admin.facility.create') }}" class="genric-btn btn-primary radius">Tambah Fasilitas</a>
         </div>
         <div class="col-md-3">
            <div class="input-group-icon">
               <form action="{{ route('admin.facility.index') }}" method="get">
                  <div class="icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                  <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" class="single-input border">
               </form>
            </div>
         </div>
      </div>
      <table class="table table-hover text-dark mt-3">
         <thead>
            <tr>
               <th scope="col" width=10%>No</th>
               <th scope="col" width=70%>Facility Name</th>
               <th scope="col" width=20%>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($facilities as $facility)
               <tr>
                  <th scope="row">{{ $number++ }}. </th>
                  <td>{{ $facility->facility_name }}</td>
                  <td>
                     <a href="{{ route('admin.facility.edit', ['id' => $facility->id]) }}" class="genric-btn primary radius medium">Edit</a>
                     <a href="{{ route('admin.facility.delete', ['id' => $facility->id]) }}" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" class="genric-btn danger radius medium">Delete</a>
                  </td>
               </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <td colspan="3" align="center">
                  {{ $facilities->appends(Request::all())->links()}}
               </td>
            </tr>
         </tfoot>
      </table>
   </div>

@endsection