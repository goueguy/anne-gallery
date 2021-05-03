<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                @auth
                    Mes Favoris
                @else
                    Anne Gallery
                @endauth
            </div>
            
        </div>
       
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 mb-12">
            <div class="flex flex-row">
               
                    
                    <div class="grid grid-cols-3 gap-4">
                         @foreach($dataPhoto as $photo)
                            <div>
                                    <h2 class="capitalize font-bold">{{$photo->titre}}</h2>
                                  <img src="/pictures/{{$photo->file}}" class="h-40 w-40 mr-" alt="">
                                  
                                  <span><?= $categorie["name"];?></span>
                                 

                            </div>
                        @endforeach
                    </div>
                   
                
            </div>
        </div>
       
    </div>
</x-app-layout>
