@extends('layouts.app')

@section('title', "Edit Pengguna")

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Edit Pengguna</h2>
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
                  
                  <form action="{{ route('admin.pengguna.update', ['id' => $user->id]) }}" method="POST">
                     @csrf
                     @method('put')
                     <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" autofocus="on" autocomplete="off" required value="{{ $user->email }}" readonly>
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama" autofocus="on" autocomplete="off" required value="{{ $user->name }}">
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" autofocus="on" autocomplete="off" required value="{{ $user->phone }}">
                     </div>
                     <div class="form-group mb-3">
                        @php
                           $roles = Spatie\Permission\Models\Role::all();
                        @endphp
                        
                        <select class="form-control" name="role">
                           <option selected disabled>Select Role</option>
                           @foreach ($roles as $role)
                              <option value="{{ $role->name }}" {{ $user->getRoleNames()->first() == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                        <div class="">
                           <small class="text-danger d-block float-left">* Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                     </div>
                     <div class="row mt-5 mb-3">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-success btn-block" style="cursor: pointer">Simpan Perubahan</button>
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