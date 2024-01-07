@extends('layouts.template')

@section('content')


<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Surat</li>
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
    <h1 class="h3 mb-2 text-gray-800">Data Surat</h1>
    <p class="mb-4">.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (Auth::user()->role == 'staff')
            <a href="{{ route('surat.create') }}" class="btn bg-primary">
               
                <span class="text text-gray-100">Tambah Surat</span>
            </a>
            <a href="{{ route('export-excel-surat') }}" class="btn bg-success">
               
                <span class="text text-gray-100">Export (excel)</span>
            </a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Tanggal keluar</th>
            <th>Penerima Surat</th>
            <th>Notulis</th>
            <th>Hasil Rapat</th>

            @if (Auth::user()->role == 'staff')
            <th class="text-center">Aksi</th>
            @endif      
                        </tr>
                    </thead>
                        
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @if (Auth::check())
                        @foreach ($letters as $i)
                        <tr>
                            <td>{{ $no++ }}</td>
                            
                            <td>@if(isset($i['letter_type_id']))
                                <?php

// Mendapatkan nilai dari $i->letterType->letter_code
                    $letterCode = $i->letterType->letter_code;

// Memisahkan string berdasarkan tanda '-'
                    $parts = explode('-', $letterCode);
                    $part = explode('-', $letterCode);

// Menampilkan angka yang ada sebelum '-'
                    if (isset($parts[0])) {
                    echo $parts[0];
                        }

                    ?>/@if(isset($part[1])){{ $part[1] }}@endif/SMK Wikrama/{{$i['created_at']->format('Y')}}
                            @else
                                No notulis assigned
                            @endif</td>
                            <td>{{ $i->letter_perihal }}</td>
                            <td>{{ $i->created_at->format('d/m/Y') }}</td>
                            <td>{{ implode(', ', array_column($i->recipients, 'name')) }}</td>
                            <td>{{ $i->user->name }}</td>
                            <td>

                            @if (Auth::check())
                                

                                @if (App\Models\Results::where('letter_id', $i->id)->exists())
                                <a href="{{ route('result.show', $i->id) }}" style="color: limegreen">Sudah Dibuat</a>
                                @else
                                @if (Auth::user()->name == $i->user->name)
                                @if (Auth::user()->role == 'guru')
                                <a href="{{ route('result.results', $i->id) }}"><button class="btn btn-success text-white">Buat Hasil</button></a>
                                @endif
                                @else
                                <a href="#" style="color: red">Belum Dibuat</a>
                                @endif
                                @endif
                      
                                @else
                                    
                                @endif
                        </td>
                        @if (Auth::user()->role == 'staff')
                            <td>
                                   
                                    <div class="d-flex">
                                        <a href="{{ route('surat.print', $i->id) }}"><button class="btn btn-primary text-white me-2">.pdf</button></a>
                                    <a href="{{ route('surat.edit', $i->id) }}"><button class="btn btn-success text-white me-2">Edit</button></a>
                                    <form action="{{ route('surat.delete', $i->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                    </form>     
                                    </div>                           
                                    @endif
                              
                                
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection