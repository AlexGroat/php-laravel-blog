<x-layout>

    <section class="my-5 px-5 py-7 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
        <h1 class="flex justify-center text-3xl text-blue-500">Edit your post: </h1>
        <p class="mt-2">
            {{ $post->title }}
        </p>
        <form method="POST" action="/admin/posts/{{ $post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- going into the form directory, then the input file -->
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>

                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <div>
                <button class="mt-4 bg-blue-500 font-semibold hover:bg-blue-600 px-10 py-2 rounded-3xl text-white uppercase" type="submit">Update</button>
            </div>

        </form>
    </section>


</x-layout>