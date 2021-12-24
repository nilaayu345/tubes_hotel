@extends('layouts.app')

@section('title', 'Gallery')

@section('sub-title', 'gallery')

{{-- Menambahkan tampilan breadcrumb --}}
@include('layouts.breadcrumb')

@section('content')
<section class="gallery_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Royal Hotel Gallery</h2>
            <p>Selamat Datang di Gallery Royal Hotel</p>
            <p>Setiap minggu kami akan mengupdate Gallery Royal Hotel</p>
        </div>
        <div class="row imageGallery1" id="gallery">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 gallery_item">
                    <div class="gallery_img">
                        <img src="{{asset('storage/' . $gallery->path)}}" alt="">
                        <div class="hover">
                            <a class="light" href="{{asset('storage/' . $gallery->path)}}"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection