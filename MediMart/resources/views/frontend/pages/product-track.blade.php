@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')

<!--============================
    TRACKING ORDER START
==============================-->
<section id="wsus__login_register" class="py-5">
    <div class="container">
        <div class="wsus__track_area">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-8 m-auto">

                    <form class="track_form p-4 rounded shadow-lg" action="{{route('product-traking.index')}}" method="GET" style="background-color: #f9f9f9;">
                        <h4 class="text-center mb-4 font-weight-bold text-dark">Order Tracking</h4>
                        <p class="text-center text-muted">Track the status of your order</p>
                        <div class="wsus__track_input mb-3">
                            <label class="d-block mb-2 text-dark">Invoice ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" placeholder="H25-21578455" name="tracker" value="{{@$order->invocie_id}}">
                        </div>
                        <button type="submit" class="common_btn btn btn-primary btn-lg w-100">Track</button>
                    </form>
                </div>
            </div>

            @if (isset($order))
            <div class="row mt-5">
                <div class="col-xl-12">
                    <div class="wsus__track_header p-4 rounded shadow-sm bg-light">
                        <div class="row text-center">
                            <div class="col-xl-3 col-sm-6 col-lg-3">
                                <div class="wsus__track_header_single">
                                    <h5 class="text-muted">Order Date</h5>
                                    <p class="text-dark">{{date('d M Y', strtotime(@$order->created_at))}}</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-lg-3">
                                <div class="wsus__track_header_single">
                                    <h5 class="text-muted">Shopping by:</h5>
                                    <p class="text-dark">{{@$order->user->name}}</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-lg-3">
                                <div class="wsus__track_header_single">
                                    <h5 class="text-muted">Status:</h5>
                                    <p class="text-dark">{{@$order->order_status}}</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-lg-3">
                                <div class="wsus__track_header_single border_none">
                                    <h5 class="text-muted">Tracking:</h5>
                                    <p class="text-dark">{{@$order->invocie_id}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 mt-4">
                    <ul class="progtrckr d-flex justify-content-between list-unstyled" data-progtrckr-steps="4">
                        <li class="progtrckr_done icon_one check_mark bg-success text-white p-3 rounded">Pending</li>

                        @if (@$order->order_status == 'canceled')
                            <li class="icon_four red_mark bg-danger text-white p-3 rounded">Order Canceled</li>
                        @else
                        <li class="progtrckr_done icon_two
                        @if (@$order->order_status == 'processed_and_ready_to_ship' ||
                            @$order->order_status == 'dropped_off' ||
                            @$order->order_status == 'shipped' ||
                            @$order->order_status == 'out_for_delivery' ||
                            @$order->order_status == 'delivered')
                        check_mark bg-success text-white
                        @endif p-3 rounded">Order Processing</li>
                        <li class="icon_three
                        @if (
                            @$order->order_status == 'out_for_delivery' ||
                            @$order->order_status == 'delivered')
                        check_mark bg-success text-white
                        @endif p-3 rounded">On the Way</li>
                        <li class="icon_four
                        @if (
                            @$order->order_status == 'delivered')
                        check_mark bg-success text-white
                        @endif p-3 rounded">Delivered</li>
                        @endif
                    </ul>
                </div>

                <div class="col-xl-12 mt-3 text-center">
                    <a href="{{url('/')}}" class="common_btn btn btn-outline-primary btn-lg"><i class="fas fa-chevron-left"></i> Back to Home</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!--============================
    TRACKING ORDER END
==============================-->
@endsection
