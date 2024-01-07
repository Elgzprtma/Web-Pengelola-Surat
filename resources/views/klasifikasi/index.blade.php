@extends('layouts.template')

@section('content')
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Klasifikasi Surat</li>
            </ol>
          </nav>

          @if(Session::get('success'))
          <div class="alert alert-success"> {{ Session::get('success') }} </div>
          @endif
          @if(Session::get('deleted'))
          <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
          @endif
          <div class="container-fluid">
          
              <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800">Data Klasifikasi Surat</h1>
              <p class="mb-4">.</p>
          
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <a href="{{ route('klasifikasi.create') }}" class="btn bg-primary">
                         
                          <span class="text text-gray-100">Tambah Surat</span>
                      </a>
                      <a href="{{ route('export-excel-klasifikasi') }}" class="btn bg-success">
                         
                          <span class="text text-gray-100">Export (excel)</span>
                      </a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive ">
                          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                      <th>No</th>
                      <th>Kode Surat</th>
                      <th>Klasifikasi</th>
                      <th>Surat Tertaut</th>
                      
                      <th class="text-center">Aksi</th>
                                    
                                  </tr>
                              </thead>
                                  
                              <tbody>
                                  @php
                                      $no = 1
                                  @endphp
                                  @foreach ($letterTypes as $i)
                                  <tr>
                                      <td>{{ $no++ }}</td>
                                      <td>{{ $i->letter_code }}</td>
                                      <td>{{ $i->name_type }}</td>
                                      <td>{{ App\Models\Letters::where('letter_type_id', $i->id)->count() }}</td>
                                      <td>
                                          <div class="d-flex">
                                              
          
          
                                              <a href="{{ route('klasifikasi.show', $i->id) }}"><button class="btn btn-primary text-white me-2">Detail</button></a>
                                          <a href="{{ route('klasifikasi.edit', $i->id) }}"><button class="btn btn-success text-white me-2">Edit</button></a>
                                          <form action="{{ route('klasifikasi.delete', $i->id) }}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                          </form>     
                                          </div>                           
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

    <!-- Modal -->

@endsection