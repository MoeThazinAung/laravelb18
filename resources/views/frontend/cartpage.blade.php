@extends('frontendtemplate')

@section('content')
  <div class="container">

    <div class="row my-5">

      <h2>Shopping Cart!</h2>
      <div class="row mt-5 shoppingcart_div">
     	<div class="table-responsive">
      <table class="table mt-5">
      	<thead>
                <tr>
                    <th colspan="3"> Item </th>
                    <th colspan="3"> Qty </th>
                    <th> Price </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="5">
                        <textarea class="form-control" id="notes" placeholder="Any Request..." required=""></textarea>
                    </td>
                    <td>
                       @role('customer')
                        <button class="btn btn-success checkout" type="">Checkout
                        </button>
                       @else
                         <button class="btn btn-success">Sign in Checkout
                         </button>
                       @endrole
                    </td>
            	</tr>
            </tfoot>
    	</table>
    </div>
</div>
</div>
    <!-- /.row -->

  </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}"></script>
@endsection