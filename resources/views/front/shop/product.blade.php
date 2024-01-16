@extends('front.layout.master')

@section('title', 'Product Details')

@section('body')
    <!-- Product Detail Section begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-3">--}}
{{--                    @include('front.shop.components.product-sidebar-filter')--}}
{{--                </div>--}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            @php
                                $imagePath = 'front/img/products/' . $product->productImages[0]->path;
                            @endphp
                            <div class="product-pic-zoom">
                                <img class="product-big-img"
                                     src="{{ file_exists($imagePath) ? $imagePath : 'front/img/products/_default-product.jpg'}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach($product->productImages as $productImage)
                                        <div class="pt active"
                                             data-imgbigurl="front/img/products/{{$productImage->path}}">
                                            <img src="front/img/products/{{$productImage->path}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$product->tag}}</span>
                                    <h3>{{$product->name}}</h3>
                                </div>
                                <div class="pd-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $product->avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    <span>({{count($product->productComments)}})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{$product->content}}</p>
                                    @if($product->discount != null)
                                        <h4>${{$product->discount}}<span>${{$product->price}}</span></h4>
                                    @else
                                        <h4>${{$product->price}}</h4>
                                    @endif
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                            <div class="cc-item">
                                                <input type="radio" id="cc-{{$productColor}}">
                                                <label for="cc-{{$productColor}}" class="cc-{{$productColor}}"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                        <div class="sc-item">
                                            <input type="radio" id="s-{{$productSize}}">
                                            <label for="s-{{$productSize}}">{{$productSize}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
{{--                                            RowId of the item in the Cart--}}
                                            <input type="text" name="" id="qtyInput"
                                                   data-rowid="{{$rowId}}"
                                                   value="{{$itemQTY ?? '1'}}">
                                        </div>
                                        @if($rowId)
                                            <!-- Hiển thị nút cập nhật nếu rowId tồn tại -->
                                            <button class="primary-btn pd-cart" onclick="updateCart('{{$rowId}}', document.getElementById('qtyInput').value)">UPDATE CART</button>
                                        @else
                                            <!-- Hiển thị nút thêm vào giỏ hàng nếu rowId không tồn tại -->
                                            <a href="javascript:addToCart({{$product->id}}, true)" class="primary-btn pd-cart">ADD TO CART</a>
                                        @endif
                                    </div>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES: </span>{{$product->productCategory->name}}</li>
                                    <li><span>TAGS: </span>{{$product->tag}}</li>
                                    <li><span>SKU: </span>{{$product->sku}}</li>
                                    <li class="pd-share"><span>Share: </span>
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter"></i></a>
                                        <a href="#"><i class="ti-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">DESCRIPTION</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATIONS</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Reviews
                                        ({{count($product->productComments)}})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                    {{--                                    <div class="product-content">--}}
                                    {{--                                        <div class="row">--}}
                                    {{--                                            <div class="col-lg-7">--}}
                                    {{--                                                <h5>Introduction</h5>--}}
                                    {{--                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet nisi--}}
                                    {{--                                                    tenetur, a molestiae sequi nesciunt aut sunt accusantium facere--}}
                                    {{--                                                    molestias enim itaque aliquid ratione incidunt iusto voluptatibus--}}
                                    {{--                                                    obcaecati laudantium eveniet!</p>--}}
                                    {{--                                                <h5>Feature</h5>--}}
                                    {{--                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia cumque,--}}
                                    {{--                                                    incidunt placeat saepe aspernatur omnis blanditiis nesciunt, temporibus--}}
                                    {{--                                                    non ipsa laudantium et nisi eligendi deserunt impedit minima autem--}}
                                    {{--                                                    eveniet ut.</p>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <div class="col-lg-5">--}}
                                    {{--                                                <img src="front/img/product-single/tab-desc.jpg" alt="">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-category">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <span>({{count($product->productComments)}})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Price</td>
                                                <td>
                                                    <div class="p-price">${{$product->price}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ Add to Cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Availability</td>
                                                <td>
                                                    <div class="p-stock">{{$product->qty}} in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Weight</td>
                                                <td>
                                                    <div class="p-weight">{{$product->weight}} kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                                            {{$productSize}}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Color</td>
                                                <td>
                                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                                        <span class="cs-{{$productColor}}"></span>
                                                    @endforeach
                                                    {{--                                                    <div class="cs-color"></div>--}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">SKU</td>
                                                <td>
                                                    <div class="p-code">{{$product->sku}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{count($product->productComments)}} Comments</h4>
                                        <div class="comment-option">
                                            @foreach($product->productComments as $productComment)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img
                                                            src="front/img/user/{{$productComment->user->avatar??'default-avatar.jpg'}}"
                                                            alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{$productComment->name}}
                                                            <span>{{date('d-m-Y', strtotime($productComment->created_at))}}</span>
                                                        </h5>
                                                        <div class="at-reply">{{$productComment->message}}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave Comment</h4>
                                            <form action="" method="post" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="user_id"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->id??null}}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="personal-rating">
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5"/>
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4"/>
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3"/>
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2"/>
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1"/>
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name" id="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" placeholder="Email" name="email" id="">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Message" name="message" id="" cols="30"
                                                                  rows="10"></textarea>
                                                        <button type="submit" class="site-btn">Send Message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Detail Section end -->

    <!-- Related Product Section begin -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            @include('front.components.product-item')
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Product Section end -->
@endsection
