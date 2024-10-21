<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Ingredientes Extra') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('extra_ingredients.store')}}">
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
            <div id="idHelp" class="form-text">Id Ingrediente Extra</div>
          </div>
          <div class="mb-3">
              <label for="name" class="form-label">Nombre Ingrediente Extra</label>
              <input type="text" class="form-control" id="nombre" aria-describedby="nameHelp" name="nombre" placeholder="Ingrediente extra">
              
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">precio Ingrediente Extra</label>
              <input type="text" class="form-control" id="price" aria-describedby="priceHelp" name="price" placeholder="Valor Ingrediente extra">
              
            </div>
  
          <div class="mt-3">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{route('extra_ingredients.index')}}" class="btn btn-warning">Cancelar</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>