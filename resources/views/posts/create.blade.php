<x-layout>

    <section class="my-5 px-5 py-7 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data"> 
            @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Title
                </label>

                <input class="border border-gray-400 w-full" type="text" id="title" name="title" value="{{ old('title') }}" required>

                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                    slug
                </label>

                <input class="border border-gray-400 w-full" type="text" id="slug" name="slug" value="{{ old('slug') }}" required>

                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                    thumbnail
                </label>

                <input class="border border-gray-400 w-full" type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" required>

                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                    Excerpt
                </label>
                <textarea name="excerpt" id="excerpt" class="w-full text-sm focus:outline-none focus:ring border border-gray-400" rows="2" 
                placeholder="Insert your post excerpt here." required>{{ old('excerpt') }}</textarea>

                @error('excerpt')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                    body
                </label>
                <textarea name="body" id="body" class="w-full text-sm focus:outline-none focus:ring border border-gray-400" rows="5" 
                placeholder="Insert your post here." required>{{ old('body') }}</textarea>

                @error('body')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                    Category
                </label>

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button class="mt-2 bg-blue-500 font-semibold hover:bg-blue-600 px-10 py-2 rounded-3xl text-white uppercase" type="submit">Publish</button>
            </div>

        </form>
    </section>
</x-layout>