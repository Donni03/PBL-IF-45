@extends('layout.user')
@section('container')
<div class="flex flex-col items-center">
    <h1 class="font-bold text-[2rem] m-4">Booking Room</h1>
    <div class="bg-[#D9D9D9] w-150 min-h-[34rem] rounded glow-border">
        <div class="flex flex-col justify-center items-center bg-[#B6CAF4] w-150 min-h-[30px] py-5 mt-7">
        <h2 class="font-bold text-[1.5rem]">TA 11.4</h2>
        <h2 class="font-bold text-[1.5rem] text-center w-[30ch] leading-none">cyber securyti websided</h2>
    </div>
    <form action="" class="flex flex-col justify-center items-center space-y-1 w-full mt-5 gap-5">
        @csrf
        <div class="flex flex-col w-100 ">
        <label class="">Date</label>
        <input type="date" id="dateInput" class="border border-gray-400 p-2 rounded">
        <label class="mt-2">Start</label>
        <input type="time" class="border border-gray-400 p-2 rounded">
        <label class="mt-2">Finish</label>
        <input type="time" class="border border-gray-400 p-2 rounded">
        <label class="mt-2">Reason</label>
        <input type="text" class="border border-gray-400 p-2 rounded">
        </div>
        <div class="pl-55 flex justify-end gap-4">
            <button type="button" class="px-5 py-2 bg-red-300 text-red-600 hover:bg-red-100 rounded transition">Cancel</button>
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
</script>
@endsection