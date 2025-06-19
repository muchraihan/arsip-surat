<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-green-50 dark:bg-gray-700">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl flex w-full max-w-6xl overflow-hidden">
            
            <div class="w-full md:w-1/2 p-6 sm:p-8 md:p-10 lg:p-12">

                <h2 class="text-3xl md:text-4xl font-extrabold text-center text-green-700 dark:text-green-300 mb-2">Login</h2>
                <p class="text-center text-gray-600 dark:text-gray-400 mb-8 md:mb-10 text-base md:text-lg">Silakan masuk ke akun Anda</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-6 md:space-y-7">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <x-text-input 
                            id="email" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            placeholder="you@example.com"
                            class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:text-white
                                   transition duration-200 ease-in-out placeholder-gray-400 dark:placeholder-gray-500" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                        <x-text-input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            placeholder="********"
                            class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                   focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:text-white
                                   transition duration-200 ease-in-out placeholder-gray-400 dark:placeholder-gray-500" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <div class="flex items-center justify-between text-sm md:text-base">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 dark:border-gray-600 text-green-600 dark:bg-gray-700 focus:ring-green-500">
                            <span class="ml-2 text-gray-700 dark:text-gray-300">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-green-600 hover:text-green-700 hover:underline dark:text-green-400 dark:hover:text-green-300 transition duration-200">Lupa password?</a>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-md font-semibold 
                                                     shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2
                                                     transform hover:scale-105 transition duration-300 ease-in-out">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>

            <div class="hidden md:flex items-center justify-center w-1/2 
                        bg-gradient-to-br from-green-600 to-green-800 dark:from-green-800 dark:to-green-950 p-8">
                <img src="{{ asset('logokemenag.png') }}" alt="Logo Kemenag Besar" class="w-3/4 max-w-sm drop-shadow-lg">
            </div>
        </div>
    </div>
</x-guest-layout>