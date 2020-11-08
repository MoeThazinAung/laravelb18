@extends('backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-large"></i> Item Create Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Item Create Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h2>Item Create Form</h2>
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" class="@error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo:</label>
                            <input type="file" name="photo" class="form-control-file"
                                class="@error('photo') is-invalid @enderror">
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                                    <input class="form-control" type="number" name="price" value="0" placeholder="price">
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <input class="form-control" type="number" name="discount" value="0" placeholder="discount">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> 
                            <textarea class="form-control" name="description" id="" cols="20" rows="10"></textarea>
                        </div>   
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <select class="form-control" name="brand" id="brand">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Category :</label>
                            <select class="form-control" name="subcategory" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label>Sub Category:</label>
                          <select name="subcategory" disabled="true" class="form-control subcategory" >
                            <optgroup label="Choose Subcategory" class="subcategory_option">
                              @foreach($subcategories as $subcategory)
                              <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                              @endforeach
                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-outline-info" name="btnsubmit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
        
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#category').on('change', function () {
        //alert('ok');
        let categoryid = $(this).val();
        // alert(categoryid);
        $.post("{{route('filterCategory')}}",{cid:categoryid},function (response) {
          // console.log(response);
          var html = "";
          for(let row of response){
            html+=`<option value="${row.id}">${row.name}</option>`;
          }
          $('.subcategory').removeAttr('disabled');
          $('.subcategory_option').html(html);
        })
      })
    })
  </script>
@endsection