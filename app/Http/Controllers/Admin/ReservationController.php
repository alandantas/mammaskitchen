<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

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
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());

        return redirect()->route('reservation.index')->with('successMsg','Reserva aprovada com Sucesso :)');

    }
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('successMsg','Reserva Deletada com Sucesso :)');

    }
}
