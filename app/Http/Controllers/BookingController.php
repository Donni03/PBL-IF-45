<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RoomBooking;

class BookingController extends Controller
{
public function store(Request $request)
{
    $user_id = auth()->id(); // Mendapatkan ID user yang sedang login
    // Validate input data
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'reason' => 'nullable|string',
    ]);

    // Check if there's a conflict with the booking times
    $conflict = RoomBooking::where('room_id', $request->room_id)
        ->where('date', $request->date)
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                ->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<=', $request->start_time)
                          ->where('end_time', '>=', $request->end_time);
                });
        })
        ->exists();

    // If there's a conflict, return an error
    if ($conflict) {
        return back()->with('error', 'Waktu booking bentrok dengan jadwal lain.');
    }

    // Save the new booking if there's no conflict
    RoomBooking::create([
        'user_id' => auth()->id(),
        'room_id' => $request->room_id,
        'date' => $request->date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'reason' => $request->reason,
    ]);

    // Return success message
    return back()->with('success', 'Booking berhasil disimpan!');
}
}