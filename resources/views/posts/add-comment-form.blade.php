@auth
<x-panel>

    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-3">Post your comment below!</h2>
        </header>

        <div class="mt-4">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="6" placeholder="Insert your comment here." required></textarea>

            @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end border-t border-gray-200">
            <button class="mt-3 bg-blue-500 font-semibold hover:bg-blue-600 px-10 py-3 rounded-3xl text-white uppercase" type="submit">Post</button>
        </div>

    </form>


</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in </a> to leave a comment.
</p>
@endauth