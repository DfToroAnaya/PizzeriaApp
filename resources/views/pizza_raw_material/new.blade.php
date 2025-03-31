<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Pizza Raw Material') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('pizza_raw_materials.store')}}">
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
                <div id="idHelp" class="form-text">Code Pizza Raw Materials</div>
            </div>

            <div class="mb-3">
                <label for="pizza_id" class="form-label">Pizza</label>
                <select class="form-select" id="pizza_id" name="pizza_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($pizzas as $pizza)
                    <option value="{{$pizza->id}}">{{$pizza->pizza_name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="raw_material_id " class="form-label">Raw Materials</label>
                <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($raw_materials as $raw_material )
                    <option value="{{$raw_material->id}}">{{$raw_material->raw_materialst_name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity Raw Materials</label>
                <input type="text" class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity" 
                placeholder="Quantity">
              </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('pizza_raw_materials.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>