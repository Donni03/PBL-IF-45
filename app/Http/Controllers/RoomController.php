<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::simplePaginate(3);
        return view('admin.rooms', compact('rooms'));
        $rooms = Room::all(); // atau query lainnya
        return view('users.home', compact('rooms'));
    }
    // Controller Detail 
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('users.home', compact('rooms'));
    }
    public function delete($id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    
    public function create(){
        return view('admin.add_rooms');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|string',
            'room_name' => 'required|string',
            'room_photo' => 'required|image|mimes:jpg,jpeg,png|max:1024', // max 1MB
        ]);
    
        // Simpan gambar
        $imagePath = $request->file('room_photo')->store('room_photos', 'public');
    
        // Simpan ke DB (contoh model Room)
        Room::create([
            'room_number' => $validated['room_number'],
            'room_name' => $validated['room_name'],
            'room_photo' => $imagePath,
        ]);
    
        return redirect()->back()->with('success', 'Room berhasil ditambahkan!');
        
    }    
    
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
    
        $validated = $request->validate([
            'room_number' => 'required|string',
            'room_name' => 'required|string',
            'room_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    
        // Jika ada gambar baru yang diupload
        if ($request->hasFile('room_photo')) {
            // Hapus gambar lama jika ada
            if ($room->room_photo && Storage::disk('public')->exists($room->room_photo)) {
                Storage::disk('public')->delete($room->room_photo);
            }
    
            // Simpan gambar baru
            $imagePath = $request->file('room_photo')->store('room_photos', 'public');
            $room->room_photo = $imagePath;
        }
    
        // Update data lainnya
        $room->room_number = $validated['room_number'];
        $room->room_name = $validated['room_name'];
        $room->save();
    
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }
}