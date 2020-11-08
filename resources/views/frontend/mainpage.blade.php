@extends('frontendtemplate')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <x-sidebar-component></x-sidebar-component>
      <!-- /.col-lg-3 -->
    </div>
    

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <div class="row">
        <div class="col-md-12">
          <p>ပရိုမိုးရှင်းနောက်ဆုံးနေ့ပစ္စည်းမျာ</p>
        </div>
        @foreach($items as $item)
        <x-item-component :item="$item"></x-item-component>
        @endforeach
      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

    {{-- Show Brands --}}
    <div class="row">
      <div class="col-md-12">
        <p>ရရှိနိုင်သည့်အမှတ်တံဆိပ်များ</p>
      </div>
      @foreach($brands as $brand)
      <div class="col-md-2 my-4">
        <img src="{{asset($brand->photo)}}" alt="" class="img-fluid">
      </div>
      @endforeach
    </div>

    

  </div>
  @endsection