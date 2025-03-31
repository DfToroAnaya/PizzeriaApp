<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Order Extra Ingredient</title>
  </head>
  <body>
    <div class="container">
        <h1>Add Order Extra Ingredient</h1>
        <form method="POST" action="{{ route('order_extra_ingredients.update', ['order_extra_ingredient' => $order_extra_ingredient->id])}}">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="id" class="form-label">Code</label>
              <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
              disabled="disabled" value="{{$order_extra_ingredient->id}}">
              <div id="idlHelp" class="form-text">Code Order Extra Ingredient</div>
            </div>

            <div class="mb-3">
              <label for="order_id" class="form-label">Total Price</label>
              <select class="form-control" id="order_id" name="order_id" required>
                @foreach ($orders as $order)
                <option value="{{ $order->id }}">{{ $order->total_price }}</option>                    
                @endforeach
              </select>
            </div>

            <div class="mb-3 form-check">
              <label for="extra_ingredient_id" class="form-label">Name Ingredient</label>
              <select class="form-control" id="extra_ingredient_id" name="extra_ingredient_id" required>
                @foreach ($extra_ingredients as $extra_ingredient)
                <option value="{{ $extra_ingredient->id }}">{{ $extra_ingredient->name }}</option>                    
                @endforeach
              </select>
            </div>

            <div class="mb-3 form-check">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" aria-describedby="quantityHelp" name="quantity"
                placeholder="Ingredient Quantity" value="{{$order_extra_ingredient->quantity}}">
              </div>

              <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('order_extra_ingredients.index')}}" class="btn btn-warning">Cancel</a>
              </div>
            
          </form>
    </div>
    

  </body>
</html>