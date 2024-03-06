@extends('template')

@section('content')
<div class="relative overflow-hidden bg-gray-700 px-20 py-20 rounded-lg mx-8">
    <span class="uppercase text-gray-100"></span>
    <h1></h1>
    <p></p>
    <img src="{{ asset('build/assets/gm1.png') }}" class="absolute opacity-10 -right-28 -bottom-20" alt="">
</div>
<div class="md:grid flex md:grid-cols-2 flex-col px-[5%] pb-20 pt-10 gap-20">
    <div class=''>
        <h1 class="text-2xl mb-8 text-gray-900">Registros</h1>
        <div class='pb-10 mb-4 justify-items-start items-center'>
            @foreach ($posts as $post)
            <div class="mb-5">
                <a href="{{ route('post', $post->slug) }}" class="">
                    <div class="bg-gray-200 rounded-t-lg px-6 pt-6 pb-3 w-full">
                        <p class="text-xs flex items-center gap-2">
                            <span class="uppercase text-gray-200 bg-gray-900 rounded-full px-2 py-1">Tutorial</span>
                            <span>{{ $post->created_at->format('d/m/Y') }}</span>
                        </p>
                        <h2 class="truncate text-lg text-gray-900 px-5 pt-4">{{ $post->title }}</h2>
                        <img src="{{ url('images/' . $post->image_path) }}" alt="">
                    </div>
                </a>
                <div id="content_reaction" class="bg-gray-200 rounded-b-lg flex items-center grow-2 justify-between flex-grow gap-8 bg-gray-200 px-6 pb-4 w-full">
                    <img name="reaction" id="{{ $post->id }}" src="{{ URL( '/reaction-on.png' ) }}" class="ml-7 size-6" alt="">

                    <input class="border-none focus:ring-0 rounded-lg w-[420px]" type="text" placeholder="Comment...">
                </div>
            </div>
            @endforeach
            <script>
                reaction = document.getElementsByName("reaction");
                let toggle = true;
                $(reaction).on("click", function() {
                    if (!toggle) {
                        reaction.setAttribute("src","{{ URL( '/reaction-on.png' ) }}")
                    } else {
                        alert("aaaaa")
                    }
                });
            </script>
        </div>
        {{ $posts->links() }}

    </div>


    <div class=''>
        defdwerewf
    </div>
</div>

@endsection()


<!-- Martha Isabel lo de Ray -->