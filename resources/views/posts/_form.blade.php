@csrf
<label class="uppercase text-gray-100 text-xs">Título</label>
<span class="text-xs text-red-600">@error('title') {{ $message }}
    @enderror</span>
<input type="text" name="title" class="rounded bg-gray-900 border-gray-800 w-full mb-4" value="{{ old('title',@$post->title) }}">

<label class="uppercase text-gray-100 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }}
    @enderror</span>
<input type="text" name="slug" class="rounded bg-gray-900 border-gray-800 w-full mb-4" value="{{ old('slug',@$post->slug) }}">

<label class="uppercase text-gray-100 text-xs">Contenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message }}
    @enderror</span>
<input type="text" name="body" class="rounded bg-gray-900 border-gray-800 w-full mb-4" value="{{ old('body',@$post->body) }}">

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-gray-100">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
