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
        <div class="bg-[#FFFFFF] w-screen h-[60px] rounded shadow-md text-[1.7rem] font-bold flex items-center px-5 text-[#56B8FE]">Add Rooms   
        </div>
        <div class="bg-[#FBFBFB] w-screen min-h-[537px] rounded shadow-md">
            <form action="" class="px-30 flex flex-col gap-5">
                <div class="flex flex-col mt-5">
                    <label for="text" class="text-black font-bold text-[1.3rem]">Room Number</label>
                    <input type="text" class="bg-white pl-2 h-10 w-70 border-2 rounded shadow-md" required>
                </div>
                <div class="flex flex-col">
                    <label for="name" class="text-black text-[1.3rem] font-bold">Room Name</label>
                    <input type="text" name="" id="" class="bg-white h-10 pl-2 border-2 w-70 rounded shadow-md" required>
                </div>
                <div class="flex flex-col">
                    <label for="image" class="text-black text-[1.3rem] font-bold">Choose Image</label>
                    <!-- Wrapper dengan posisi relative -->
                    <div class="relative h-40 w-50 border-2 bg-white rounded shadow-md overflow-hidden">
                        <!-- Gambar preview -->
                        <img id="preview" class="absolute top-0 left-0 w-full h-full object-contain pointer-events-none" />
                        <!-- Input file transparan di atas gambar -->
                        <input type="file" name="image" id="image" accept="image/*"
                            class="absolute top-0 left-0 w-full h-full opacity-0  cursor-pointer"
                            onchange="previewImage(event)" required>
                    </div>
                </div>   
                <div class="mt-5">
                    <button type="submit"
                        class="bg-[#56B8FE] hover:bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-md">
                        Submit
                    </button>
                </div>             
            </form>
        </div>
    </div>
    </div> 
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
    
            if (input.files && input.files[0]) {
                const file = input.files[0];
    
                // Validasi ukuran maksimum 1MB (1MB = 1 * 1024 * 1024 bytes)
                if (file.size > 1 * 1024 * 1024) {
                    alert("Ukuran gambar tidak boleh lebih dari 1MB.");
                    input.value = ""; // Reset input file
                    preview.src = ""; // Reset preview
                    return;
                }
    
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
    
                reader.readAsDataURL(file);
            }
        }
    </script>
    
        
@endsection