@extends('companies.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>edit New Company</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a> --}}
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('update-company/' .$company->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
{{ method_field('PUT') }}
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value ="{{ $company->name }}" class="form-control" placeholder="Name" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="email" value ="{{ $company->email }}" name="email" class="form-control" placeholder="Detail">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="logo" class="custom-file-input">
                    <img src="{{ asset('uploads/company/'.$company ->logo) }}" style="height: 50px;width:100px;">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>webiste:</strong>
                <input type="text" class="form-control" value ="{{ $company->webiste }}" name="webiste" placeholder="Detail">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection