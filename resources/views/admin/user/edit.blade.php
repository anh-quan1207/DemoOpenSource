@extends('admin.layout.master')

@section('title', 'Edit User')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <svg style="display: block; margin: auto" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg>
                    </div>
                    <div>
                        {{$user->name}}
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
                        <form method="post" action="admin/user/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.component.notification')
                            <div class="position-relative row form-group">
                                <label for="image"
                                    class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;"
                                        class="thumbnail rounded-circle" data-toggle="tooltip"
                                        title="Click to change the image" data-placement="bottom"
                                        src="front/img/user/{{$user->avatar ?? 'default-avatar.jpg'}}" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="{{$user->avatar ?? 'default-avatar.jpg'}}">
                                    <small class="form-text text-muted">
                                        Click on the image to change (required)
                                    </small>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                    class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password_confirmation"
                                    class="col-md-3 text-md-right col-form-label">Confirm Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                    Company Name
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="company_name" id="company_name"
                                        placeholder="Company Name" type="text" class="form-control"
                                        value="{{$user->company_name}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="country"
                                    class="col-md-3 text-md-right col-form-label">Country</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="country" id="country" placeholder="Country"
                                        type="text" class="form-control" value="{{$user->country}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                    Street Address
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="street_address" id="street_address"
                                        placeholder="Street Address" type="text" class="form-control"
                                        value="{{$user->street_address}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                    Postcode Zip
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="postcode_zip" id="postcode_zip"
                                        placeholder="Postcode Zip" type="text" class="form-control"
                                        value="{{$user->postcode_zip}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                    Town City
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="town_city" id="town_city" placeholder="Town City"
                                        type="text" class="form-control" value="{{$user->town_city}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone"
                                    class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="phone" id="phone" placeholder="Phone" type="tel"
                                        class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level"
                                    class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="level" id="level" class="form-control">
                                        <option value="">-- Level --</option>
                                        @foreach(\App\Utilities\Constant::$user_level as $user_level => $value)
                                            <option value={{$user_level}} {{$user->level == $user_level ? 'selected' : ''}}>
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea name="description" id="description" class="form-control">{{$user->description}}</textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">

                                    <a href="javascript:void(0);" onclick="function goBack() {
                                        window.history.back();
                                    }
                                    goBack()" class="border-0 btn btn-outline-danger mr-1">
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
