@extends('layouts.app')

@section('title', "Room")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Kamar/Room</h2>
      </div>

      <div class="row">
         <div class="col md-3">
            <a href="{{ route('admin.room.create') }}" class="genric-btn btn-primary radius">Tambah Kamar</a>
         </div>
         <div class="col-md-3">
            <div class="input-group-icon">
               <form action="{{ route('admin.room.index') }}" method="get">
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
               <th scope="col" width=20%>Room Name</th>
               <th scope="col" width=10%>Price</th>
               <th scope="col" width=40%>Description</th>
               <th scope="col" width=20%>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($rooms as $room)
               <tr>
                  <th scope="row">{{ $number++ }} </th>
                  <td><a href="{{ route('admin.room.show', ['id' => $room->id]) }}">{{ $room->name }}</a></td>
                  <td>{{ convertRupiah($room->price) }}</td>
                  <td>{{ $room->description }}</td>
                  <td>
                     <div class="btn-group-vertical btn-group-justified">
                        <a href="{{ route('admin.room.edit', ['id' => $room->id]) }}" class="genric-btn primary radius medium btn-block">Edit & Tambah Fasilitas</a>
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <td colspan="6" align="center">
                  {{ $rooms->appends(Request::all())->links()}}
               </td>
            </tr>
         </tfoot>
      </table>
   </div>

@endsection