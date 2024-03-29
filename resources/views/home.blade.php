@extends('layouts.template')

@section('content')
    <div class="container">

      @if (Session::get('cannotAccess'))
      <div class="alert alert-danger">{{ Session::get('cannotAccess') }}</div>
      @endif
      @if (Session::get('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home ></li>
            </ol>
          </nav>


        <div class="h1 mb-3">Selamat Datang, {{ Auth::user()->name }} !</div>
       
        
        @if (Auth::check())
        @if (Auth::user()->role == 'staff')
        <center>
        <div class="row" style="margin-top: 100px">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $datasur }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Klasifikasi Surat</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-calculator fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Staff Tata Usaha
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$staff}}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Guru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$guru}}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
        @else
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Guru</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$letter}}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        @endif
        @endif

    </div>
@endsection