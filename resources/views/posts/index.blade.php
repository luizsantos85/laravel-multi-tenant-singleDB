<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts Cadastrados
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto sm:px-6 lg:px-12">
            <table class="border-separate border-spacing-2 border border-slate-500">
                <thead>
                    <tr>
                        <th class="border border-slate-700">#ID</th>
                        <th class="border border-slate-600">Título</th>
                        <th class="border border-slate-600">Author</th>
                        <th class="border border-slate-600">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td class="border border-slate-700">{{$post->id}}</td>
                        <td class="border border-slate-700">{{$post->title}}</td>
                        <td class="border border-slate-700">{{$post->user->name}}</td>
                        <td class="border border-slate-700">[Editar]</td>
                    </tr>

                    @empty
                        <tr>
                            <td class="border border-slate-700" colspan="4">Nenhum post cdastrado.</td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>