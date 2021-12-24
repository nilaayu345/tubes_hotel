@extends('layouts.app')

@section('title', $room->name)

@section('sub-title', 'booking')

{{-- Menambahkan tampilan breadcrumb --}}
@include('layouts.breadcrumb')

@push('css')
   <style>
      .room-name {
         font-size: 15px;
         color: black;
      }
      .room-price {
         font-size: 20px;
         color: black;

      }
   </style>
@endpush

@section('content')
<section class="accomodation_area section_gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <img src="{{ asset('storage/' . $room->image_path) }}" class="img-fluid" alt="">
         </div>
         <div class="col-lg-4">
            <div class="card">
               <div class="card-body">
                  <div class="text-center pb-3 pt-2">Reservation</div>

                  <div class="border p-2">
                     <p class="font-weight-bold text-center room-name">{{ $room->name }}</p>
                     <p class="font-weight-bold text-center room-price">{{ convertRupiah($room->price) }} 
                        <span class="font-weight-light" style="font-size: 10px">/night</span></p>
                  </div>

                  <label class="mt-2">Fasilitas</label>
                  <ul class="unordered-list">
                     @foreach ($room->facility as $facility)
                        <li>{{ $facility->facility_name }}</li>
                     @endforeach
                  </ul>

                  <div class="mt-5">
                     <form action="{{ route('booking-room-detail', ['slug' => $room->slug_room]) }}" method="post">
                        @csrf
                        <label for="room_booked">Jumlah Kamar</label>
                        <select name="room_booked" id="room_booked" class="form-control cursor-pointer">
                           @for ($i = 1; $i <= 10; $i++)
                              @if ($i == 1)
                                 <option value="{{ $i }}" selected>{{ $i }}</option>
                                 @continue
                              @endif
                              
                              <option value="{{ $i }}">{{ $i }}</option>
                              
                           @endfor
                        </select>

                        <button type="submit" class="btn btn-success btn-sm btn-block mt-2">Booking!</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection