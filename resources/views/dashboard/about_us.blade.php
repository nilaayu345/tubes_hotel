@extends('layouts.app')

@section('title', 'About Us')

@section('sub-title', 'about')

{{-- Menambahkan tampilan breadcrumb --}}
@include('layouts.breadcrumb')

@section('content')
<!--================ About History Area  =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">Royal Hotel</h2>
                    <p>Royal Hotel yang berada di Tuban, Jawa Timur, Indonesia didirikan pada tahun 2019 bulan Juni terdiri dari 250 kamar. Seiring dengan perkembangan sektor MICE industry, hotel ini dilengkapi dengan ruang rapat yang telah mendukung konsep cyber meeting. Saat ini Royal Hotel Tuban, dikelola oleh perusahaannya sendiri dengan nama Royality Hotel Management. Royal Hotel ini snagat terkenal di Tuban dan sudah bintang 5. Presiden Joko Widodo juga pernah berkunjung di Royal Hotel ini.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="image/about_bg.jpg" alt="img">
            </div>
        </div>
    </div>
</section>
<!--================ About History Area  =================-->
@endsection
