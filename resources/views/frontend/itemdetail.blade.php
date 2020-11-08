@extends('frontendtemplate')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-info-circle"></i> Detail Page</h1>
            </div>
            
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

                        <input type="number" name="qty" class="form-control w-50" value="1" min="1">

                        <button data-id="{{$item->id}}"
                                   data-codeno="{{ $item->codeno }}"
                                   data-name="{{ $item->name }}"
                                   data-photo="{{ asset($item->photo) }}" 
                                   data-price="{{ $item->price }}"
                                   data-discount="{{ $item->discount }}"
                                   data-description="{{ $item->description}}"
                                   class="addtocartBtn text-decoration-none">Add to Cart</button>

                        
                    </div>
                </div>
            </div>
        </div>
    </main>
@section('script')
    <script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}"></script>
@endsection
@endsection