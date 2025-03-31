<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingredientes Extra') }}
        </h2>
    </x-slot>

    <div class="container">
        <br>
        <a href="{{ route('extra_ingredients.create') }}" class="btn btn-success">Add</a>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Nombre Ingediente</th>
                <th scope="col">Costo Ingediente</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($extra_ingredients as $extra_ingredient)
              <tr>
                <th scope="row">{{$extra_ingredient->id}}</th>
                <td>{{$extra_ingredient->name}}</td>
                <td>{{$extra_ingredient->price}}</td>
                <td>
                    <a href="{{route('extra_ingredients.edit',['extra_ingredient'=>$extra_ingredient->id])}}" class="btn btn-info">Editar</a>
                    <form action="{{route('extra_ingredients.destroy', ['extra_ingredient'=>$extra_ingredient->id])}}" method="POST" style="display: inline-block">
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