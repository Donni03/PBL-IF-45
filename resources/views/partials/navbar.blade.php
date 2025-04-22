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
<nav class=" bg-[#2F81DF] flex justify-between p-0 m-0">
    <div class="flex items-center text-[2.5rem] text-white">
    <img src="{{asset('img/footer.png')}}" alt="nav" class="w-24 h-17 m-5 ml-12 p-0">SKIL
    </div>
    <div class="flex items-center text-2xl mr-5 gap-20 text-white">
        <div>
            <a href="/" class="block w-full mb-2">
            Beranda</a>
        </div>
        <div>
            <a href="/contact" class="block w-full mb-2">
            Contact US</a>
        </div>
        <div>
            <a href="/about" class="block w-full mb-2">
            About US</a>
        </div>
        <div class="ml-15"><a href="/login" class="block w-full mb-2">
            Login</a></div>
    </div>
</div>
</nav>
</body>
</html>