<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter des Photos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden mx-auto  sm:rounded-lg">
               <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div>
                    <input type="text" name="title" class="border-gray-300 w-1/2" placeholder="Titre de la photos" value="{{old('title')}}">
                  </div>
                  <div>
                    <input type="file" name="file" class="border-gray-300 w-1/2">
                  </div>
                  <div>
                      <select name="categorie_id" class="w-1/2">
                          <option value="">--------------------CATEGORIE---------------------</option>
                          @foreach($categories as $key => $categorie)
                               <option value="{{$categorie->id}}" >{{$categorie->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div>
                    <button type="submit" class="my-4 py-2 bg-green-100 w-1/2">AJOUTER</button>
                  </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
