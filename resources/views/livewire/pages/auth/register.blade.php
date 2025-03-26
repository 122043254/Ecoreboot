<?php

use App\Models\User;
use App\Models\RolUsuario; // Agrega este modelo para acceder a la tabla de roles
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $phone = ''; // Añadir el campo de teléfono

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Validar los datos del formulario
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:15'], // Validar el teléfono
        ]);

        // Hashear la contraseña
        $validated['password'] = Hash::make($validated['password']);

        // Buscar el ID del rol "donante" en la tabla `rol_usuarios`
        $rolDonante = RolUsuario::where('nombre', 'donante')->first();
        
        // Si el rol existe, asignar el id_rol_usuario
        if ($rolDonante) {
            $validated['id_rol_usuario'] = $rolDonante->id_rol_usuario;
        } else {
            // Si no existe, asignar un valor predeterminado (puedes manejar esto como desees)
            $validated['id_rol_usuario'] = 2;  // Este valor depende de cómo tengas configurados los roles
        }

        // Agregar el teléfono a los datos validados
        $validated['phone'] = $this->phone;

        // Crear el usuario y disparar el evento de registro
        event(new Registered($user = User::create($validated)));

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir al dashboard
        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="tel" name="phone" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-black dark:text-black hover:text-green-700 dark:hover:text-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-400 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
