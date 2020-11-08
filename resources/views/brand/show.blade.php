@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="card">
            <h5 class="card-header">Brand detail</h5>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid table-bordered border-info p-3 m-3" src="{{ asset($brand->photo) }}" width="200"
                        height="200" style="object-fit: cover;">
                
                  <div class="card-body">
                    <h5 class="card-title">Brand Name: <span class="text-primary">{{ $brand->name }}
                        </span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection