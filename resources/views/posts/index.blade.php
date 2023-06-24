<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts Cadastrados
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="sm:px-6 lg:px-12">
            <div class="flex mb-3">
                <a href="{{route('posts.create')}}"
                    class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white p-2 shadow-sm font-bold mb-3 text-sm">
                    Cadastrar Post
                </a>
            </div>

            <table class="w-4/5 bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b justify-items-start">#ID</th>
                        <th class="py-2 px-4 border-b">Título</th>
                        <th class="py-2 px-4 border-b">Autor</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($posts as $post)
                    <tr>
                        <td class="py-2 px-4 border-b">{{$post->id}}</td>
                        <td class="py-2 px-4 border-b">{{$post->title}}</td>
                        <td class="py-2 px-4 border-b">{{$post->user->name}}</td>
                        <td class="py-2 px-4 border-b">
                            {{-- <a href="{{route('posts.edit', $post->id)}}">[Editar]</a> --}}
                            <a href="{{route('posts.show', $post->id)}}">[Detalhes]</a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td class="py-2 px-4 border-b"" colspan=" 4">Nenhum post cdastrado.</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>