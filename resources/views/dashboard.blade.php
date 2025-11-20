<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

<div class="text-center mt-12">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center text-primary font-medium hover:text-secondary transition-colors">
                Retour aux articles <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

</x-app-layout>
