@extends('layout.user')
@section('container')
@include('partials.navbar')
<div class="flex flex-col gap-15">
    <h2 class="text-[3rem] font-bold flex justify-center m-5">
    About Us
    </h2>
    <div class="flex gap-5 ml-20">
        <img src="{{asset('img/ta11.5.png')}}" alt="" class="w-100 h-90">
        <h2 class="font-semibold text-[1.5rem] flex justify-center items-center">SIKL is a system that provides information 
            about room status. SIKL can also make 
            reservations for available rooms. 
            This makes it easier for users to make room 
            usage plans.</h2>
    </div>
    <div class="flex justify-end gap-5 mr-20 pb-20">
        <h2 class="font-semibold text-[1.5rem] flex justify-center items-center">SIKL helps you to monitor the room.
            If you need help, please</h2>
        <img src="{{asset('img/ta11.4.png')}}" alt="" class="w-100 h-90">
    </div>
</div>
@include('partials.footer')    
@endsection