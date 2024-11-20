<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizza Ingredient') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{ route('pizza_ingredients.create') }}" class="btn btn-success"> Add </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Pizza</th>
                <th scope="col">Ingredient</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($pizza_ingredients as $pizza_ingredient)
              <tr>
                <th scope="row">{{$pizza_ingredient->id}}</th>
                <td>{{$pizza_ingredient->pizza_name}}</td>
                <td>{{$pizza_ingredient->ingredient_name}}</td>
                <td>
                    <a href="{{route('pizza_ingredients.edit',['pizza_ingredient'=> $pizza_ingredient->id])}}"
                        class="btn btn-info">Edit</a>
                        
                    <form action="{{route('pizza_ingredients.destroy',['pizza_ingredient'=>$pizza_ingredient->id])}}"
                    method="POST" style="display: inline-block">
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