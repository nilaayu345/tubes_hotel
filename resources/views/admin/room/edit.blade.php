@extends('layouts.app')

@section('title', "Edit Kamar")

@push('css')
@endpush

@section('content')
   <div class="container section_gap">
      <div class="mb-5 text-center">
         <h2 class="title_color">Edit Kamar/Room</h2>
      </div>

      <form action="{{ route('admin.room.update', ['id' => $room->id]) }}" method="post" enctype="multipart/form-data">
         @csrf
         @method('put')
         <div class="row justify-content-center">
            <div class="col-md-9">
               <div class="card">
                  <div class="card-body login-card-body" >
                     <div class="row text-center justify-content-center">
                        <div class="col-md-6">
                           <img src="{{ asset('storage/' . $room->image_path )}}" class="img-fluid">
                           <input type="file" name="image" class="form-control mt-2">
                           <small class="text-danger d-block float-left">* Kosongkan kalau tidak ingin mengubah gambar</small>

                        </div>
                        <div class="col-md-6">
                           <div class="input-group mb-3">
                              <input type="text" name="room_name" value="{{ $room->name }}" class="form-control" placeholder="Nama Kamar" required >
                           </div>
                           <div class="input-group-append mb-3">
                              <input type="number" name="price" value="{{ $room->price }}" class="form-control" placeholder="Harga" required>
                           </div>
                           <div class="input-group mb-3">
                              <textarea name="description" class="form-control" placeholder="Deskripsi" rows="3" required>{{ $room->description }}</textarea>
                           </div>
                           <div class="row mb-3">
                              <div class="col-12">
                                 <button type="submit" class="genric-btn info radius medium btn-block">Simpan Perubahan</button>
                                 <a class="genric-btn warning radius medium btn-block" href="{{ route('admin.room.index') }}">Kembali</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>

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
                           <th scope="col" width=10%>No</th>
                           <th scope="col" width=70%>Facility Name</th>
                           <th scope="col" width=20%>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $status = false; @endphp

                        @foreach ($facilities as $facility)

                        @for ($i = 0; $i < $room->facility->count(); $i++)
                           @if ($room->facility[$i]->pivot->facility_id == $facility->id)
                              @php $status = true; @endphp
                              @break
                           @endif
                        @endfor

                           <tr>
                              <th scope="row">{{ $number++ }}. </th>
                              <td>{{ $facility->facility_name }}</td>
                              <td>
                                 @if ($status)
                                    <a href="{{ route('admin.room.process-facility', ['id' => $room->id, 'facility_id' => $facility->id, 'type' => 'delete']) }}" class="genric-btn danger radius medium btn-block">Hapus</a>

                                 @else
                                    <a href="{{ route('admin.room.process-facility', ['id' => $room->id, 'facility_id' => $facility->id, 'type' => 'add']) }}" class="genric-btn info radius medium btn-block">Tambah</a>
                                 @endif
         
                                 @php $status = false; @endphp
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
            </div>
         </div>
      </div>
   </div>
@endsection