<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizza Raw Material') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{ route('pizza_raw_materials.create') }}" class="btn btn-success"> Add </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Pizza</th>
                <th scope="col">Raw Materials</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($pizza_raw_materials as $pizza_raw_material)
              <tr>
                <th scope="row">{{$pizza_raw_material->id}}</th>
                <td>{{$pizza_raw_material->pizza_name}}</td>
                <td>{{$pizza_raw_material->raw_materialst_name}}</td>
                <td>{{$pizza_raw_material->quantity}}</td>
                <td>
                    <a href="{{route('pizza_raw_materials.edit',['pizza_raw_material'=> $pizza_raw_material->id])}}"
                        class="btn btn-info">Edit</a>

                    <form action="{{route('pizza_raw_materials.destroy',['pizza_raw_material'=>$pizza_raw_material->id])}}"
                        method="POST" style="display: inline-block">
                        @method('delete')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete">
                        
                    </form>
                </td>
              @endforeach
            </tbody>
            
          </table>
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        </div>
</x-app-layout>