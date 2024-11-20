<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pizza Raw Material') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('pizza_raw_materials.update',['pizza_raw_material' =>$pizza_raw_material->id])}}">
        @method('put')  
        @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" 
             disabled="disable" value="{{$pizza_raw_material->id}}">
                <div id="idHelp" class="form-text">Code Pizza Raw Materials</div>
            </div>

            <div class="mb-3">
                <label for="pizza_id" class="form-label">Pizza</label>
                <select class="form-select" id="pizza_id" name="pizza_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($pizzas as $pizza)
                @if ($pizza->id == $pizza_raw_material->pizza_id)
                <option selected value="{{$pizza->id}}">{{$pizza->pizza_name}}</option>
                @else
                <option value="{{$pizza->id}}">{{$pizza->pizza_name}}</option>
                @endif
                @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="raw_material_id " class="form-label">Raw Materials</label>
                <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($raw_materials as $raw_material )
                @if ($raw_material->id == $pizza_raw_material->raw_material_id )
                <option selected value="{{$raw_material->id}}">{{$raw_material->raw_materialst_name}}</option>
                @else
                <option value="{{$raw_material->id}}">{{$raw_material->raw_materialst_name}}</option>
                @endif    
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity Raw Materials</label>
                <input type="text" required class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity" 
                placeholder="Quantity" value="{{$pizza_raw_material->quantity}}">
              </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('pizza_raw_materials.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>