@extends('admin.layout.master')

@section('title', 'Product Details')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg>
                    </div>
                    <div>
                        Product
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-4 text-md-right col-form-label">Images</label>
                            <div class="col-md-8 col-xl-7">
                                <ul class="text-nowrap overflow-auto" id="images">

                                    @if(count($product->productImages) > 0)
                                        @foreach($product->productImages as $productImage)
                                        <li class="d-inline-block mr-1" style="position: relative;">
                                            <img style="height: 150px;" src="./front/img/products/{{$productImage->path ?? '_default-product.jpg'}}"
                                                alt="Image">
                                        </li>
                                        @endforeach
                                    @else
                                        <li class="d-inline-block mr-1" style="position: relative;">
                                            <img style="height: 150px;" src="./front/img/products/_default-product.jpg"
                                                 alt="Image">
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id"
                                class="col-md-4 text-md-right col-form-label">Product Images</label>
                            <div class="col-md-8 col-xl-7">
                                <p><a href="admin/product/{{$product->id}}/image">Manage images</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id"
                                class="col-md-4 text-md-right col-form-label">Product Details</label>
                            <div class="col-md-8 col-xl-7">
                                <p><a href="admin/product/{{$product->id}}/variant">Manage variants</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id"
                                class="col-md-4 text-md-right col-form-label">Brand</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->brand->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id"
                                class="col-md-4 text-md-right col-form-label">Category</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->ProductCategory->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-4 text-md-right col-form-label">Name</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="content"
                                class="col-md-4 text-md-right col-form-label">Content</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->content}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price"
                                class="col-md-4 text-md-right col-form-label">Price</label>
                            <div class="col-md-8 col-xl-7">
                                <p>${{$product->price}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="discount"
                                class="col-md-4 text-md-right col-form-label">Discount</label>
                            <div class="col-md-8 col-xl-7">
                                <p>${{$product->discount}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty"
                                class="col-md-4 text-md-right col-form-label">Qty</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->qty}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="weight"
                                class="col-md-4 text-md-right col-form-label">Weight</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->weight}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="sku"
                                class="col-md-4 text-md-right col-form-label">SKU</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->sku}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="tag"
                                class="col-md-4 text-md-right col-form-label">Tag</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->tag}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="featured"
                                class="col-md-4 text-md-right col-form-label">Featured</label>
                            <div class="col-md-8 col-xl-7">
                                @if($product->featured)
                                    <div class="badge badge-success mt-2">
                                        Yes
                                    </div>
                                @else
                                    <div class="badge badge-danger mt-2">
                                        No
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-4 text-md-right col-form-label">Description</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{!!$product->description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
