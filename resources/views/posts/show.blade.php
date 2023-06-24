<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalhes de Posts
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="sm:px-6 lg:px-12">

            @php
                $pathImage = url('imgs/posts/default.png');
                if($post->image){
                    $pathImage = url("storage/tenants/{$post->user->tenant->uuid}/posts/{$post->image}");
                }
            @endphp
            <div style="text-align: center">
                <h1 style='font-size: 2rem;'>{{$post->title}}</h1>
                <img src="{{ $pathImage }}"
                    alt="{{$post->title}}"
                    style="width: 50%; max-width:100%; margin: 0 auto;"
                >
                <p class="mt-6">{{$post->body}}</p>
            </div>
            <div style="display:flex; justify-content:center; margin-top:1rem;">
                <a href="{{route('posts.edit', $post->id)}}" class="bg-orange-300 text-white">[Editar]</a>
                <a href="{{route('posts.delete', $post->id)}}" class="ml-3 bg-red-600 text-white">[Deletar]</a>
            </div>
        </div>

    </div>
</x-app-layout>