<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
      
        return view("admin.reservation", compact('reservations'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'number_guests' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_guests' => $request->number_guests,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Reservation made successfully!');
    }


    public function destroy($id)
    {
        $reservations=  Reservation::findOrFail($id); // Find the food item
        $reservations->delete(); // Delete the food item

        return redirect()->route('reservations.index')->with('success', ' Reservation deleted successfully.');
    }
}
