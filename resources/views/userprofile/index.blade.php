<x-app-layout>
    <div class="p-12 container mx-auto">
        <div class="flex flex-col space-y-4">
            {{-- Personal Detail Card --}}
            <div class="card">
                <div class="flex flex-col items-center space-y-2">
                    <div class="self-center w-24 rounded-full">
                        <img src="{{ asset('/storage/images/' .Auth::user()->profile()->first()->profile_picture) }}"
                            alt="profile picture" />
                    </div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s {{ __('Profile') }}
                    </h2>
                    <p>
                        <x-heroicon-o-envelope class="w-6 inline-block text-black mr-1" /> <span
                            class="prose prose-base">{{ Auth::user()->email }}</span>
                    </p>
                    <p>
                        <x-heroicon-o-envelope class="w-6 inline-block text-black mr-1" /> <span
                            class="prose prose-base">{{ Auth::user()->email }}</span>
                    </p>
                </div>
            </div>
            {{-- Personal Detail Card --}}
            <button type="button" onclick="window.livewire.emit('openModal', 'mobile-number')"
                class="card text-center cursor-pointer group transition-all delay-250">
                <p class="prose prose-base transition-all delay-250 text-black group-hover:text-blue-600">
                    <x-heroicon-o-plus-circle class="w-6 inline-block mr-4" /> Add Mobile Number
                </p>
            </button>
        </div>
    </div>


</x-app-layout>
