@extends('companies.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Employee List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Main Page</a>

                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New employee</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>email</th>
            <th>Company ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee )
        <tr>
            <td>{{ $employee ->id }}</td>
            <td>{{ $employee ->first_name }}</td>
            <td>{{ $employee ->last_name }}</td>
            <td>{{ $employee ->phone }}</td>
            <td>{{ $employee ->email }}</td>
            <td>{{ $employee ->company_id }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee ->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee ->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    {{$employees->links()}}
    
@endsection