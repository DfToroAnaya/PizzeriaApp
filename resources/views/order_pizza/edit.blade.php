<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order Pizza') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{ route('order_pizzas.update', $order_pizza->id) }}">
        @method('PUT')
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
               @if ($order->id == $order_pizza->order_id)
                    <option selected value="{{$order->id}}">{{$order->id}}</option>
               @else
                    <option value="{{$order->id}}">{{$order->id}}</option>
               @endif
                   
               @endforeach
               </select>
           </div>

           <div class="mb-3">
               <label for="name" class="form-label">Pizza Size</label>
               <select class="form-select" id="pizzaSize" name="pizzaSize" required>
               <option selected disabled value="">Choose One...</option>
               @foreach ($pizza_sizes as $pizza_size )
                @if ($pizza_size->id == $order_pizza->pizza_size_id)
                    <option selected value="{{ $pizza_size->id }}">{{$pizza_size->size}}</option>
                @else 
                <option value="{{ $pizza_size->id}}">{{$pizza_size->size}}</option>
                @endif
                   
               @endforeach
               </select>
           </div>

           <div class="mb-3">
               <label for="name" class="form-label">Quantity</label>
               <input type="text" class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity" 
               value="{{ $order_pizza->quantity }}">
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