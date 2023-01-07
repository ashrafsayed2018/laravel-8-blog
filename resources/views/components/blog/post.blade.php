<div class="bg-white shadow-sm text-right p-4">
    <a href="">
        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
        <p>{!! Str::limit($post->body ,200,'...')!!}</p>
    </a>
</div>
