@extends('backendtemplate')

@section('content')

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th"></i> Item Page</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Item Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Item List</h2>
          <a href="{{route('item.create')}}" class="btn btn-outline-info my-3 float-right"><i class="fa fa-plus"></i> Add New</a>
          <table class="table">
            <thead>
              <tr>
                <th><h4>#</h4></th>
                <th><h4>Name</h4></th>
                <th><h4>Price</h4></th>
                <th><h4>Actions</h4></th>
              </tr>
            </thead>
            <tbody>
              @php 
                $i=1;
              @endphp
              @foreach($items as $item)
              <tr>
                <td><h4 class="d-inline-block">{{$i++}}</h4></td>
                <td>
                  <h4 class="text-dark d-inline-block">{{$item->name}}</h4>
                </td>
                <td>
                  <h4 class="text-dark d-inline-block">
                    @if($item->discount>0){
                       {{number_format($item->discount)}}
                    }
                    @else
                      {{number_format($item->price)}}
                    @endif
                  </h4>
                </td>
                <td>
                  <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                  <a href="{{route('item.show',$item->id)}}" class="btn btn-info">Show</a>
                  <form method="post" action="{{route('item.destroy',$item->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection