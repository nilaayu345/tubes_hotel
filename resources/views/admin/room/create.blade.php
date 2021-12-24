@extends('layouts.app')

@section('title', "Tambah Kamar")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Tambah Kamar/Room</h2>
      </div>

      <div class="row text-center justify-content-center">
         <div class="col-md-5">
            <div class="card">
               <div class="card-body login-card-body">
                  <p class="login-box-msg">
                     @if (session()->has('error.alert'))
                        <div class="alert alert-danger alert-dismissible text-left">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              {{ session('error.alert') }}
                        </div>
                     @endif
                  </p>
                  
                  <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="input-group mb-3">
                        <input type="text" name="room_name" class="form-control" placeholder="Nama Kamar" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="input-group-append mb-3">
                        <input type="number" name="price" class="form-control" min="0" step="100" placeholder="Harga" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="input-group mb-3">
                        <textarea name="description" class="form-control" placeholder="Deskripsi" rows="3"></textarea>
                     </div>
                     <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" placeholder="Gambar">
                     </div>
                     <div class="row mb-3">
                        <div class="col-12">
                           <button type="submit" class="btn btn-success btn-block">Simpan</button>
                           <a class="btn btn-warning btn-block" href="{{ route('admin.room.index') }}">Kembali</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection