<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الاقسام') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
                <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                    {{ __('الاقسام') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                    {{ __('اضافة قسم') }}
                </x-jet-nav-link>
        </div>
    </x-slot>

    {{-- alert --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>
