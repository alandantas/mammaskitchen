<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('status')->paginate(5);
        return view('admin.reservation.index', compact('reservations'));
    }
    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        return redirect()->route('reservation.index')->with('successMsg','Reserva aprovada com Sucesso :)');

    }
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('successMsg','Reserva Deletada com Sucesso :)');

    }
}
