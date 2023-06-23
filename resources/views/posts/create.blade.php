<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastro de Posts
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto px-4 py-8">
            @if ($errors->any())
                <ul class="max-w-xl rounded-lg shadow-md bg-red-500 text-white mb-2">
                    @foreach ($errors->all() as $error)
                        <li class=" p-1">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <form class="max-w-xl bg-white p-6 rounded-lg shadow-md" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">Título:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="title" id="titulo" type="text" placeholder="Digite o título" value="{{old('title')}}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="corpo">Corpo:</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="body" id="corpo" rows="5" placeholder="Digite o corpo" value="{{old('body')}}"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">Imagem:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="image" id="image" type="file" value="{{old('image')}}">
                </div>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">Salvar</button>
            </form>
        </div>

    </div>
</x-app-layout>