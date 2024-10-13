@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Became a Pharmacy Today
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Pharmacy Request</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {!!@$content->content!!}
              </div>
            </div>
            <br>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <form action="{{route('user.vendor-request.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-image" aria-hidden="true"></i>
                            <input type="file" name="shop_image" placeholder="Pharmacy Banner Image">
                        </div>
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-store" aria-hidden="true"></i>
                            <input type="text" name="shop_name" placeholder="Pharmacy Name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <input type="text" name="shop_email" placeholder="Pharmacy Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    <input type="text" name="shop_phone" placeholder="Pharmacy Phone">
                                </div>
                            </div>
                        </div>
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <input type="text" name="shop_address" placeholder="Pharmacy Address">
                        </div>

                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-info-circle" aria-hidden="true"></i>
                            <textarea name="about" placeholder="About Your Pharmacy"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

