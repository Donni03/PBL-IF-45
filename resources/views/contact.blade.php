@extends('layout.user')
@section('container')
@include('partials.navbar')
<div class="flex flex-col gap-5">
    <!-- Kotak putih untuk Contact Us -->
    <div class="flex justify-center m-5">
        <div class="absolute bg-gray-200">
            <h2 class="text-[3rem] font-bold text-center">
                Contact Us
            </h2>
        </div>
    </div>
    <div class=" border-[1px] bg-[#5376C0] border-[#5376C0] h-3">
    </div>
    <div class="flex justify-center gap-15 m-5">
    <form action="" class="flex flex-col gap-5">
        @csrf
        <input type="text" class="w-100 h-10 px-2 bg-white rounded" placeholder="Name">
        <input type="text" class="w-100 h-10 px-2 bg-white rounded" placeholder="Email">
        <input type="text" class="w-100 h-50 px-2 bg-white rounded" placeholder="Type Your Messge">
        <div class="mt-1 text-center flex justify-end">
            <button type="submit" class="bg-[#928fbd] text-black w-36 h-15  text-[2rem] rounded hover:bg-blue-700 transition glow-border">Send</button>
          </div>
    </form>
    <div class="bg-white h-80 w-100 flex flex-col justify-center">
    <div class="flex px-6 items-center gap-2">
        <img src="{{asset('img/wa.png')}}" alt=""><h1 class="text-[2rem] font-bold">082173625427</h1>
    </div>
    <div class="flex px-6 items-center gap-2">
        <img src="{{asset('img/ig.png')}}" alt=""><h1 class="text-[2rem] font-bold">polibatamoficial</h1>
    </div>
    <div class="flex px-6 items-center gap-2">
        <img src="{{asset('img/twiter.png')}}" alt=""><h1 class="text-[2rem] font-bold">polibatam_</h1>
    </div>
    <div class="flex px-6 items-center gap-2">
        <img src="{{asset('img/fb.png')}}" alt=""><h1 class="text-[2rem] font-bold">Poli Batam</h1>
    </div>
    <div class="flex px-6 items-center gap-2">
        <img src="{{asset('img/youtube.png')}}" alt=""><h1 class="text-[2rem] font-bold">Polibatam TV</h1>
    </div>
</div>
</div>
@include('partials.footer')
@endsection