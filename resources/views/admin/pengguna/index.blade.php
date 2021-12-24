@extends('layouts.app')

@section('title', "Pengguna")

@section('content')
   {{-- <h1 class="section_gap">acca</h1> --}}
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Pengguna</h2>
      </div>

      <div class="row">
         <div class="col md-3">
            <a href="{{ route('admin.pengguna.create') }}" class="genric-btn btn-primary radius">Tambah Pengguna</a>
         </div>
         <div class="col-md-3">
            <div class="input-group-icon">
               <form action="{{ route('admin.pengguna.index') }}" method="get">
                  <div class="icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                  <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" class="single-input border">
               </form>
            </div>
         </div>
      </div>
      <table class="table table-hover text-dark mt-3">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Phone</th>
               <th scope="col">Role</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
               <tr>
                  <th scope="row">{{ $number++ }}. </th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>
                     @foreach ($user->getRoleNames() as $role)
                        <span class="badge {{ $role == 'ADMIN' ? 'badge-primary' : 'badge-dark' }}">{{ $role }}</span>
                     @endforeach
                  </td>
                  <td>
                     <a href="{{ route('admin.pengguna.edit', ['id' => $user->id]) }}" class="genric-btn primary radius medium">Edit</a>
                  </td>
               </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <td colspan="6" align="center">
                  {{ $users->appends(Request::all())->links()}}
               </td>
            </tr>
         </tfoot>
      </table>
   </div>

@endsection