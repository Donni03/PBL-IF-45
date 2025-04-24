@extends('layout.user')
@section('container')
@include('partials.user')

<div class="flex flex-col min-h-screen">
    <div class="container mx-auto py-8 h-auto">
        <div class="grid grid-cols-5 gap-4">
            @foreach ($rooms as $room)
                <div class="flex flex-col items-center bg-white rounded shadow p-2 h-90 gap-1">
                    <img src="{{ asset('storage/' . $room->room_photo) }}" class="w-full h-50 object-cover ">
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold text-[1.3rem]">{{($room->room_number)}}</h2>
                        <p class="font-semibold text-center">{{ Str::limit($room->room_name,23) }}</p>
                    </div>
                    <button onclick='openEditModal(@json($room))' class="bg-gray-400 text-white py-2 px-6 rounded hover:bg-blue-300 mt-5">Bokking</button>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Modal Edit User --}}
<div id="editModal" class="hidden bg-gray-100 fixed top-6 left-100 justify-center items-center rounded min-h-[32rem] z-30">
    <!-- Tombol X -->
    <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-xl font-bold z-50">&times;</button>
        <h1 class="font-bold text-[2rem] m-4 text-center">Booking Room</h1>
        <div class="bg-[#D9D9D9] w-150 min-h-[33rem] rounded glow-border">
            <div class="flex flex-col justify-center items-center bg-[#B6CAF4] w-150 min-h-[30px] py-5 mt-7">
                <h2 id="modalRoomNumber" class="font-bold text-[1.5rem]"></h2>
                <h2 id="modalRoomName" class="font-bold text-[1.5rem] text-center w-[40ch] leading-none"></h2>                
        </div>
        <form action="{{ route('booking.store') }}" method="POST" class="flex flex-col justify-center items-center space-y-1 w-full mt-5 gap-5">
            @csrf
            <input type="hidden" name="room_id" id="roomIdInput">
            <div class="flex flex-col w-100 ">
            <label class="">Date</label>
            <input type="date" name="date" id="dateInput" class="border border-gray-400 p-2 rounded">
            <label class="mt-2">Start</label>
            <input type="time" name="start_time" class="border border-gray-400 p-2 rounded">
            <label class="mt-2">Finish</label>
            <input type="time" name="end_time" class="border border-gray-400 p-2 rounded">
            <label class="mt-2">Reason</label>
            <input type="text" name="reason" class="border border-gray-400 p-2 rounded">
            </div>
            <div class="pl-55 flex justify-end gap-4">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2 bg-red-300 text-red-600 hover:bg-red-100 rounded transition">Cancel</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-300 transition">Save</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split("T")[0]; // Ambil tanggal hari ini dalam format YYYY-MM-DD
            document.getElementById("dateInput").setAttribute("min", today);
        });
        function openEditModal(room) {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
  }
  function openEditModal(room) {
    const modal = document.getElementById('editModal');
    document.getElementById('modalRoomNumber').textContent = room.room_number;
    document.getElementById('modalRoomName').textContent = room.room_name;
    //jangan rupa tambahkan room id agar modal berfungsi
    document.getElementById('roomIdInput').value = room.id;
    modal.classList.remove('hidden');
}

  // Close Modal
  function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
  }
    </script>
@endsection
