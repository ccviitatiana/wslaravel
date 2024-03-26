@csrf

<label class="uppercase text-white-900 text-xs">Título</label>
<span class="text-xs text-red-600">@error('title') {{ $message }}
    @enderror</span>
<input type="text" name="title" class="rounded bg-gray-700 border-gray-800 w-full mb-4" value="{{ old('title',@$post->title) }}">

<label class="uppercase text-white-900 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }}
    @enderror</span>
<input type="text" name="slug" class="rounded bg-gray-700 border-gray-800 w-full mb-4" value="{{ old('slug',@$post->slug) }}">

<label class="uppercase text-white-900 text-xs">Contenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message }}
    @enderror</span>
<input type="text" name="body" class="rounded bg-gray-700 border-gray-800 w-full mb-4" value="{{ old('body',@$post->body) }}">

<!-- <form method="POST" action="" enctype="multipart/form-data"> -->
{{-- <input class="rounded text-red-600" type="file" name="image"> --}}


<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
<input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-gray-100">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
<!-- </form> -->