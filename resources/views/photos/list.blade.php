<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                @auth
                   Photos
                @else
                    Anne Gallery
                @endauth
            </div>
        </div>
    </x-slot>
    <div class="py-5">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                    @if (session('msg'))
                        <div class="bg-red-400 border w-1/2 p-3 text-center text-white mb-5">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <table class="w-full bg-white">
                        <tr>
                            <th class="border text-left py-2 px-2">#ID</th>
                            <th class="border text-left py-2 px-8">TITRE</th>
                            <th class="border text-left py-2 px-8">CATEGORIE</th>
                            <th class="border text-left py-2 px-4">FILE</th>
                            <th class="border text-left py-2 px-12">ACTION</th>
                        </tr>
                        @foreach ($photoCategories as $key=> $photoCategorie)
                            <tr>
                                <td class="border  py-2 px-2">{{$key+1}}</td>
                                <td class="border  py-2 px-8">{{$photoCategorie->titre}}</td>
                                <td class="border  py-2 px-8">{{$photoCategorie->categorie->name}}</td>
                                <td class="border  py-2 px-2">
                                    <img src="pictures/{{$photoCategorie->file}}" class="h-40 w-40" />
                                </td>
                                <td class="border  py-2 px-10">
                                    <a class="bg-green-300 p-2 font-bold border-none rounded-lg" href="{{route('photos.create')}}">ADD</a>
                                    <a class="bg-gray-300 p-2 font-bold border-none rounded-lg" href="{{route('photos.edit',$photoCategorie->id)}}">UPDATE</a>
                                    <a class="bg-red-500 p-2 font-bold border-none rounded-lg" href="{{route('photos.destroy',$photoCategorie->id)}}">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$photoCategories->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
