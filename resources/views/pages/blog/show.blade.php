<x-base-layout>
    {{-- meta descriptin --}}
    @section('meta_description',$post->metaDescription())
    {{-- fecebook meta --}}

    @section('og:title', $post->title)
    @section('og:image',"storage/images/" .$post->cover_image)

    {{-- title  --}}

    @section('title', $post->title)

    <main class="min-h-screen">
        <section class="lg:w-3/4 pt-24 mx-auto space-y-4">
            <article class="text-right bg-white">
                <img src="{{ asset("storage/images/".$post->cover_image) }}" class="object-cover" alt="{{ $post->title }}">

                <div>
                    <div class="flex justify-around items-center mt-6">
                        {{-- author --}}
                        <div class="author flex justify-between items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                             <span>الادمن </span>
                        </div>

                        {{-- time --}}
                        <div class="author flex justify-between items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span>{{ $post->created_at->diffForHumans(); }}</span>
                        </div>

                        {{-- views --}}
                        <div class="author flex justify-between items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $post->views }}</span>
                        </div>
                    </div>
                    <h1 class="font-bold text-2xl my-2">{{ $post->title }}</h1>
                    <div>{!! $post->body !!}</div>
                    <button class="p-2 mt-16 text-xs text-white bg-blue-500">
                        <a href="https:www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">مشاركه على فيسبوك</a>
                    </button>
                </div>
            </article>

        </section>
    </main>
</x-base-layout>
