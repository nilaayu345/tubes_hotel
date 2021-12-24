@extends('layouts.app')

@section('title', "Edit Pengguna")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Edit Fasilitas</h2>
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
                  
                  <form action="{{ route('admin.facility.update', ['id' => $facility->id]) }}" method="POST">
                     @csrf
                     @method('put')
                     <div class="input-group mb-3">
                        <input type="text" name="facility_name" value="{{ $facility->facility_name }}" class="form-control" placeholder="Nama Fasilitas" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="row mb-3">
                        <div class="col-12">
                           <button type="submit" class="btn btn-success btn-block">Simpan Perubahan</button>
                           <a class="btn btn-warning btn-block" href="{{ route('admin.facility.index') }}">Kembali</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection