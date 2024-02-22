<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Lista registros') }}
            <a href="{{ route('posts.create') }}" class="text-sm bg-gray-800 text-white rounded px-2 py-1 border border-cyan-50">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="mb-4">
                        @foreach(Auth::user()->posts as $post)
                        <tr class="border-b border-gray-600 text-sm">
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post ) }}" class="text-indigo-300">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Are you sure?');" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-gray-100 text-black rounded px-4 py-2" type="submit">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $posts->links() }}

                </div>
            </div>
        </div>

    </div>
</x-app-layout>