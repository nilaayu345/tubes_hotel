@extends('layouts.app')

@section('title', "Show Kamar")

@push('css')
@endpush

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Tampil Kamar/Room</h2>
      </div>

      <div class="row text-center justify-content-center">
         <div class="col-md-9">
            <div class="card">
               <div class="row">
                  <div class="col-md-6">
                     <div class="card-body">

                     <img src="{{ asset('storage/' . $room->image_path )}}" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card-body">
                        <div class="input-group mb-3">
                           <input type="text" name="room_name" value="{{ $room->name }}" class="form-control" placeholder="Nama Kamar" readonly >
                        </div>
                        <div class="input-group-append mb-3">
                           <input type="text" name="price" value="{{ convertRupiah($room->price) }}" class="form-control" placeholder="Harga" readonly>
                        </div>
                        <div class="input-group mb-3">
                           <textarea name="description" class="form-control" placeholder="Deskripsi" rows="3" readonly>{{ $room->description }}</textarea>
                        </div>
                        <div class="row mb-3">
                           <div class="col-12">
                              <a class="btn btn-warning btn-block" href="{{ route('admin.room.index') }}">Kembali</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row justify-content-center mt-3">
         <div class="col-md-9">
            <div class="card">
               <div class="card-body">
                  <div class="text-center">
                     <h3 class="title_color">Daftar Fasilitas</h2>
                  </div>

                  <table class="table table-hover text-dark mt-3">
                     <thead>
                        <tr>
                           <th scope="col" width=20%>No</th>
                           <th scope="col" width=80%>Facility Name</th>
                        </tr>
                     </thead>
                     <tbody>

                        @foreach ($room->facility as $index => $facility)
                           <tr>
                              <th scope="row">{{ ++$index }}. </th>
                              <td>{{ $facility->facility_name }}</td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection