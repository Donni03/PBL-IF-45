@extends('layout.main')
@section('container')
@include('component.navbar')

<div class="bg-gray-100 min-h-screen p-1 flex flex-row space-x-0.5  max-w-[100vw]">

  {{-- SIDE PANEL --}}
  <div class="flex flex-col w-[25rem] min-w-[15rem]">
      <div class="bg-[#56B8FE] flex justify-center items-center rounded shadow-md h-[100px] w-60">
          <img class="w-15" src="{{ asset('img/footer.png')}}" alt="">
      </div>
      @include('component.admin_panel')
  </div>

  {{-- MAIN CONTENT --}}
  <div class="flex flex-col gap-1 pr-9">
    <div class="bg-white h-[45px] w-screen rounded shadow-md text-[#56B8FE] text-[1.7rem] font-bold flex items-center px-5">
        List Users 
        <h2 class="flex justify-left pl-180">Total Users: <span id="userCount">Loading...</span></h2>
    </div>

    <div class="bg-white rounded shadow-md flex flex-col items-right justify-center pb-1 px-3 min-h-[537px] w-full overflow-x-auto">
      @csrf
      <table class="w-270 max-w-[90%] table-auto border-collapse border border-gray-400">
          <thead class="bg-[#f9f9f9] border-b-2">
              <tr>
                  <th class="border">No</th>
                  <th class="border">Nama</th>
                  <th class="border text-center">Last_Education</th>
                  <th class="border text-center">Position</th>
                  <th class="border text-center">Email</th>
                  <th class="border text-center">Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($users as $show)
              <tr>
                  <td class="border px-1 py-2 text-center">{{ $show->id }}</td>
                  <td class="border px-1 py-2">{{ Str::limit($show->name,30) }}</td>
                  <td class="border px-1 py-2">{{ Str::limit($show->last_education,20) }}</td>
                  <td class="border px-1 py-2">{{ Str::limit($show->position,20) }}</td>
                  <td class="border px-1 py-2">{{ $show->email }}</td>
                  <td class="border px-1 py-2 text-center">
                   <button onclick='openEditModal(@json($show))' class="text-[blue] hover:underline">Edit</button>
                      <form action="{{ route('users.destroy', $show->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button class="text-red-500 pl-2 font-semibold hover:underline" type="submit" onclick="return confirm('Are You Sure Want To Delete This?')">Delete</button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>

      {{-- PAGINATION --}}
      <div class="flex justify-center pl-165  mt-1 ">
        {{ $users->links() }}
    </div>
    </div>
  </div>
</div>
{{-- Modal Edit User --}}
<div id="editModal" class="hidden bg-gray-100 fixed top-12 left-150  justify-center items-center  h-100 w-100 z-50 ">
  <!-- Tombol X -->
  <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-xl font-bold z-50">&times;</button>
  <form action="" id="editForm" method="post" class="bg-gray-50 w-full max-w-lg rounded shadow-md p-8">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-blue-600">Edit User</h1>
    </div>

    @csrf
    @method('PUT')

    <div class="mb-5">
      <label class="block text-lg font-semibold mb-1">Nama</label>
      <input type="text" id="editName" name="name" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Nama">
    </div>

    <div class="mb-5">
      <label class="block text-lg font-semibold mb-1">Last Education</label>
      <input type="text" id="editEducation" name="last_education" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Last Education">
    </div>

    <div class="mb-5">
      <label class="block text-lg font-semibold mb-1">Position</label>
      <input type="text" id="editPosition" name="position" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Position">
    </div>

    <div class="mb-5">
      <label class="block text-lg font-semibold mb-1">Email</label>
      <input type="email" id="editEmail" name="email" class="w-full border border-gray-400 rounded p-2 shadow-sm" placeholder="Email">
    </div>

    <div class="flex justify-end gap-4">
      <button type="button" onclick="closeEditModal()" class="px-5 py-2 border border-red-600 text-red-600 rounded hover:bg-red-100 transition">Cancel</button>
      <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-300 transition">Save</button>
    </div>
  </form>
</div>
{{-- SCRIPT --}}
<script>
  // Get total users via API
  fetch('/api/total-users')
    .then(res => res.json())
    .then(data => {
      document.getElementById('userCount').textContent = data.total_users;
    });

  // Show Edit Modal with data
  function openEditModal(user) {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');

    const form = document.getElementById('editForm');
    form.action = `/users/${user.id}`;

    document.getElementById('editName').value = user.name;
    document.getElementById('editEducation').value = user.last_education;
    document.getElementById('editPosition').value = user.position;
    document.getElementById('editEmail').value = user.email;
  }

  // Close Modal
  function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
  }
</script>

@endsection
