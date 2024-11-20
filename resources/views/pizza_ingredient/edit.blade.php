<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pizza Ingredients') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('pizza_ingredients.update',['pizza_ingredient'=>$pizza_ingredient->id])}}">
        @method('put')  
        @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" 
             disabled="disable" value="{{$pizza_ingredient->id}}">
                <div id="idHelp" class="form-text">Code Pizza Ingredients</div>
            </div>

            <div class="mb-3">
                <label for="pizza_id" class="form-label">Pizza</label>
                <select class="form-select" id="pizza_id" name="pizza_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($pizzas as $pizza)
                @if ($pizza->id == $pizza_ingredient->pizza_id)
                <option selected value="{{$pizza->id}}">{{$pizza->pizza_name}}</option>
                @else
                <option value="{{$pizza->id}}">{{$pizza->pizza_name}}</option>
                @endif
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ingredient_id " class="form-label">Ingredient</label>
                <select class="form-select" id="ingredient_id" name="ingredient_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($ingredients as $ingredient )
                @if ($ingredient->id == $pizza_ingredient->ingredient_id )
                <option selected value="{{$ingredient->id}}">{{$ingredient->ingredient_name}}</option>
                @else
                <option value="{{$ingredient->id}}">{{$ingredient->ingredient_name}}</option>
                @endif
                @endforeach
                </select>
            </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('pizza_ingredients.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>