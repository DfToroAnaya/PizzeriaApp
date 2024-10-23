<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employees') }}
        </h2>
    </x-slot>

    <div class="container">
      <br>
      <form method="POST" action="{{route('employees.update',['employee' => $employee->id])}}">
        @method('put')
          @csrf
            <div class="mb-3">
             <label for="id" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="idHelp" 
             name="id" disabled="disable" value="{{$employee->id}}">
                <div id="idHelp" class="form-text">Code Employee</div>
            </div>

            <div class="mb-3">
                <label for="user_id">User</label>
                <select class="form-select" id="user_id" name="user_id" required>
                <option selected disabled value="">Choose One...</option>
                @foreach ($users as $user )
                @if ($user->id == $employee->user_id)
                <option selected value="{{$user->id}}">{{$user->name}}</option>
                @else
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
                @endforeach
                </select>
            </div>

            <div class="mb-3">
              <label for="position" class="form-label">Position Employee</label>
              <select class="form-control" id="position" name="position">
                  <option value="" disabled {{ $employee->position == '' ? 'selected' : '' }}>Seleccione una posición</option>
                  <option value="cajero" {{ $employee->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                  <option value="administrador" {{ $employee->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                  <option value="cocinero" {{ $employee->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                  <option value="mensajero" {{ $employee->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
              </select>
          </div>

              <div class="mb-3">
                <label for="identification_number " class="form-label">Identification Employee</label>
                <input type="text"  required class="form-control" id="identification_number " name="identification_number" 
                placeholder="Identification Number " value="{{$employee->identification_number}}">
              </div>

              <div class="mb-3">
                <label for="salary" class="form-label">Salary Employee</label>
                <input type="text"  required class="form-control" id="salary"  name="salary" 
                placeholder="Salary" value="{{$employee->salary}}">
              </div>

              <div class="mb-3">
                <label for="hire_date" class="form-label">Hire Date Employee</label>
                <input type="text" required class="form-control" id="hire_date"  name="hire_date" 
                placeholder="Hire Date" value="{{$employee->hire_date}}">
              </div>



             <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('employees.index')}}" class="btn btn-warning">Cancel</a>
              
              
            </div>
          
        </form>
  
  
      </div>
  
     
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</x-app-layout>