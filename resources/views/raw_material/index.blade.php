<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Raw Materials') }}
        </h2>
    </x-slot>

    <div class="container">
        <br>
        <a href="{{ route('raw_materials.new') }}" class="btn btn-success">Add</a>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Unit</th>
                <th scope="col">Current Stock</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($raw_materials as $raw_material)
              <tr>
                <th scope="row">{{$raw_material->id}}</th>
                <td>{{$raw_material->name}}</td>
                <td>{{$raw_material->unit}}</td>
                <td>{{$raw_material->current_stock}}</td>
                <td>
                    <a href="{{route('raw_materials.edit',['raw_material'=>$raw_material->id])}}" class="btn btn-info">Edit</a>
                    <form action="{{route('raw_materials.destroy', ['raw_material'=>$raw_material->id])}}" method="POST" style="display: inline-block">
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