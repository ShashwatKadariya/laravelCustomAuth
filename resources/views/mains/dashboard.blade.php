<x-layout>
    <div class="flex justify-end p-4">
        <form action="/logout" action="POST">
            <button type="submit" class="p-2 bg-gray-200 border border-gray-300 rounded hover:bg-gray-100">
                Logout
            </button>
        </form>
    </div>

    <div class="flex h-screen">
        <div class="m-auto text-3xl">
            Welcome {{auth()->user()->username}}
        </div>
    </div>
</x-layout>