@extends('template')

@section('content')
    <div class='px-[10%] pb-20  md:w-3/5'>
        <h1 class="text-2xl mb-8 text-gray-900">Registros</h1>
        <div class='grid grid-cols-1 gap-4 pb-10 mb-4 justify-items-start items-center'>
            @foreach ($posts as $post)
                <a href="" class="bg-gray-200 rounded-lg px-6 py-4 w-full">
                    <p class="text-xs flex items-center gap-2">
                        <span class="uppercase text-gray-200 bg-gray-900 rounded-full px-2 py-1">Tutorial</span>
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                    </p>
                    <h2 class="text-lg text-gray-900 mt-2">{{ $post->title }}</h2>
                </a>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
@endsection()
