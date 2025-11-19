<x-layout>

    <h1 class="text-4xl mb-4 text-slate-400 text-center"> Please Login to your account</h1>

    <x-card class="mx-16 my-4">
        <form action="{{ route('auth.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-6">
                <label for="email" class="mb-4 text-slate-400">Email:</label>
                <input id="email" name="email" type="text" class="w-full rounded-md @error('email') border-red-400 @enderror" value="{{ old('email') }}"/>
                @error('email')
                <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="mb-4 text-slate-400">Password:</label>
                <input id="password" name="password" type="password" class="w-full rounded-md @error('password') border-red-400 @enderror"/>
                @error('password')
                <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6 flex justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2 rounded-sm border-slate-200"/>
                    <label for="remember" class="text-slate-400">Remember Me</label>
                </div>

                <div>
                    <a href="#" class="text-blue-400 hover:underline">
                        Forgot Your Password?
                    </a>
                </div>

            </div>

            @error('error')
            <div class="text-white bg-red-300 mb-4 border-1 border-red-500 p-2 rounded-sm text-center">{{ $message }}</div>
            @enderror

            <div class="text-slate-500 mb-4 border-1 border-slate-200 p-2 rounded-md hover:bg-green-50 bg-slate-50">
                <button type="submit" class="btn-m btn-primary w-full cursor-pointer">Login</button>
            </div>

        </form>

    </x-card>

</x-layout>
