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
        <div>Beranda</div>
        <div>Contact US</div>
        <div>About US</div>
        <div class="ml-15">Login</div>
    </div>
</div>
</nav>
</body>
</html>