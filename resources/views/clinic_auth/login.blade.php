<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-semibold mb-4">Clinic Login</h1>

        <form method="POST" action="{{ route('clinic.login.store') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email"
                              name="email"
                              type="email"
                              class="block mt-1 w-full"
                              :value="old('email')"
                              required
                              autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password"
                              name="password"
                              type="password"
                              class="block mt-1 w-full"
                              required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full justify-center">
                    Login
                </x-primary-button>
            </div>

            <div class="mt-4 text-sm text-gray-600">
                No clinic account?
                <a class="underline" href="{{ route('clinic.register') }}">Register</a>
            </div>
        </form>
    </div>
</x-app-layout>