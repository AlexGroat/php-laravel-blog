@props(['comment'])
<article class="flex bg-gray-50 border rounded-lg p-6 space-x-4">
    <div style="flex-shrink: 0;">
        <img src="https://i.pravatar.cc/60?u={{ $comment->id}}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-6">
            <h3 class="font-bold"> {{ $comment->author->username}}</h3>
            <time class="text-xs">{{ $comment->created_at->diffForHumans()}}</time>
        </header>
 
        <p>{{ $comment->body }}</p>
    </div>
</article>