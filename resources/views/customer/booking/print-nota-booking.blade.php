<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Nota Booking</title>
   <style>
      @page {
         /* margin: 0cm 0cm; */
         size: 10cm 8.25cm potrait;
      }
      
      header {
         position: fixed;
         top: 0cm;
         left: 0cm;
         right: 0cm;
         height: 3cm;
      }

      footer {
         position: fixed;
         bottom: 0cm;
         left: 0cm;
         right: 0cm;
         height: 1cm;
      }

      html,
      body {
         padding: 0;
         margin: 0;
         font-size: 15px;
      }
      body{
         font-family: Arial, Helvetica, sans-serif;
         /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
         /* margin-top: 4.6cm;
         margin-bottom: 1.2cm; */
      }
      
      ul {
         /* display: inline-block; */
         width: 70%;
         margin: auto;
         text-align: left;
      }

      table {
         border-collapse: collapse;
         border: none;
         width: 100%;
      }

      table td,th {
         border: 1px solid black;
      }

      .page-break {
         page-break-after: always;
      }

      .top-title {
         text-align: center;
         font-size: 20px;
         margin: 10px;
         font-weight: bolder;
      }

      .sub-title-body {
         color: #666666;
         font-size: 9px;
      }

      .title-body {
         font-size: 15px;
         font-weight: bolder;
      }

      .sub-body {
         font-size: 12px;
         font-weight: bolder;
      }
   </style>
</head>
<body>
   <div style="margin: 10px">
      <div class="top-title">
         Data Pemesanan
      </div>
      <hr>
      <div>
         <small class="sub-title-body">Nama</small>
         <div class="title-body">{{ strtoupper($transaction->users->name) }}</div>
      </div>

      <table style="margin-top: 10px;">
         <tr>
            <td style="border: none; width: 40%">
               <small class="sub-title-body">Check In</small>
               <div class="sub-body">{{ date("d-M-Y H:i:s", strtotime($transaction->check_in)) }}</div>
            </td>
            <td style="border: none; width: 40%">
               <small class="sub-title-body">Check Out</small>
               <div class="sub-body">{{ date("d-M-Y H:i:s", strtotime($transaction->check_out)) }}</div>
            </td>
            <td style="border: none; width: 20%">
               <small class="sub-title-body">Durasi</small>
               <div class="sub-body">{{ $transaction->total_room }} Malam</div>
            </td>
         </tr>
      </table>
      <hr>

      <div style="border: solid #757575 3px; padding: 5px">
         <small>Detail Transaksi</small>

         <table style="margin-top: 10px; border: 1px">
            <tr>
               <td style="border: none; width: 30%; padding: 5px 0">
                  <small style="font-size: 10px">Nama Hotel</small>
               </td>
               <td style="border: none; width: 70%;">
                  <div class="sub-body"><span>: </span>{{ strtoupper($transaction->rooms->name) }}</div>
               </td>
            </tr>
            <tr>
               <td style="border: none; width: 30%; padding: 5px 0">
                  <small style="font-size: 10px"> Jumlah Harga</small>
               </td>
               <td style="border: none; width: 70%;">
                  <div class="sub-body"><span>: </span>{{ convertRupiah($transaction->rooms->price) }}</div>
               </td>
            </tr>
            <tr>
               <td style="border: none; width: 30%; padding: 5px 0">
                  <small style="font-size: 10px">Jumlah Pemesanan</small>
               </td>
               <td style="border: none; width: 70%;">
                  <div class="sub-body"><span>: </span>x{{ $transaction->total_room }}</div>
               </td>
            </tr>
            <tr>
               <td style="border: none; width: 30%; padding: 5px 0">
                  <small style="font-size: 10px">Total Harga</small>
               </td>
               <td style="border: none; width: 70%;">
                  <div class="sub-body"><span>: </span>{{ convertRupiah($transaction->total_price) }}</div>
               </td>
            </tr>
         </table>
      </div>
   </div>
</body>
</html>