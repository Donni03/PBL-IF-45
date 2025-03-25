<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script>
    function togglePassword(){
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.getElementById("toggleIcon");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "🙈"; //icon jika password terbuka
      } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "👁️"; //icon jika passwor di sembuyikan
      }
    }
    </script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="h-screen flex justify-center items-center">
      <div class="bg-white rounded shadow-md w-96">
        <img class="w-full mb-4" src="{{ asset('img/nav.png') }}" alt="">
        <div class="bg-[#D9D9D9] p-6 rounded flex flex-col items-center gap-2">
          <p class="text-[2rem] font-bold mb-4">Login</p>
      <form action="login" method="POST">
          <div class="flex flex-col w-full pb-5 gap-1">
            <label for="username" class="text-sm font-medium text-black">Username</label>
            <input id="username" type="text" class="bg-white h-10 rounded px-4 text-gray-800" placeholder="Enter your username">
          </div>

          <div class="flex flex-col w-full gap-1 relative">
            <label for="password" class="text-sm font-medium text-black">Password</label>
          <input id="password" type="password" class="bg-white w-full h-10 rounded px-4 text-gray-800" placeholder="********">
          <span onclick="togglePassword()" id="toggleIcon" class="absolute right-2 top-1/2 -translate-y-1/2    cursor-pointer select-none text-xl">👁️</span>
          <div class="pl-45 flex  ">
            <p class="text-sm font-medium font-condensed text-black">Not Registered?</p>  
            <a href="register" class="text-sm font-condensed font-medium text-[#FE5F55] hover:underline">Register</a>
        </div>
          </div>
          <div class="text-sm flex justify-center mt-5">
          <button type="submit" class="text-[#000000] font-bold bg-[#5376C0] w-35 h-9 rounded">Login</button>
          </div>
      </form>
        </div>
      </div>
    </div>
  </body>
  
</html>