@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Welcome To</h6>
                <h2>ROYAL HOTEL</h2>
                <p>Royal Hotel can make your holiday very colorful and memorable<br> Royal Hotel berada di Jalan Hayam Wuruk No.60 Tuban, Jawa Timur, Indonesia.</p>
                <a href="#" class="btn theme_btn button_hover">Get Started</a>
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->

<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Hotel Accomodation</h2>
        </div>
        <div class="row mb_30">
            @foreach ($rooms as $room)
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('storage/' . $room->image_path) }}" alt="" class="img-fluid">
                        <a href="{{ route('booking-room', ['slug' => $room->slug_room]) }}" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="{{ route('booking-room', ['slug' => $room->slug_room]) }}"><h4 class="sec_h4">{{ $room->name }}</h4></a>
                    <h5>{{ convertRupiah($room->price) }}<small>/night</small></h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="pb-5 text-center">
    {{ $rooms->appends(Request::all())->links()}}
</div>
<!--================ Accomodation Area  =================-->

<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Royal Facilities</h2>
            <p>Ini adalah beberapa Fasilitas yang ada di Royal Hotel</p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restaurant</h4>
                    <p>Restoran di Royal Hotel menyediakan berbagai macam menu masakan makanan Asia dan makanan barat</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports CLub</h4>
                    <p>Sport Club di Royal Hotel sangaat luas. Customer bisa mencobanya kapan saja karena buka 24 jam</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool</h4>
                    <p>Royal Hotel menyediakan kolam renang pribadi atau kolam renang umum yang dapat digunakan kapan saja</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                    <p>Jika kita tidak membawa kendaraan untuk jalan-jalan, Royal Hotel juga menyediakan rent a car untuk bisa kita sewa</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                    <p>Royal Hotel juga memiliki museum yang bisa di kunjungi oleh wisatawan yang berkunjung disana</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                    <p>Bar disini sering dikunjungi oleh anak muda hingga orang tua hanya untuk iseng</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Facilities Area  =================-->
<p style="padding: 100px 0px"></p>
@endsection