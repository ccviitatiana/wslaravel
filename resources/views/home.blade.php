@extends('template')

@section('content')
<div class="relative overflow-hidden bg-gray-700 px-20 py-20 rounded-lg mx-8">
    <span class="uppercase text-gray-100"></span>
    <h1></h1>
    <p></p>
    <img src="{{ asset('build/assets/gm1.png') }}" class="absolute opacity-10 -right-28 -bottom-20" alt="">
</div>

<div class='px-[5%] pb-20 pt-10 md:w-3/5'>
    <h1 class="text-2xl mb-8 text-gray-900">Registros</h1>
    <div class='grid grid-cols-1 gap-4 pb-10 mb-4 justify-items-start items-center'>
        @foreach ($posts as $post)
        <a href="{{ route('post', $post->slug) }}" class="bg-gray-200 rounded-lg px-6 py-4 w-full">
            <p class="text-xs flex items-center gap-2">
                <span class="uppercase text-gray-200 bg-gray-900 rounded-full px-2 py-1">Tutorial</span>
                <span>{{ $post->created_at->format('d/m/Y') }}</span>
            </p>
            <h2 class="text-lg text-gray-900 mt-2">{{ $post->title }}</h2>
            @foreach ($images as $image)

            <img src="{{ url('images/' . $image->image_path) }}" alt="">

            @endforeach

        </a>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>

@endsection()