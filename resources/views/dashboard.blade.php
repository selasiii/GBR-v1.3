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
                    @if(auth()->user()->role_id == 3)
                    <p>{{ __("You're logged in! You are an admin.") }}</p>
                    @elseif(auth()->user()->role_id == 2)
                    <p>{{ __("You're logged in! You are an agent.") }}</p>
                    @elseif(auth()->user()->role_id == 1)
                    <p>{{ __("You're logged in! You are a user.") }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
