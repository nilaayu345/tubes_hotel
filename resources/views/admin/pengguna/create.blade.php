@extends('layouts.app')

@section('title', "Pengguna")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Tambah Pengguna</h2>
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
                  
                  <form action="{{ route('admin.pengguna.store') }}" method="POST">
                     @csrf
                     <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>                        
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" autofocus="on" autocomplete="off" required>
                     </div>
                     <div class="form-group mb-3">
                        @php
                           $roles = Spatie\Permission\Models\Role::all();
                        @endphp
                        <select class="form-control" name="role">
                           <option selected disabled>Select Role</option>
                           @foreach ($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row mb-3">
                        <div class="col-12">
                           <button type="submit" class="btn btn-success btn-block">Simpan</button>
                           <a class="btn btn-warning btn-block" href="{{ route('admin.pengguna.index') }}">Kembali</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
@endsection