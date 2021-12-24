@extends('layouts.app')

@section('title', 'Status Pemesanan')

@section('sub-title', 'status pemesanan')

{{-- Menambahkan tampilan breadcrumb --}}
@include('layouts.breadcrumb')

@section('content')
   <section class="accomodation_area section_gap">
      <div class="container">
         {{-- <div class="row"> --}}
            
         {{-- </div> --}}
         <table class="table table-hover text-dark">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Kamar</th>
                  <th scope="col" width=20px>Jumlah Booking</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">Status/Note</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($transactions as $transaction)
                  <tr>
                     <th scope="row">{{ $number++ }}. </th>
                     <td>{{ $transaction->rooms->name }}</td>
                     <td>{{ $transaction->total_room }}</td>
                     <td>{{ convertRupiah($transaction->total_price) }}</td>
                     <td>{{ date("d-M-Y H:i:s", strtotime($transaction->check_in)) }}</td>
                     <td>{{ date("d-M-Y H:i:s", strtotime($transaction->check_out)) }}</td>
                     <td>
                        @if ($transaction->status == 1)
                           <span class="badge badge-success">Booking Berhasil!</span>
                        @elseif($transaction->status == 2)
                           <span class="badge badge-danger">Booking Gagal!</span>
                        @else
                           <span class="badge badge-info">Proses Verifikasi</span>
                        @endif
                     </td>
                     <td align="center">
                        @if ($transaction->status == 1)
                           <a href="{{ route('booking-print', ['id' => $transaction->id]) }}" title="Print Bukti Pembayaran"><span class="fa fa-print"></span></a>
                        @else
                        -
                        @endif
                     </td>
                  </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="6" align="center">
                     {{-- {{ $users->appends(Request::all())->links()}} --}}
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </section>
@endsection