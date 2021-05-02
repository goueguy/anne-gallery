<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catégories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full shadow-lg bg-white">
                    <thead>
                      <tr class="bg-blue-100 text-center">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $key=> $categorie)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$categorie->name}}</td>
                          <td>
                              <a href="{{route('categories.create')}}">ADD</a>
                              <a href="{{route('categories.edit',$categorie->id)}}">EDIT</a>
                              <a href="{{route('categories.destroy',$categorie->id)}}"  onclick="return confirm('Voulez-vous supprimer cette catégorie ?');">DELETE</a>
                          </td>
                        </tr>
                      @endforeach
                     
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
