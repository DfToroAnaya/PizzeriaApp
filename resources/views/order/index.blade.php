<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{ route('orders.create') }}" class="btn btn-success"> Add Order </a>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Client</th>
                <th scope="col">Branch</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Delivery Type</th>
                <th scope="col">Employee</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
              <tr>
                <th scope="row">{{$order->code}}</th>
                <td>{{$order->client_name}}</td>
                <td>{{$order->branch_name}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->delivery_type}}</td>
                <td>{{$order->employee_id ?? 'No assined'}}</td>
                <td>
                  <a href="{{ route('orders.edit', ['order'=>$order->code]) }}" class="btn btn-info"> Edit </a>
                  <form action="{{route('orders.destroy', ['order'=>$order->code])}}" method="POST" 
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