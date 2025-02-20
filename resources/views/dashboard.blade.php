<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Auth::user()->profile_photo)
    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
         alt="Foto Profil" class="w-16 h-16 rounded-full">
@else
    <img src="{{ asset('default-profile.png') }}"
         alt="Default Profile" class="w-16 h-16 rounded-full">
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


