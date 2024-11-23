<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchases') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{ route('purchases.create') }}" class="btn btn-success"> Add Purchase </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Supplier</th>
                <th scope="col">Raw Material</th>
                <th scope="col">Quantity</th>
                <th scope="col">Purchase Price</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($purchases as $purchase)
              <tr>
                <th scope="row">{{$purchase->code}}</th>
                <td>{{$purchase->supplier_name}}</td>
                <td>{{$purchase->raw_name}}</td>
                <td>{{$purchase->quantity}}</td>
                <td>{{$purchase->purchase_price}}</td>
                <td>{{$purchase->purchase_date}}</td>
                <td>
                    <a href="{{ route('purchases.edit', ['purchase'=>$purchase->code]) }}" class="btn btn-info"> Edit </a>
                    <form action="{{route('purchases.destroy', ['purchase'=>$purchase->code])}}" method="POST" 
                        style="display: inline-block">
                        @method('delete')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete">
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        </div>
</x-app-layout>