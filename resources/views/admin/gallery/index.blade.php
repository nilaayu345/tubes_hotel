@extends('layouts.app')

@section('title', "Gallery")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Gallery</h2>
      </div>

      <div class="row">
         <div class="col-md-12 mb-2">
            <a href="{{ route('admin.gallery.create') }}" class="genric-btn btn-primary radius">Tambah Gambar</a>
         </div>

         @foreach ($galleries as $gallery)
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body">
                     <img src="{{asset('storage/' . $gallery->path)}}" class="img-fluid">

                     <div class="row mt-3">
                        <div class="col-12">
                           <div class="text-center">
                              <form action="" method="post">
                                 <a href="{{ route('admin.gallery.edit', ['id' => $gallery->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                 <a href="{{ route('admin.gallery.delete', ['id' => $gallery->id]) }}" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" class="btn btn-danger btn-sm">Hapus</a>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach

      </div>
   </div>
@endsection