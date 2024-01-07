@extends('layouts.template')

@section('content')
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
            </ol>
          </nav>

          @if(Session::get('success'))
          <div class="alert alert-success"> {{ Session::get('success') }} </div>
          @endif
          @if(Session::get('deleted'))
          <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
          @endif

          <h1 class="h3 mb-2 text-gray-800">Edit Data Guru</h1>
              <p class="mb-4">.</p>
          <div class="container-fluid">
          
              <!-- Page Heading -->
              
          
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <a href="{{ route('guru.create') }}" class="btn bg-primary">
                         
                          <span class="text text-gray-100">Tambah Staff</span>
                      </a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th class="text-center">Aksi</th>
                                    
                                  </tr>
                              </thead>
                                  
                              <tbody>
                      @php $no = 1 @endphp
                      @foreach ($users as $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item['name'] }}</td>
                          <td>{{ $item['email'] }}</td>
                          <td>{{ $item['role'] }}</td>
                          <td class="d-flex justify-content-center">
                              <a href="{{ route('guru.edit', $item->id)}}" class="btn btn-primary me-3">Edit</a>
                          
                    <form action="{{ route('guru.delete', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                  
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          
          </div>
    </div>
@endsection