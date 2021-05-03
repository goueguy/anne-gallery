<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Photo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden mx-auto  sm:rounded-lg">
               <form action="{{route('photos.update',$photo->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div>
                    <input type="text" name="title" class="border-gray-300 w-1/2" placeholder="Titre de la photos" value="{{$photo->titre}}">
                  </div>
                  <div class="mt-2 mb-2">
                    <input type="file" name="file" class="border-gray-300 w-1/2">
                  </div>
                  <div>
                    <select name="categorie_id" class="w-1/2">
                        @foreach($categories as $key => $categorie)
                            <option value="{{$categorie->id}}" {{$categorie->id==$photo->categorie_id ? "selected":""}}>{{$categorie->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mt-8 mb-8">
                    <label>Photo actuelle</label>
                    <img src="/pictures/{{$photo->file}}" class="h-40 w-96" />
                  </div>
                  <div>
                    <input type="hidden" name="file_old" value="{{$photo->file}}">
                    <button type="submit" class="my-4 py-2 bg-green-100 w-1/2">MODIFIER</button>
                  </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
