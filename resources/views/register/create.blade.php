<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl ">
            <h1 class="text-center font-bold text-xl mb-5 text-blue-500">Register</h1>

            <form method="POST" action="/register">
                <!-- cross site request forgery -->
                <!-- adding this laravel command stops CSRF -->
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">

                        Name

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{ old('name') }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <div class="mb-4 mt-4">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">

                            Username

                        </label>

                        <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{ old('username') }}" required>

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="mb-4 mt-4">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">

                                Email

                            </label>

                            <!-- default value: Sometimes you may wish to store items in the session for the next request. 
                             You may do so using the flash method. Data stored in the session using this method will be 
                             available immediately and during the subsequent HTTP request -->
                            <input class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" value="{{ old('email') }}" required>
                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            <div class="mb-4 mt-4">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">

                                    Password

                                </label>

                                <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                                @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror


                            </div>

                            <div class="mb-6">
                                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

                                    Submit</button>
                            </div>

                            <!-- another way to append the errors at the bottom of the form -->
                            <!-- @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-s">{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif -->
            </form>
        </main>
    </section>

</x-layout>