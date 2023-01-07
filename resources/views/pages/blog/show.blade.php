<x-base-layout>
    {{-- meta descriptin --}}
    @section('meta_description',$post->meta_description)

    <main class="min-h-screen">
        <section class="container w-full pt-24 mx-auto space-y-4 bg-white">
            <img src="{{ asset("storage/images/".$post->cover_image) }}" class="object-cover" alt="{{ $post->title }}">
            <article>
                <h1 class="font-bold">{{ $post->title }}</h1>

                <div>
                    {!! $post->body !!}
                </div>
            </article>

        </section>
    </main>
</x-base-layout>
