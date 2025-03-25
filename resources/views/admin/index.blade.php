@extends('layout.main')
@section('container')
  @include('component.navbar')
  <div class="bg-gray-100 min-h-screen p-1 flex space-x-0.5">
    <div class="flex flex-col">
        <div class="w-80 bg-[#56B8FE] flex justify-center items-center rounded shadow-md h-[100px] ">
        <img class="w-23" src="{{ asset('img/footer.png')}}" alt="">
        </div>
        @include('component.admin_panel')
</div>
<div class="flex-col space-y-1">
    <div class="bg-[#FFFFFF] w-screen h-[60px] rounded shadow-md text-[#56B8FE] text-[1.7rem] font-bold flex items-center px-5">Dashboard
        
    </div>
    <div class="bg-[#FFFFFF] w-screen min-h-[537px] rounded shadow-md">

    </div>
</div>
</div> 
@endsection   