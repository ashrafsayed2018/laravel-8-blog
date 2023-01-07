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

                <h1 class="font-bold text-2xl my-2">{{ $post->title }}</h1>

                <div>{!! $post->body !!}</div>
                <button class="p-2 mt-16 text-xs text-white bg-blue-500">
                    <a href="https:www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">مشاركه على فيسبوك</a>
                </button>
            </article>

        </section>
    </main>
</x-base-layout>
