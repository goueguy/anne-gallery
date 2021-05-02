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
            <div class="flex flex-row ml-auto">
                <div class="mr-5">
                    <a href="{{route('register')}}">S'INSCRIRE</a>
                </div>
                <div class="float-left">
                    <a href="{{route('login')}}">SE CONNECTER</a>
                </div>
           </div>
            
        </div>
       
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 mb-12">
            <form action="{{route('photos.find')}}" method="POST">
                @csrf
                <div class="flex flex-row">
                    <div  class="mr-4">
                        <input type="text" name="title" placeholder="Titre à rechercher"/>
                    </div>
                    <div>
                        <select name="categorie_id">
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                @if (session('msg'))
                    <div class="bg-red-400 border w-1/2 p-3 text-center text-white mb-5">
                        {{ session('msg') }}
                    </div>
                    @endif
                    <div class="flex justify-between">
                        @foreach ($photoCategories as $key=> $photoCategorie)
                            <div class="mr-4">
                                <p class="text-white bg-green-400 mb-4 text-center font-bold">{{$photoCategorie->categorie->name}}</p>
                                <img src="pictures/{{$photoCategorie->file}}" class="h-1/2 w-screen" />
                                <button type="submit" class="p-2 mt-5 text-white bg-blue-500">Liker</button>
                                @auth
                                    <a href="/photos/{{$photoCategorie->id}}/download" target="_self" class="p-3 mt-5 text-white bg-red-500">Télécharger</a>
                                @endauth
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
