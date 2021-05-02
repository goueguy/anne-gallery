<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Catégorie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden mx-auto  sm:rounded-lg">
               <form action="{{route('categories.update',$categorie->id)}}" method="post">
                 @csrf
                  <div>
                    <input type="text" name="name" class="border-gray-300 w-1/2" value="{{$categorie->name}}">
                  </div>
                  <div>
                    <button type="submit" class="my-4 py-2 bg-green-100 w-1/2">MODIFIER</button>
                  </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
