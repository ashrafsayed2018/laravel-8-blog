<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('المقالات ') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
                <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('المقالات ') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                    {{ __('اضافة مقال') }}
                </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="p-4">
                    <form action="{{ route("posts.store") }}" method="POST">
                        @csrf
                        {{-- title --}}
                        <div>
                            <x-jet-label for="title" value="{{ __('العنوان') }}" class="mb-4 text-gray-500" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus autocomplete="title" />
                            <span class="block text-xs text-red-700 mt-3">اقصي عدد لحروف 50 حرف </span>
                            <x-jet-input-error for="title" class="mt-2" />
                        </div>

                        {{-- body --}}

                        <div class="mt-4">
                            <x-jet-label for="body" value="{{ __('الوصف') }}" class="mb-4 text-gray-500" />
                            <x-trix name="body" styling="" value=""></x-trix>
                            <x-jet-input-error for="body" class="mt-2" />
                        </div>

                        <x-jet-button class="ml-4 mt-6">
                            {{ __('حفظ') }}
                        </x-jet-button>
                    </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
