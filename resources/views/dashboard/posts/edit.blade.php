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

                    {{-- post image --}}

                    <img src="{{ asset("storage/images/".$post->cover_image) }}" class="block w-full h-80 object-cover" alt="{{ $post->title }}">
                    <x-form method="put" action="{{ route('posts.update',$post) }}" has-files >
                       <div class="space-y-6">
                            {{-- cover image  --}}
                            <div>
                                <x-jet-label for="cover_image" value="{{ __('صورة الغلاف') }}" class="mb-4 text-gray-500" />
                                <x-jet-input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" :value="old('cover_image')"  autofocus autocomplete="cover_image" />
                                <span class="block text-xs text-red-700 mt-3">نوع الصوره يجب ان يكون jpg , png ,jpeg </span>

                                <x-jet-input-error for="cover_image" class="mt-2" />

                            </div>

                            {{-- title --}}
                            <div>
                                <x-jet-label for="title" value="{{ __('العنوان') }}" class="mb-4 text-gray-500" />
                                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title"  autofocus autocomplete="title" />
                                <span class="block text-xs text-red-700 mt-3">اقصي عدد لحروف 50 حرف </span>
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>

                            {{-- tags --}}

                             {{-- <x-tags :tags="$tags"></x-tags> --}}

                             <div>
                                <x-jet-label for="tags" value="{{ __('اختار التاجات') }}" class="mb-4 text-gray-500" />
                                <select name="tags[]" id="tags" multiple
                                x-data="{}"
                                x-init="function() {choices($el)}">
                                    @foreach ($tags as $tag)
                                       <option value="{{ $tag->id }}"

                                        @if (in_array($tag->id,$postTags))
                                            selected
                                        @endif
                                        >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                             </div>
                            {{-- category --}}
                            <div>
                                <x-jet-label for="category_id" value="{{ __('القسم') }}" class="mb-4 text-gray-500" />
                                <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="">اختر القسم</option>

                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- body --}}

                            <div>
                                <x-jet-label for="body" value="{{ __('الوصف') }}" class="mb-4 text-gray-500" />
                                <x-trix name="body" styling="overflow-y-scroll h-96" value="">{{ $post->body }}</x-trix>
                                <x-jet-input-error for="body" class="mt-2" />
                            </div>

                            {{-- schedule --}}

                            <div>
                                <x-pikaday name="published_at" format="YYYY-MM-DD" value="{{ $post->published_at }}" />
                                <x-jet-input-error for="published_at" class="mt-2" />
                            </div>

                            {{-- meta description --}}
                            <div>
                                <x-jet-label for="meta_description" value="{{ __('وصف الميتا') }}" class="mb-4 text-gray-500" />
                                <x-trix name="meta_description" styling="overflow-y-scroll h-42" value="">{{ $post->meta_description }}</x-trix>
                                <x-jet-input-error for="meta_description" class="mt-2" />
                            </div>
                       </div>



                        <x-jet-button class="ml-4 mt-6">
                            {{ __('تحديث') }}
                        </x-jet-button>
                    </x-form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
