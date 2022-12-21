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

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="p-4">
                    <form action="{{ route("categories.store") }}" method="POST">
                        @csrf

                        <div>
                           <small class="block font-medium text-sm text-gray-700 mb-4">اختر قسم رئيسي للاقسام الفرعيه فقط </small>
                           <select name="parent_id" class="w-full mb-6 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                               <option value="">اختر القسم الرئيسي</option>

                           </select>
                        </div>


                        <div>
                            <x-jet-label for="name" value="{{ __('الاسم') }}" class="mb-4 text-gray-500" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                            <span class="block text-xs text-red-700 mt-3">اقصي عدد لحروف 50 حرف </span>
                            <x-jet-input-error for="name" class="mt-2" />
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
