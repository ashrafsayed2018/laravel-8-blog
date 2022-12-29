<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('المقالات') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
                <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('المقالات') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                    {{ __('اضافة مقال') }}
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
               {{-- livewire table  --}}
               <livewire:posts.index />
            </div>
        </div>
    </div>
</x-app-layout>
