

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('التاجات') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
                <x-jet-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.index')">
                    {{ __('التاجات') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('tags.create') }}" :active="request()->routeIs('tags.create')">
                    {{ __('اضافة تاج') }}
                </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="p-4">
                    <form action="{{ route("tags.update", $category) }}" method="POST">
                        @csrf
                        @method("put")
                        <div>
                            <x-jet-label for="name" value="{{ __('الاسم') }}" class="mb-4 text-gray-500" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$tag->name"  autofocus autocomplete="name" />
                            <span class="block text-xs text-red-700 mt-3">اقصي عدد لحروف 50 حرف </span>
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <x-jet-button class="ml-4 mt-6">
                            {{ __('تحديث') }}
                        </x-jet-button>
                    </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
