<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- tipo de cuenta --}}
        <div class="mt-4">
            <x-input-label for="rol" :value="__('tipo de cuenta')" />
            <select id="rol" name="rol"  class="rounded-md font-bold uppercase text-sm text-gray-500 dark:text-gray-300 mb-2 block mt-1 w-full" >
                <option value="">-- Selecciona un rol</option>
                <option value="1">Developer - Obtener empleo</option>
                <option value="2">Reclutador- Publicar empleos</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end p-2">
            <x-primary-button class="w-full">
                {{ __('Register') }}
            </x-primary-button>
        </div>


        <div class="flex items-center justify-between my-5">
        
            <x-link :href="route('password.request')">Olvidaste tu pasword?</x-link>
            <x-link :href="route('login')">Inicia secion</x-link>

        </div>


    </form>
</x-guest-layout>
