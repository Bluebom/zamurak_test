<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $this->redirect(route('dashboard', absolute: false), navigate: true);
};

?>

<div class="w-full">
    <img src="/storage/images/register/img_1.png" class="absolute drop-shadow-[0px_-6px_0px_rgba(131,140,241)] w-[150px] bottom-0 left-0 ">
    <div class="absolute w-[30%] h-full bg-p-purple-400 top-0 right-0 z-0 hidden sm:block">
    </div>
    <div class="w-full flex flex-row-reverse sm:space-x-16 justify-center px-8 relative">
        <div class="flex-1 min-w-[350px] hidden md:block">
            <img src="/storage/images/register/register_img.png" alt="imagem de um pc" class="block">
        </div>
        <form wire:submit="register" class="min-w-[250px] sm:min-w-[300px] lg:min-w-[350px] pt-4 md:pt-8 lg:pt-12 flex justify-center items-start">
            <div class="backdrop-blur-sm p-2 rounded-lg w-[90%]">
                <h1 class="mb-4 text-3xl text-p-black-400 font-bold text-center sm:text-start">Register</h1>
                <!-- Email Address -->
                <div class="mt-2">
                    <x-input-label class="text-p-black-100 font-normal" for="email" :value="__('Username')" />
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full bg-p-purple-50 text-p-black-600" type="email" name="email" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-2">
                    <x-input-label class="text-p-black-100 font-normal" for="password" :value="__('Password')" />

                    <x-text-input wire:model="password" id="password" class="block mt-1 w-full bg-p-purple-50 text-p-black-600"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-2">
                    <x-input-label class="text-p-black-100 font-normal" for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full bg-p-purple-50 text-p-black-600"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-7">
                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
