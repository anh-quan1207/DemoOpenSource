@extends('admin.layout.master')

@section('title', 'Edit Product Images')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>                    </div>
                    <div>
                        Product Images
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
                    <div class="card-body">

                        <div class="position-relative row form-group">
                            <label for="product-id" class="col-md-3 text-md-right col-form-label">Product ID</label>
                            <div class="col-md-9 col-xl-8">
                                <input disabled placeholder="Product ID" type="text" id="product-id"
                                       class="form-control" value="{{$product->id}}">
                            </div>

                            <label for="name" class="col-md-3 text-md-right col-form-label">Product Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input disabled placeholder="Product Name" type="text" id="name"
                                    class="form-control" value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap" id="images">

                                    @foreach($productImages as $productImage)
                                    <li class="float-left d-inline-block mr-2 mb-2" style="position: relative; width: 32%;">
                                        <form action="admin/product/{{$product->id}}/image/{{$productImage->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Do you really want to delete this item?')"
                                                    class="btn btn-sm btn-outline-danger border-0 position-absolute">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <div style="width: 100%; height: 220px; overflow: hidden;">
                                            <img  src="front/img/products/{{$productImage->path}}"
                                            alt="Image">
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">
                                        <form method="post" action="admin/product/{{$product->id}}/image" enctype="multipart/form-data">
                                            @csrf
                                            <div style="width: 100%; max-height: 220px; overflow: hidden;">
                                                <img style="width: 100%; cursor: pointer;"
                                                    class="thumbnail"
                                                    data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                                    src="dashboard/assets/images/add-image-icon.jpg" alt="Add Image">

                                                <input name="image" type="file" onchange="changeImg(this); this.form.submit()"
                                                    accept="image/x-png,image/gif,image/jpeg"
                                                    class="image form-control-file" style="display: none;">

                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-3">
                                <a href="admin/product/{{$product->id}}" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-check fa-w-20"></i>
                                    </span>
                                    <span>SAVE</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
