<div class="bg-white shadow-sm text-right p-4">
    <a href="{{ route("blog.show", $post->slug) }}">
        <img src="{{ asset("storage/images/".$post->cover_image) }}" class="object-cover w-full h-96" alt="{{ $post->title }}">
        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
        <p>{!! Str::limit($post->body ,200,'...')!!}</p>
    </a>
</div>
