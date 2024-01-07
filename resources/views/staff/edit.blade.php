@extends('layouts.template')

@section('content')
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('staff.home') }}">Data Staff Tata Usaha</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Data Staff</li>
            </ol>
          </nav>

        <div class="h2 mb-4">Edit data Staff</div>
        
                <form action="{{ route('staff.update', $staff['id']) }}" method="POST" class="card p-5">

                    @csrf
                    @method('PATCH')
            
                    @if($errors->any())
                        <ul class="alert alert-danger p-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
            
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $staff['name'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Email :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $staff['email'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Ubah Password :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
            
                </form>
       
@endsection