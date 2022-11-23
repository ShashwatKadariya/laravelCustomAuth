<x-layout>
    <div class="flex w-screen">
        <div class="m-auto text-3xl">
            Login
        </div>
    </div>
        <x-card_layout>
            <form action="{{route('login.auth')}}" method="POST" class="">
                @csrf
                
                <div class="mb-6 ">
                    <label for="username" class="inline text-lg mb-2">
                        UserName
                    </label>
                    <input type="text" name="username" class="border border-gray rounded p-2 w-full">


                    @error('username')
                        <p class="text-red-500">*{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6 ">
                    <label for="password" class="inline text-lg mb-2">
                        Password
                    </label>
                    <input type="password" name="password" class="border border-gray rounded p-2 w-full">
                    @error('password')
                    <p class="text-red-500">*{{$message}}</p>
                @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-gray-800">login </button>
                </div>
                
            </form>
        </x-card_layout>

</x-layout>