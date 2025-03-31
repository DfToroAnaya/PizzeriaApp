<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @method('PUT')
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disable"
                value="{{$client->id}}">
                <div id="idHelp" class="form-text">Code Client</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">User</label>
                <select class="form-select" id="name" name="name" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" aria-describedby="addressHelp" name="address" 
                value="{{$client->address}}">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" 
                value="{{$client->phone}}">
              </div>

             <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('clients.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>