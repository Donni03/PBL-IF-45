<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar user</title>
    @vite('resources/css/app.css')
</head>
<body>
<nav class=" sticky top-0 z-10">
<div class=" bg-[#2F81DF] flex justify-between p-0 m-0">
    <div class="flex items-center text-[2.5rem] text-white">
    <img src="{{asset('img/footer.png')}}" alt="nav" class="w-24 h-17 m-5 ml-20 p-0">SKIL
    </div>
    <div class="flex items-center text-2xl mr-5 gap-20 text-white ">
        @auth
        <div>????</div>
        <div>Rooms</div>
        <div><a href=""></a></div>
        <span class="font-semibold text-[1rem]">
            {{ Str::limit(Auth::user()->name, 15) }}
        </span>
        <div class="relative inline-block text-left dropdown">
            <a href="#" class="flex items-center">
                <img class="w-8 h-8 rounded-full" src="{{  Auth::user()->profile_photo_path ? asset('storage/' .  Auth::user()->profile_photo_path) : 'https://via.placeholder.com/150' }}" alt="">
            </a>
        
            <!-- Dropdown Menu -->
            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg dropdown-content">
                <div class="py-1">
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="/editprofile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
                    <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    @endauth
    </div>
</div>
</nav>
</body>
</html>