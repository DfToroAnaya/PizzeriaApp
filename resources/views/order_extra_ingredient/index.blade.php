<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Order Extra Ingredient</title>
  </head>
  <body>
    <div class="container">
      <h1>Order Extra Ingredient</h1>
      <a href="{{ route('order_extra_ingredients.create')}}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Total Price</th>
                <th scope="col">Name Ingredient</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($order_extra_ingredients as $order_extra_ingredient)
                <tr>
                  <td>{{$order_extra_ingredient->code}}</td>
                  <td>{{$order_extra_ingredient->price}}</td>
                    <td>{{$order_extra_ingredient->name_ingredient}}</td>
                    <td>{{$order_extra_ingredient->quantity}}</td>
                    <td>
                      
                      <a href="{{ route('order_extra_ingredients.edit', ['order_extra_ingredient' => $order_extra_ingredient->code])}}" class="btn btn-info">Edit</a>

                      <form action="{{ route('order_extra_ingredients.destroy', ['order_extra_ingredient' => $order_extra_ingredient->code]) }}" 
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
    </div>
    

  </body>
</html>