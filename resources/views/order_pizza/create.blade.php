<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Order Pizza') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('order_pizzas.store')}}">
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
                <div id="idHelp" class="form-text">Code Order Pizza</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Order</label>
                <select class="form-select" id="order" name="order" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($orders as $order )
                    <option value="{{$order->id}}">{{$order->id}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Pizza Size</label>
                <select class="form-select" id="pizzaSize" name="pizzaSize" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($pizza_sizes as $pizza_size )
                    <option value="{{$pizza_size->id}}">{{$pizza_size->size}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity" 
                placeholder="Quantity">
              </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('order_pizzas.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>