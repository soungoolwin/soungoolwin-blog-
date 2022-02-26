<x-guest-layout>
    <x-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/" class="formheading">
                    <h3>Register Form</h3>
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus />
                </div>
                <!-- Username -->
                <div>
                    <x-label for="username" :value="__('Username')" />

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required autofocus />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="avatar" :value="__('Profile')" />

                    <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-layout>
</x-guest-layout>