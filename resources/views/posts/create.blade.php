<x-layout>

    <x-setting>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

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
                <button class="mt-4 bg-blue-500 font-semibold hover:bg-blue-600 px-10 py-2 rounded-3xl text-white uppercase" type="submit">Publish</button>
            </div>

        </form>
    </x-setting>


</x-layout>