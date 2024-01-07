@extends('layouts.template')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('klasifikasi.home') }}">Klasifikasi Surat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Klasifikasi</li>
            </ol>
          </nav>

          <div class="h4 mb-5">Berikut adalah Detail dari Klasifikasi Surat</div>

          <b>
            {{-- <h2 style="display: inline-block">{{ $letters['letter_code'] }}</h2> |  {{ $letters['name_type'] }} --}}
        </b>
        <hr>
    
        @foreach ($letters as $a)
        <h2 style="display: inline-block">{{$a->letterType->letter_code}} | {{$a->letterType->name_type}}</h2>
            <div class="card mt-2 col-md-3">
                <div class="card-content" style="background: ">
                    <div class="card-body">
                        <div class="media ">
                            <table>
                                <tr>
                                    <td>
                                        <h5>{{ $a['letter_perihal'] }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>
                                            @php
                                                setlocale(LC_ALL, 'IND');
                                            @endphp
                                            {{ Carbon\Carbon::parse($a['created_at'])->formatLocalized('%d %B %Y') }}
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ol>
                                            @foreach ($a['recipients'] as $b)
                                                
                                                <li>{{ $b['name'] }}<br></li>
                                            @endforeach
                                            
                                        </ol>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td> <a href="{{ route('surat.print', $a->id) }}">Unduf pdf</a></td>
                                </tr>
                            </table>
                        </div>
    
                    </div>
                </div>
            </div>
        @endforeach
@endsection