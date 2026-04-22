<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-semibold mb-4">Clinic Register</h1>

        <form method="POST" action="{{ route('clinic.register.store') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="name" value="Clinic Name" />
                <x-text-input id="name" name="name" class="block mt-1 w-full" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" value="Phone (optional)" />
                <x-text-input id="phone" name="phone" class="block mt-1 w-full" :value="old('phone')" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" name="password" type="password" class="block mt-1 w-full" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" value="Confirm Password" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full" required />
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full justify-center">
                    Create Clinic Account
                </x-primary-button>
            </div>

            <div class="mt-4 text-sm text-gray-600">
                Already have a clinic account? <a class="underline" href="{{ route('clinic.login') }}">Login</a>
            </div>
        </form>
    </div>
</x-app-layout>