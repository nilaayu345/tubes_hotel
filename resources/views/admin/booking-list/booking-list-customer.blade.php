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
                  <th scope="col">Nama Customer</th>
                  <th scope="col">Nama Kamar</th>
                  <th scope="col" width="10px">Jumlah Booking</th>
                  <th scope="col">Total</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($transactions as $transaction)
                  <tr>
                     <th scope="row">{{ $number++ }}. </th>
                     <td>{{ $transaction->users->name }}</td>
                     <td>{{ $transaction->rooms->name }}</td>
                     <td>{{ $transaction->total_room }}</td>
                     <td>{{ convertRupiah($transaction->total_price) }}</td>
                     <td>{{ date("d-M-Y H:i:s", strtotime($transaction->check_in)) }}</td>
                     <td>{{ date("d-M-Y H:i:s", strtotime($transaction->check_out)) }}</td>
                     <td>
                        @if ($transaction->status == 1)
                           <span class="badge badge-success">Booking Disetujui</span>
                        @elseif($transaction->status == 2)
                           <span class="badge badge-danger">Transaksi Dibatalkan</span>
                        @elseif ($transaction->status == 3)
                           <div class="btn-group">
                              <a href="{{ route('admin.booking-list.transaction-aggrement', ['id' => $transaction->id, 'type' => '1']) }}" 
                                 onclick="return confirm('Apakah anda yakin menyetujui transaksi ?')" class="btn btn-success btn-sm">Setuju</a>
                              <a href="{{ route('admin.booking-list.transaction-aggrement', ['id' => $transaction->id, 'type' => '2']) }}" 
                                 onclick="return confirm('Apakah anda yakin membatalkan transaksi ?')" class="btn btn-danger btn-sm">Batalkan</a>
                           </div>
                        @endif
                     </td>
                  </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="8" align="center">
                     {{ $transactions->appends(Request::all())->links()}}
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </section>
@endsection