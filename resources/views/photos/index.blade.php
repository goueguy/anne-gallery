<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                @auth
                    Catégories
                @else
                    Anne Gallery
                @endauth
            </div>
        </div>
       
    </x-slot>
    <div class="mx-60 py-5">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 mb-12">
            <form action="{{route('photos.find')}}" method="POST">
                @csrf
                <div class="flex flex-row">
                    <div  class="mr-4">
                        <input type="text" class="@error('title') bg-red-200 @enderror" name="title" placeholder="Titre à rechercher"/>
                    </div>

                    <div>
                        <select name="categorie_id" class="@error('categorie_id') bg-red-200 @enderror">
                            <option value="">--------------------CATEGORIE---------------------</option>
                            @foreach($listCategories as $key => $categorie)
                                 <option value="{{$categorie->id}}" >{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="bg-green-200 border-0 p-2 ml-5">RECHERCHER</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <div class="mx-60 py-5">
            @if (session('msg'))
                <div class="bg-red-400 border p-3 text-center text-white mb-5">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="flex flex-row mb-32">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($photoCategories as $key=> $photoCategorie)
                        <div class="w-full">
                             <img src="pictures/{{$photoCategorie->file}}" class="w-full h-full" />
                             <div class="inline-block">
                                <form action="{{route('photos.liker',$photoCategorie->id)}}" method="POST">
                               @csrf
                               <input type="hidden" name="categorie_id" value="{{$photoCategorie->id}}">
                               <button type="submit" class="p-3 mt-8 mr-5 text-white bg-blue-500">Liker</button>
                                </form>
                             </div>
                             <a href="/photos/{{$photoCategorie->id}}/download" target="_blank" class=" p-3 text-white bg-red-600">Télécharger
                             </a>
                        </div>
                        
                    @endforeach
                </div>
            </div>
    </div>
</x-app-layout>
