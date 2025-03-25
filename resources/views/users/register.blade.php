@extends('layout.user')
@section('container')
  <div class="flex justify-center items-center min-h-screen">
    <div class="bg-[#FFFFFF] rounded shadow-md">
        <img class="w-full" src="{{asset('img/nav.png')}}" alt="">
            <div class="bg-[#d9d9d9] w-full p-5 h-134">
                <div class=" border-[1px] bg-[#5376C0] border-[#5376C0] w-80 h-3 ml-5 ">
                </div>
                    <div class="text-[#5376C0] p-2 flex justify-center text-[1.5rem]">Account Registration
            </div> 
            <div class="flex justify-center">
              <form action="{{route('registrasi')}}" method="post" autocomplete="off" class="flex flex-col space-y-2">
                  @csrf
                  <div>
                    <label class="block text-[#473F3F] mb-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="bg-white w-72 h-9 px-2 rounded text-[#473F3F]" placeholder="Your Name">
                  </div>
              
                  <div>
                    <label class="block text-[#473F3F] mb-1">Last Education</label>
                    <input type="text" name="last_education" value="{{ old('last_education') }}" class="bg-white w-72 h-9 px-2 rounded text-[#473F3F]" placeholder="D3">
                  </div>
              
                  <div>
                    <label class="block text-[#473F3F] mb-1">Position</label>
                    <input type="text" name="position" value="{{ old('position') }}" class="bg-white w-72 h-9 px-2 rounded text-[#473F3F]" placeholder="Dosen">
                  </div>
              
                  <div>
                    <label class="block text-[#473F3F] mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="bg-white w-72 h-9 px-2 rounded text-[#473F3F]" placeholder="example@gmail.com">
                  </div>
              
                  <div>
                    <label class="block text-[#473F3F] mb-1">Password</label>
                    <input type="password" name="password" class="bg-white w-72 h-9 px-2 rounded text-[#473F3F]" placeholder="**********">
                    <p class="text-sm pl-16 text-[1rem] font-medium flex">Already have an account!
                    <a href="/login" class="text-sm text-[1rem] font-medium text-[#FE5F55] hover:underline">Login</a></p>
                  </div>
              
                  <div class="mt-4 text-center flex justify-center">
                    <button type="submit" class="bg-[#5376C0] text-white w-36 h-9 rounded hover:bg-blue-700 transition">Register</button>
                  </div>
                </form>
              </div>              
        </div>
    </div>
</div>
@endsection