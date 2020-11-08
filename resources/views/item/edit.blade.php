@extends('backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-large"></i> SubCategory Edit Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('subcategory.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="#">SubCategory Edit Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h2>Item Edit Form</h2>
                    <form method="POST" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="codeno" value="{{$item->codeno}}">
                        <div class="form-group">
                        <label>Name :</label>
                        <input type="text" value="{{$item->name}}" name="name" class="form-control" class="@error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- photo --}}
                        <div class="form-group">
                            <label>Photo: (<small class="text-danger">*only allow jpeg, bmp, png</small>)</label>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="old-tab" data-toggle="tab" href="#old" role="tab"
                                        aria-controls="old" aria-selected="true">Old Photo</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab"
                                        aria-controls="new" aria-selected="false">New Photo</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="old-tab">
                                    <img src="{{ asset($item->photo) }}" class="img-fluid table-bordered border-dark rounded" width="300" height="200">
                                    <input type="hidden" name="oldphoto" value="{{ $item->photo }}">
                                </div>
                                <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
                                    <input type="file" name="photo"
                                        class="form-control-file @error('photo') is-invalid @enderror">
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                         {{-- price --}}
                         <div class="form-group">
                            <label>Price:</label>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Price</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Discount</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <input class="form-control" type="number" name="price" value="{{$item->price}}">
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <input class="form-control" type="number" name="discount" value="{{$item->discount}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" cols="20" rows="10">{{$item->description}}</textarea>
                        </div>   
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <select class="form-control" name="brand" id="brand">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        @if($brand->id == $item->brand_id)
                                            selected="selected"
                                        @endif    
                                        >{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory">SubCategory :</label>
                            <select class="form-control" name="subcategory" id="subcategory">
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        @if($subcategory->id == $item->subcategory_id)
                                        selected="selected"
                                    @endif 
                                        >{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-outline-info" name="btnsubmit" value="Update">
                        </div>
                    </form>
                        
                       
                </div>
            </div>
        </div>
    </main>
@endsection