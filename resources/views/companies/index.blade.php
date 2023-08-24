@extends('companies.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Company List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Main Page</a>
                <a class="btn btn-success" href="{{ route('company.create') }}"> Add New Company</a>
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
            <th>Name</th>
            <th>E-Mail</th>
            <th>Logo</th>
            <th>Website</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($company as $companies )
        <tr>
            <td>{{ $companies ->id }}</td>
            <td>{{ $companies ->name }}</td>
            <td>{{ $companies ->email }}</td>
            <td>
              
                <img src="{{ asset('uploads/company/'.$companies ->logo) }}" style="height: 50px;width:100px;">

               
            </td>
            <td>{{ $companies ->webiste }}</td>

            <td>
                <form action="{{ route('company.destroy',$companies ->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('company.edit',$companies ->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    {{$company->links()}}
    
@endsection