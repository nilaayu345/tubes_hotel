@extends('layouts.app')

@section('title', "Pengguna")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Tambah Gambar</h2>
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
                  
                  <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="input-group mb-3">
                        <input type="file" name="gambar" class="form-control">
                     </div>
                     <div class="row mb-3">
                        <div class="col-12">
                           <button type="submit" class="btn btn-success btn-block">Simpan</button>
                           <a class="btn btn-warning btn-block" href="{{ route('admin.gallery.index') }}">Kembali</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
@endsection