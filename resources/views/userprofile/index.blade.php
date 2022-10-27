<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="flex flex-col space-y-2">
                <div>
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
                <p class="text-gray-500">
                    <x-heroicon-o-envelope class="w-6 inline-block text-black ml-3" /> {{ Auth::user()->email }}
                </p>
            </div>
        </div>
    </x-slot>

    {{-- <div class="px-20 py-10 mx-auto container">
        <div class="card w-96 bg-white shadow-xl">
            <div class="card-body">
                <p>Email: {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div> --}}

</x-app-layout>
