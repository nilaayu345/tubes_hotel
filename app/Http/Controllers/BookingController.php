<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facedes as PDF;

class BookingController extends Controller
{
    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function bookingRoom($slug) {
        $room = Room::where('slug_room', '=', $slug)->first();

        return view('customer.booking.booking', compact('room'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [String] $slug
     * @return void
     */
    public function bookingRoomDetail(Request $request, $slug) {
        $room = Room::where('slug_room', '=', $slug)->first(); // mencari data room berdasarkan slug
        $room->room_booked = $request->get('room_booked'); // jumlah kamar di pilih/pesan
        $room->timestamp_booked = Carbon::now('Asia/Jakarta')->toDateTimeString(); // menunjukan jam sesuai di komputer
        $room->total = $room->price * $room->room_booked; // menghitung total transaksi

        // dd($room, $request->all());
        return view('customer.booking.booking_details', compact('room'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [String] $slug
     * @return void
     */
    public function bookingRoomSave(Request $request, $slug) {

        Transaction::create([
            'user_id'       => Auth::id(),
            'room_id'       => $request->get('room_id'),
            'total_room'    => $request->get('total_room'),
            'total_price'   => $request->get('total_price'),
            'check_in'      => $request->get('check_in'),
            'check_out'     => $request->get('check_out'),
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function bookingListCustomer() {
        $page = 5;

        $transactions = Transaction::with(['users', 'rooms'])
            ->orderByDesc('created_at')
            ->where('user_id', '=', Auth::id())
            ->simplePaginate($page);

        $number = numberPagination($page);

        return view('customer.booking.booking-list', compact('transactions', 'number'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function bookingListAdmin() {
        $page = 5;

        $transactions = Transaction::with(['users', 'rooms'])
            ->orderByDesc('created_at')
            ->simplePaginate($page);

        $number = numberPagination($page);
        
        return view('admin.booking-list.booking-list-customer', compact('transactions', 'number'));
    }


    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */
    public function transactionAggrement(Request $request, $id) {
        $transaction = Transaction::find($id);

        $type = $request->get('type');
        $default_type = [1, 2]; // tipe 1 : setuju,  tipe 2 : tidak setuju

        if (in_array($type, $default_type)) {
            $transaction->status = $type;
            $transaction->save();

            return redirect()->route('admin.booking-list.customer');
        }

        abort(404);
    }

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return void
     */
    public function printNotaBooking($id) {
        $transaction = Transaction::with(['users', 'rooms'])
            ->where('user_id', '=', Auth::id())
            ->where('id', '=', $id)
            ->first();

        $pdf = \PDF::loadView('customer.booking.print-nota-booking', [
            'transaction' => $transaction,
        ])->setPaper('a5', 'potrait');

        return $pdf->stream('booking.pdf');
    // return view('customer.booking.nota-booking');
    }
}
