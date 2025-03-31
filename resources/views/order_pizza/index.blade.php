<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Pizzas') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{ route('order_pizzas.create') }}" class="btn btn-success"> Add Order Pizza </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Order Id</th>
                <th scope="col">Pizza Size</th>
                <th scope="col">Order Date</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($order_pizzas as $order_pizza)
              <tr>
                <th scope="row">{{$order_pizza->code}}</th>
                <td>{{$order_pizza->order}}</td>
                <td>{{$order_pizza->pizza_size}}</td>
                <td>{{$order_pizza->order_date}}</td>
                <td>{{$order_pizza->quantity}}</td>
                <td>
                  <a href="{{ route('order_pizzas.edit', ['order_pizza'=>$order_pizza->code]) }}" class="btn btn-info"> Edit </a>
                  <form action="{{route('order_pizzas.destroy', ['order_pizza'=>$order_pizza->code])}}" method="POST" 
                    style="display: inline-block">
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