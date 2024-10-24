<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Pizza') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('raw_materials.store')}}">
          @csrf
          <div class="mb-3">
            <label for="id" class="form-label">Code</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
            <div id="idHelp" class="form-text">Code Materials</div>
          </div>
          <div class="mb-3">
              <label for="name" class="form-label">Name Material</label>
              <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Name Material">
              
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="number" class="form-control" id="unit" aria-describedby="unitHelp" name="unit" placeholder="unit">
                
              </div>

              <div class="mb-3">
                <label for="current_stock" class="form-label">Current Stock</label>
                <input type="text" class="form-control" id="current_stock" aria-describedby="current_stockHelp" name="current_stock" placeholder="current stock">
                
              </div>
  
          <div class="mt-3">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{route('raw_materials.index')}}" class="btn btn-warning">Cancelar</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>