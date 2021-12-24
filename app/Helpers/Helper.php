<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


   if (!function_exists('numberPagination')) {
      /**
       * menampilkan nomer urut dalam tabel walaupun dalam bentuk pagination
      *
      * @param [integer] $paginationNumber
      * @return void
      */
      function numberPagination($paginationNumber)
      {
         $number = 1;

         if (request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $paginationNumber;
         }

         return $number;
      }
   }

   if (!function_exists('uploadImage')) {
      /**
       * Upload gambar dengan ukuran custom (width dan height nya dapat ditentukan)
      *
      * @param [string] $file
      * @param [int] $width
      * @param [int] $height
      * @param [string] $name
      * @param [string] $location
      * @return void
      */
         
      function uploadImage($file, $width, $height, $name, $location)
      {
         $images = Str::slug($name) . time() . '.' . $file->getClientOriginalExtension();
         $path = storage_path('app/public/' . $location); // otomatis masuk ke folder storage

         if (!File::isDirectory($path))
         {
            File::makeDirectory($path, 0777, true, true);
         }
         Image::make($file)->resize($width, $height)->save($path . '/' . $images);
         return $location . '/' . $images;
      }
   }

   if (!function_exists('uploadOriginalImage')) {
      /**
       * Upload gambar dengan ukuran original/sesuai file yang diupload
      *
      * @param [string] $file
      * @param [string] $name
      * @param [string] $location
      * @return void
      */
      function uploadOriginalImage($file, $name, $location)
      {
         $images = Str::slug($name) . time() . '.' . $file->getClientOriginalExtension();
         $path = storage_path('app/public/' . $location); // otomatis masuk ke folder storage

         if (!File::isDirectory($path))
         {
            File::makeDirectory($path, 0777, true, true);
         }
         Image::make($file)->save($path . '/' . $images);
         return $location . '/' . $images;
      }
   }

   if (!function_exists('convertRupiah')) {
      /**
       * mengkonversi nomer/nilai uang menjadi nilai rupiah
      *
      * @param [int] $value
      * @return void
      */
      function convertRupiah($value)
      {
         return 'Rp. '. number_format($value, 0, ",", ".");  
      }
   }
?>