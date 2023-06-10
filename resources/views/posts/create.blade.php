<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastro de Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-4 py-8">
            <form class="max-w-xl bg-white p-6 rounded-lg shadow-md" action="{{route('posts.store')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">Título:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="title" id="titulo" type="text" placeholder="Digite o título">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="corpo">Corpo:</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="body" id="corpo" rows="5" placeholder="Digite o corpo"></textarea>
                </div>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">Salvar</button>
            </form>
        </div>

    </div>
</x-app-layout>