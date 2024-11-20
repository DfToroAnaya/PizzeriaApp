<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Purchase') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('purchases.store')}}">
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
                <div id="idHelp" class="form-text">Code Purchase</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Supplier</label>
                <select class="form-select" id="supplier" name="supplier" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($suppliers as $supplier )
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>  
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Raw Material</label>
                <select class="form-select" id="rawMaterial" name="rawMaterial" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($raw_materials as $raw_material )
                    <option value="{{$raw_material->id}}">{{$raw_material->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity" 
                placeholder="Quantity">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Purchase Price</label>
                <input type="text" class="form-control" id="purchasePrice" aria-describedby="purchasePriceHelp" name="purchasePrice" 
                placeholder="Purchase Price">
              </div>

              <!--<div class="mb-3">
                <label for="name" class="form-label">Purchase Date</label>
                <input type="text" class="form-control" id="purchaseDate" aria-describedby="purchaseDateHelp" name="purchaseDate" 
                placeholder="">
              </div>-->

              <div class="mb-3">
                <label for="name" class="form-label">Purchase Date</label>
                <input type="date" id="purchaseDate" value="" name="purchaseDate" min="1900-01-01" max="2024-12-31" />
              </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('purchases.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>