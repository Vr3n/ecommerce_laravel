<div  x-cloak x-show="show" x-data="{ show: @entangle($attributes->wire('model')).defer }" class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
    <div x-cloak x-show="show" class="fixed inset-0 transform">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div x-cloak x-show="show" x-transition.duration.250ms class="bg-white p-6 rounded-lg shadow-md overflow-hidden transform sm:w-full sm:mx-auto md:max-w-4xl max-w-lg">
        {{ $slot }}
    </div>
</div>
