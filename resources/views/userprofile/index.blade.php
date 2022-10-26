<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="{{ asset('/storage/images/' .Auth::user()->profile()->first()->profile_picture) }}"
                        alt="profile picture" />
                </div>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>
</x-app-layout>
