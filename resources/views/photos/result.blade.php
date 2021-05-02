<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catégories
        </h2>
    </x-slot>
    
    <div class="py-5">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 mb-12">
            <form action="{{route('photos.find')}}" method="POST">
                @csrf
                <div class="flex flex-row">
                    <div  class="mr-4">
                        <input type="text" name="title" placeholder="Titre à rechercher" value="{{old('title')}}"/>
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
                
                  <div class="flex justify-between">
                        @if(count($photoCategories)>0)
                            @foreach ($photoCategories as $key=> $photoCategorie)
                                <div class="mr-4">
                                    <p class="text-white bg-green-400 mb-4 text-center font-bold">{{$photoCategorie->categorie->name}}</p>
                                    <img src="/pictures/{{$photoCategorie->file}}" class="h-1/2 w-screen" />
                                    
                                </div>
                            @endforeach
                        @endif
                  </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
