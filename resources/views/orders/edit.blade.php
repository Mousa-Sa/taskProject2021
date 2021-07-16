@extends('MasterDashBoard')
@section('style')
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Order</h4>
                            <p class="card-category">Complete your Record</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('order.update',[$order->id])}}" enctype="multipart/form-data">
                                @method('PUT')
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">name</label>
                                            <input type="text" name="name" value="{{$order->name}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Products</label>
                                            <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="products[]">
                                                <option value=""></option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}" @if($order->products->contains($product->id)) selected @endif>{{$product->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">customer</label>
                                            <select name="customer">
                                                @forelse($customers as $customer)
                                                    <option value="{{$customer->id}}" @if($customer->id==$order->customer_id) selected @endif>{{$customer->name}}</option>
                                               @empty
                                                    <option value="">select customer</option>

                                                    @endforelse

                                            </select>
                                        </div>
                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>



    <script>
        $('.sidebar2').addClass('active')

        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection
