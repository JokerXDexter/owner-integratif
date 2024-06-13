<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Semua Kost') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('List Kost Saya') }}
                </div>
                <div class="p-6">
                    @foreach ($dorms as $dorm)
                        <div class="mb-4 p-4 border rounded-lg bg-gray-100 dark:bg-gray-700">
                            <a href="{{ route('dorm.show', $dorm->id_dorms) }}"
                                class="text-xl font-semibold text-blue-600 dark:text-blue-400">
                                {{ $dorm->name }}
                            </a>
                            <div class="mt-2">
                                <img src="{{ asset($dorm->images) }}" alt="{{ $dorm->name }}" class="custom-image rounded-lg">
                            </div>
                            <div class="mt-2 py-2 px-4 bg-blue-500 text-white inline-block rounded">
                                {{ $dorm->type }}
                            </div>
                            <div class="mt-2 text-gray-800 dark:text-gray-300">
                                {{ \Illuminate\Support\Str::words($dorm->description, 10, '...') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
