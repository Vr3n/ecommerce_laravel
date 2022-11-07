<x-modal wire:model="show">
    <div class="flex justify-between items-start rounded border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Add Mobile Number
        </h3>
        <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            wire:click="close">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
    <div class="my-6">
        <form wire:submit.prevent="mobileSubmitHandler" method="post">
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-effect="setTimeout(() => { show=false }, 2000)"
                    x-transition
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="mb-6">
                <label for="mobile_number"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobile
                    Number</label>
                <input type="text" id="mobile_number" pattern="[0-9]{10}"
                    wire:model="user_mobile_number.mobile_number" title="Mobile" maxlength="10" class="input"
                    placeholder="enter 10 digit mobile number!" required>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    @if ($mobile_numbers)
        <div class="overflow-scroll">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Mobile Number</th>
                        <th scope="col" class="py-3 px-6">Is Primary</th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobile_numbers as $mobile_number)
                        <tr id="{{ $mobile_number->id }}"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $mobile_number->mobile_number }}</th>
                            <td class="py-4 px-6">
                                @if ($mobile_number->is_primary)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <form method="POST"
                                    wire:submit.prevent="deleteUserMobileNumberHandler({{ $mobile_number }})">
                                    <button type="submit"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">🗑️
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="my-6">
            <p class="text-2xl">No Mobile Numbers Added! 📪</p>
        </div>
    @endif
</x-modal>
