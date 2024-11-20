<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingredientes') }}
        </h2>
    </x-slot>

    <div class="container">
        <br>
        <a href="{{ route('ingredients.create') }}" class="btn btn-success">Add</a>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Nombre Ingediente</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($ingredients as $ingredient)
              <tr>
                <th scope="row">{{$ingredient->id}}</th>
                <td>{{$ingredient->name}}</td>
                <td>
                    <a href="{{route('ingredients.edit',['ingredient'=>$ingredient->id])}}" class="btn btn-info">Editar</a>
                    <form action="{{route('ingredients.destroy', ['ingredient'=>$ingredient->id])}}" method="POST" style="display: inline-block">
                    @method('delete')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        </div>
</x-app-layout>