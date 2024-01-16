@extends('admin.layout.master')

@section('title', 'New User')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>                    </div>
                    <div>
                        User
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
                        <form method="post" action="admin/user" enctype="multipart/form-data">
                            @csrf
                            @include('admin.component.notification')
                            <div class="position-relative row form-group">
                                <label for="image"
                                    class="col-md-3 offset-1 text-md-right col-form-label"></label>
                                <div class="col-md-7 col-xl-6">
                                    <img style="height: 100px; cursor: pointer;"
                                        class="thumbnail rounded-circle" data-toggle="tooltip"
                                        title="Click to change the image" data-placement="bottom"
                                        src="dashboard/assets/images/add-image-icon.jpg" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="">
                                    <small class="form-text text-muted">
                                        Click on the image to change (max file size 2MB)
                                    </small>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 offset-1 text-md-right col-form-label">Name</label>
                                <div class="col-md-7 col-xl-6">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Email</label>
                                <div class="col-md-7 col-xl-6">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Password</label>
                                <div class="col-md-7 offset col-xl-6">
                                    <input required name="password" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password_confirmation"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Confirm Password</label>
                                <div class="col-md-7 col-xl-6">
                                    <input required name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="company_name" class="col-md-3 offset-1 text-md-right col-form-label">
                                    Company Name
                                </label>
                                <div class="col-md-7 col-xl-6">
                                    <input name="company_name" id="company_name"
                                        placeholder="Company Name" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="country"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Country</label>
                                <div class="col-md-7 col-xl-6">
                                    <input name="country" id="country" placeholder="Country"
                                        type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="street_address" class="col-md-3 offset-1 text-md-right col-form-label">
                                    Street Address
                                </label>
                                <div class="col-md-7 col-xl-6">
                                    <input name="street_address" id="street_address"
                                        placeholder="Street Address" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="postcode_zip" class="col-md-3 offset-1 text-md-right col-form-label">
                                    Postcode Zip
                                </label>
                                <div class="col-md-7 col-xl-6">
                                    <input name="postcode_zip" id="postcode_zip"
                                        placeholder="Postcode Zip" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="town_city" class="col-md-3 offset-1 text-md-right col-form-label">
                                    Town City
                                </label>
                                <div class="col-md-7 col-xl-6">
                                    <input name="town_city" id="town_city" placeholder="Town City"
                                        type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Phone</label>
                                <div class="col-md-7 col-xl-6">
                                    <input required name="phone" id="phone" placeholder="Phone" type="tel"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level"
                                    class="col-md-3 offset-1 text-md-right col-form-label">Level</label>
                                <div class="col-md-7 col-xl-6">
                                    <select required name="level" id="level" class="form-control">
                                        <option value="">-- Level --</option>
                                        @foreach(\App\Utilities\Constant::$user_level as $user_level => $value)
                                        <option value={{$user_level}}>
                                            {{$value}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 offset-1 text-md-right col-form-label">Description</label>
                                <div class="col-md-7 col-xl-6">
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-7 col-xl-6 offset-md-2">
                                    <a href="/admin/user" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
