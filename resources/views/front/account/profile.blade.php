@extends('front.layout.master')

@section('title', 'Profile')

@section('body')
    <link rel="stylesheet" href="front/css/profile.css" type="text/css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="front/js/profile.js"></script>
    <div class="container bootstrap snippets bootdey">
    <div class="row">
        <form id="profile-form" action="account/profile" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <div id="cover">
                            <label for="image">
                                <img style="cursor: pointer;"
                                     class="avatar"
                                     src="front/img/user/{{$user->avatar != '' ? $user->avatar : 'default2.jpg'}}">
                                <input name="image" type="file" onchange="changeImg(this)"
                                       class="image form-control-file" style="display: none;" value="">
                                <input type="hidden" name="image_old" value="{{$user->avatar ?? 'default-avatar.jpg'}}">
                            </label>
                        </div>
                        <script>
                            function changeImg(input) {
                                //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    //Sự kiện file đã được load vào website
                                    reader.onload = function (e) {
                                        //Thay đổi đường dẫn ảnh
                                        $(input).siblings('img').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            //Khi click #thumbnail thì cũng gọi sự kiện click #image
                            $(document).ready(function () {
                                $('.avatar').click(function () {
                                    $(this).siblings('.image').click();
                                });
                            });
                        </script>
                        <h1>{{$user->name . ' ' . $user->lastname}}</h1>
                        <p>{{$user->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li><a class="tablinks active" onclick="openTab(event, 'profile')"> <i class="fa fa-user"></i> Profile</a></li>
                        <li><a class="tablinks" onclick="openTab(event, 'orders')"> <i class="fa fa-calendar"></i> Orders <span class="label label-warning pull-right r-activity">{{count($orders)}}</span></a></li>
                        <li><a class="tablinks" onclick="openTab(event, 'address')"> <i class="fa fa-edit"></i> Addresses</a></li>
                    </ul>
                </div>
            </div>
            <div id="profile" class="tabcontent profile-info col-md-9">
                <div class="panel">
                    <div class="bio-graph-heading">
                        {{--                            <input id="description" type="text" value="{{$user->description}}">--}}
                        <textarea name="description" id="description" rows="1" placeholder="Type here...">{{$user->description}}</textarea>
                        <script>
                            document.getElementById("description").addEventListener("input", function () {
                                this.style.height = "auto";
                                this.style.height = (this.scrollHeight) + "px";
                            });
                        </script>
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>Personal Information</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><label for="firstname">First Name </label>: <input name="name" type="text" value="{{$user->name}}"></p>
                            </div>
                            <div class="bio-row">
                                <p><label for="lastname">Last Name </label>: <input name="lastname" type="text" value="{{$user->lastname}}"></p>
                            </div>
                            <div class="bio-row">
                                <p><label>Company Name</label>: <input name="company_name" type="text" value="{{$user->company_name}}"></p>
                            </div>
                            <div class="bio-row" id="email-row">
                                <p><label for="email">Email </label>: <input id="email" style="width: 75% !important;" name="email" type="text" value="{{$user->email}}"></p>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    var initialContent = $('#email').val().trim();
                                    $('#email').on('input', function() {
                                        var currentContent = $(this).val().trim();
                                        if (currentContent !== initialContent) {
                                            $('#email-row').attr('data-content', initialContent + ' (changed)');
                                        } else {
                                            $('#email-row').removeAttr('data-content');
                                        }
                                    });
                                });
                            </script>
                            <div class="bio-row">
                                <p><label for="phone">Phone </label>: <input name="phone" type="text" value="{{$user->phone}}"></p>
                            </div>
                            <div class="bio-row">
                                <p><label for="country">Country </label>: <input name="country" type="text" value="{{$user->country}}"></p>
                            </div>
                            <div class="bio-row" style="width: 100% !important;">
                                <p><label for="street_address">Street </label>: <input style="width: 75% !important;" name="street_address" type="text" value="{{$user->street_address}}"></p>
                            </div>
                            <div class="bio-row">
                                <p><label for="town_city">Town/City </label>: <input name="town_city" type="text" value="{{$user->town_city}}"></p>
                            </div>
                            <div class="bio-row">
                                <p><label for="postcode_zip">Zip </label>: <input name="postcode_zip" type="text" value="{{$user->postcode_zip}}"></p>
                            </div>
                            <div class="bio-row" style="width: 100% !important;">
                                <button type="button" class="save-profile-btn" onclick="saveProfileInfo()">SAVE</button>
                                {{--                                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="save-profile-btn" style="text-decoration: none;">SAVE</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="orders" class="tabcontent profile-info col-md-9">
                <div class="orders">
                    <h1>Your placed Orders</h1>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Products</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center text-muted">#{{$order->id}}</td>
                                    <td>
                                        <div class="widget-content p-0 products">
                                            <div class="widget-content-wrapper p-details">
                                                <div class="p-img mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;"
                                                             data-toggle="tooltip" title="Image"
                                                             data-placement="bottom"
                                                             src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path ?? '_default-product.jpg'}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="p-names flex2">
                                                    <div class="widget-subheading opacity-7">
                                                        {{$order->orderDetails[0]->product->name}}
                                                        @if(count($order->orderDetails) > 1)
                                                            (and {{count($order->orderDetails)}} other products)
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$order->street_address . ' - ' . $order->town_city}}
                                    </td>
                                    <td class="text-center">${{array_sum(array_column($order->orderDetails->toArray(), 'total'))}}</td>
                                    <td class="text-center">
                                        <div class="badge badge-info">
                                            {{\App\Utilities\Constant::$order_status[$order->status]}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="admin/order/{{$order->id}}"
                                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{$orders->links()}}
                    </div>
{{--                    <form>--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="search" name="search" id="search" value="{{request('search')}}"--}}
{{--                                   placeholder="Search everything" class="form-control">--}}
{{--                            <span class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        <i class="fa fa-search"></i>&nbsp;--}}
{{--                                        Search--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <div class="bio-chart">--}}
{{--                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="bio-desk">--}}
{{--                                        <h4 class="red">Envato Website</h4>--}}
{{--                                        <p>Started : 15 July</p>--}}
{{--                                        <p>Deadline : 15 August</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <div class="bio-chart">--}}
{{--                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="bio-desk">--}}
{{--                                        <h4 class="terques">ThemeForest CMS </h4>--}}
{{--                                        <p>Started : 15 July</p>--}}
{{--                                        <p>Deadline : 15 August</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <div class="bio-chart">--}}
{{--                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="bio-desk">--}}
{{--                                        <h4 class="green">VectorLab Portfolio</h4>--}}
{{--                                        <p>Started : 15 July</p>--}}
{{--                                        <p>Deadline : 15 August</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <div class="bio-chart">--}}
{{--                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="bio-desk">--}}
{{--                                        <h4 class="purple">Adobe Muse Template</h4>--}}
{{--                                        <p>Started : 15 July</p>--}}
{{--                                        <p>Deadline : 15 August</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div id="address" class="tabcontent profile-info col-md-9">
                Address
            </div>
        </form>
    </div>
    <script>
        // Set "profile" tab content to be displayed by default
        document.getElementById('profile').style.display = 'block';
    </script>
</div>
@endsection
