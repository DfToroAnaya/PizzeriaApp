<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="container">
        <br> 
        <a href="{{route('employees.create')}}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">User</th>
                <th scope="col">Position</th>
                <th scope="col">identification</th>
                <th scope="col">Salary</th>
                <th scope="col">Hire Date</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
              <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->name}}</td>
                <td>{{$employee->position}}</td>
                <td>{{$employee->identification_number}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->hire_date}}</td>
                <td> 

                  <a href="{{route('employees.edit',['employee'=>$employee->id])}}"
                    class="btn btn-info">Edit</a>
                  <form action="{{route('employees.destroy',['employee' => $employee->id])}}"
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
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        </div>
</x-app-layout>