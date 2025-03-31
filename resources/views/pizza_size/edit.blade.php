<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit pizza size</title>
  </head>
  <body>
    <div class="container">
        <h1>Edit pizza size</h1>
        <form method="POST" action="{{ route('pizza_sizes.update', ['pizza_size' => $pizza_size->id])}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="id" class="form-label">Code</label>
              <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
              disabled="disabled" value="{{ $pizza_size->id}}">
              <div id="idlHelp" class="form-text">Pizza Size Code</div>
            </div>

            <div class="mb-3">
              <label for="pizzas_id" class="form-label">Pizza Name</label>
              <select class="form-control" id="pizzas_id" name="pizzas_id" required>
                @foreach ($pizzas as $pizza)
                <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>                    
                @endforeach
              </select>
            </div>

            <div class="mb-3 form-check">
              <label for="size" class="form-label">Size</label>
              <input type="text" class="form-control" id="size" aria-describedby="sizeHelp" name="size"
              placeholder="Pizza Size" value="{{$pizza_size->size}}">
            </div>

            <div class="mb-3 form-check">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" aria-describedby="priceHelp" name="price"
                placeholder="Pizza Price" value="{{$pizza_size->price}}">
              </div>

              <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('pizza_sizes.index')}}" class="btn btn-warning">Cancel</a>
              </div>
            
          </form>
    </div>
    

  </body>
</html>