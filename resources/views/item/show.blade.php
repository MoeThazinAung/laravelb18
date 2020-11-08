@extends('backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-info-circle"></i> Detail Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset(route('item.index')) }}">Item Page</a></li>
                <li class="breadcrumb-item"><a href="#">Detail Page</a></li>
            </ul>
        </div>
        <div class="card">
            <h5 class="card-header">Item's detail</h5>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid table-bordered border-info p-3 m-3" src="{{ asset($item->photo) }}" width="200"
                        height="200" style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Item Name: <span class="text-primary">{{ $item->name }}</span></h5>
                        <h5 class="card-title">Item CodeNo: <span class="text-primary">{{ $item->codeno }}</span></h5>
                        @if ($item->discount == 0)
                            <h5 class="card-title">Price: <span class="text-primary">{{ $item->price }} mmk</span></h5>
                        @else
                            <h5 class="card-title">Price: <span class="text-primary">{{ $item->discount }} mmk | <del
                                        class="text-muted">{{ $item->price }} mmk</del></span></h5>
                        @endif
                        <h5 class="card-title">Description: <span class="text-primary">{{ $item->description }}</span></h5>

                        {{-- brand --}}
                        <h5 class="card-title">Brand:
                            <span class="text-primary">
                               {{$item->brand->name}}
                            </span>
                        </h5>

                        {{-- subcategory --}}
                        <h5 class="card-title">SubCategory:
                            <span class="text-primary">
                               {{$item->subcategory->name}}
                            </span>
                        </h5>

                        <a href="{{ route('item.index') }}" class="btn btn-primary mt-3">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection