    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Pizza sizes') }}
        </h2>
    </x-slot>

    <div class="container">
      <h1>Pizza Size</h1>
      <a href="{{ route('pizza_sizes.create')}}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pizza_sizes as $pizza_size)
                <tr>
                  <td>{{$pizza_size->id}}</td>
                  <td>{{$pizza_size->name}}</td>
                    <td>{{$pizza_size->size}}</td>
                    <td>{{$pizza_size->price}}</td>
                    <td>
                      <a href="{{ route('pizza_sizes.edit', ['pizza_size' => $pizza_size->id])}}" class="btn btn-info">Edit</a>

                      <form action="{{ route('pizza_sizes.destroy', ['pizza_size' => $pizza_size->id])}}" 
                        method="POST" style="display: inline-block">
                      @method('delete')
                    @csrf
                  <input class="btn btn-danger" type="submit" value="Delete">
                </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </div>
    

  </x-app-layout>