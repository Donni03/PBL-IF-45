@extends('layout.main')
@section('container')
  @include('component.navbar')
  <form action="home">
  <div class="bg-gray-100 min-h-screen p-1 flex space-x-0.5">
    <div class="flex flex-col min-w-[15rem]">
        <div class="w-60 bg-[#56B8FE] flex justify-center items-center rounded shadow-md h-[100px] ">
        <img class="w-23" src="{{ asset('img/footer.png')}}" alt="">
        </div>
        @include('component.admin_panel')
</div>
<div class="flex-col space-y-1">
    <div class="bg-[#FFFFFF] w-screen h-[45px] rounded shadow-md text-[#56B8FE] text-[1.7rem] font-bold flex items-center px-5">Rooms
        <h2 class="flex justify-left pl-180">Total Rooms: <span id="roomCount">Loading...</span></h2>
    </div>
    <div class="bg-[#FFFFFF] w-screen min-h-[537px] rounded shadow-md px-16 p-2 overflow-auto">
        @csrf
        <table class="w-250 max-w-full table-auto">
            <thead class="bg-gray-300 border-blue-900">
                <tr>
                    <th class="py-3 whitespace-nowrap">No</th>
                    <th class="px-5 py-3 whitespace-nowrap">Pictures</th>
                    <th class="px-1 py-2 whitespace-nowrap">Room Number</th>
                    <th class="px-1 py-2 whitespace-nowrap">Room Name</th>
                    <th class="px-1 py-2 whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $show)
                    <tr>
                        <td class="border-b-2 border-blue-600  py-3 text-center font-bold text-[1.5rem]">{{ $show->id }}</td>
                        <td class="border-b-2 border-blue-600  px-5 py-3 text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $show->room_photo) }}" class="w-24 h-24 object-cover">
                            </div>
                        </td>
                        <td class="border-b-2 border-blue-600  px-1 py-3 text-center">{{ $show->room_number }}</td>
                        <td class="border-b-2 border-blue-600  px-5 py-3 text-left">{{ $show->room_name }}</td>
                        <td class="border-b-2 border-blue-600 px-5 py-3 text-center">
                            <button onclick='openEditModal(@json($show))' class="text-[blue] hover:underline">Edit</button>
                            <form action="{{ route('room.destroy', $show->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 pl-2 font-semibold hover:underline" type="submit" onclick="return confirm('Are You Sure Want To Delete This?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center pl-145 mt-2">
            {{ $rooms->links() }}
        </div>
    </div>
</div>
</div>
<div id="editModal" class="hidden bg-gray-100 fixed top-10 left-150  justify-center items-center  h-100 w-100 z-50 ">
    <!-- Tombol X -->
    <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-xl font-bold z-50">&times;</button>
    <form action="" id="editForm" method="post" enctype="multipart/form-data" class="bg-gray-50 w-full max-w-lg rounded shadow-md p-8">
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">Edit Rooms</h1>
      </div>

      @csrf
      @method('PUT')

      <div class="mb-5">
        <label class="block text-lg font-semibold mb-1">Room Number</label>
        <input type="text" id="editroom_number" name="room_number" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Room Number">
      </div>

      <div class="mb-5">
        <label class="block text-lg font-semibold mb-1">Room Name</label>
        <input type="text" id="editroom_name" name="room_name" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Room Name">
      </div>

      <div class="flex flex-col">
        <label for="image" class="text-black text-[1.3rem] font-bold">Choose Image</label>
        <!-- Wrapper dengan posisi relative -->
        <div class="relative h-40 w-50 border-2 bg-white rounded shadow-md overflow-hidden">
            <!-- Gambar preview -->
            <img id="preview" class="absolute top-0 left-0 w-full h-full object-contain pointer-events-none" />
            <!-- Input file transparan di atas gambar -->
            <input type="file" name="room_photo" id="editroom_photo" accept="image/*"
                class="absolute top-0 left-0 w-full h-full opacity-0  cursor-pointer"
                onchange="previewImage(event)" required>
        </div>
    </div>
      <div class="flex justify-end gap-4 pt-5">
        <button type="button" onclick="closeEditModal()" class="px-5 py-2 border border-red-600 text-red-600 rounded hover:bg-red-100 transition">Cancel</button>
        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-300 transition">Save</button>
      </div>
    </form>
</div>
<script>
    // Get total users via API
    fetch('/api/total-rooms')
      .then(res => res.json())
      .then(data => {
        document.getElementById('roomCount').textContent = data.total_rooms;
      });
      function openEditModal(room) {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');

    const form = document.getElementById('editForm');
    form.action = `/rooms/${room.id}`;

    document.getElementById('editroom_number').value = room.room_number;
    document.getElementById('editroom_name').value = room.room_name;
    document.getElementById('editroom_photo').value = room.room_photo;
  }

  // Close Modal
  function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
  }
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Validasi ukuran maksimum 1MB (1MB = 1 * 1024 * 1024 bytes)
                if (file.size > 1 * 1024 * 1024) {
                    alert("Ukuran gambar tidak boleh lebih dari 1MB.");
                    input.value = ""; // Reset input file
                    preview.src = ""; // Reset preview
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
    </form>
    @endsection
