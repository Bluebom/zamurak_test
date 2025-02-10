<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};
?>

<div class="w-full">
    <img src="/storage/images/login/img_2.png" class="absolute w-[350px] bottom-0 right-10">
    <img src="/storage/images/login/img_1.png" class="absolute w-[350px] bottom-0 right-10">
    <img src="/storage/images/login/img_3.png" class="absolute w-[150px] top-0 right-1/3 translate-x-1/2 -translate-y-1/2">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-full flex sm:space-x-16 justify-center px-8 relative">
        <div class="flex-1 min-w-[350px] hidden md:block">
            <img src="/storage/images/login/login_img.png" alt="imagem de um pc" class="block">
        </div>
        <form wire:submit="login" class="min-w-[250px] sm:min-w-[300px] lg:min-w-[350px] pt-4 md:pt-8 lg:pt-14 flex justify-center items-start">
            <div class="backdrop-blur-sm w-full p-2 rounded-lg">
                <h1 class="mb-4 text-3xl text-p-black-400 font-bold text-center">Login</h1>
                <div>
                    <x-input-label class="text-p-black-100 font-normal" for="email" :value="__('Username:')" />
                    <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full bg-p-purple-50 text-p-black-600" type="email" name="email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label class="text-p-black-100 font-normal" for="password" :value="__('Password:')" />
                    <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full bg-p-purple-50 text-p-black-600" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-8 ">
                    <x-primary-button>
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
