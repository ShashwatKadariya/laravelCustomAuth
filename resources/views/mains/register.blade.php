<x-layout>
    <div class="flex w-screen">
        <div class="m-auto text-3xl">
            Register
        </div>
    </div>
        <x-card_layout>
            <form action="{{route('register.post')}}" method="POST" class="">
                @csrf
                
                <div class="mb-6 ">
                    <label for="username" class="inline text-lg mb-2">
                        UserName
                    </label>
                    <input type="text" name="username" class="border border-gray rounded p-2 w-full">
                </div>
                
                <div class="mb-6 ">
                    <label for="email" class="inline-block text-lg mb-2">
                        email
                    </label>
                    <input type="email" name="email" class="border border-gray rounded p-2 w-full">
                    @error('email')
                       <p class="text-red-500"> * {{$message}}</p>
                    @enderror

                </div>


                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        password
                    </label>
                    <input type="password" name="password" class="border border-gray rounded p-2 w-full">
                </div>


                <div class="mb-6 ">
                    <label for="password_confirmation" class="inline-block text-lg mb-2">
                        password_confirm
                    </label>
                    <input type="password" name="password_confirmation" class="border border-gray rounded p-2 w-full">
                </div>



                <div class="mb-6">
                    <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-gray-800">Sign Up</button>
                </div>
            </form>
        </x-card_layout>

</x-layout>