@extends('layouts.app')

@section('title', 'Contact Us')

@section('sub-title', 'Contact Us')

{{-- Menambahkan tampilan breadcrumb --}}
@include('layouts.breadcrumb')

@section('content')
<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Tuban, Jawa Timur, Indonesia</h6>
                        <p>Royal Hotel</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">08 (560) 9865 562</a></h6>
                        <p>Buka 24 Jam</p>
                        <p>Senin - Minggu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">royalhotel@gmail.com</a></h6>
                        <p>Jika anda ingin bertanya silahkan lewat email</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
@endsection
