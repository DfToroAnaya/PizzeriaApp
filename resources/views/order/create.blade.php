<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Order') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('orders.store')}}">
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable">
                <div id="idHelp" class="form-text">Code Order</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Client</label>
                <select class="form-select" id="client" name="client" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Branch</label>
                <select class="form-select" id="branch" name="branch" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($branches as $branch )
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="totalPrice" aria-describedby="totalPriceHelp" name="totalPrice" 
                placeholder="Total Price">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" aria-describedby="statusHelp" name="status" 
                placeholder="Status">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Delivery Type</label>
                <input type="text" class="form-control" id="deliveryType" aria-describedby="deliveryTypeHelp" name="deliveryType" 
                placeholder="Delivery Type">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Employee</label>
                <select class="form-select" id="employee" name="employee" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($employees as $employee )
                    <option value="{{$employee->id}}">{{$employee->id}}</option>
                @endforeach
                </select>
            </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('orders.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>