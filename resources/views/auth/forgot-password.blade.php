<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Olvidaste tu pasword? coloca tu email y te enviaremos un elace.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full">
                {{ __('Enviar instrucciones') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-between my-5">
        
            <x-link :href="route('register')">Crea tu cuenta</x-link>
            <x-link :href="route('login')">Inicia secion</x-link>

        </div>
    </form>
</x-guest-layout>
