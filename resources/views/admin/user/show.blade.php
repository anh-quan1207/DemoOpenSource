@extends('admin.layout.master')

@section('title', 'User Details')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <svg style="display: block; margin: auto" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>                    </div>
{{--                        <img height="30" src="front/img/user/ {{$user->avatar ?? 'default-avatar.jpg'}}" alt="">--}}
                        <div>
                        {{$user->name}}
                        <div class="page-title-subheading">
                            {{$user->email}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="/admin/user/{{$user->id}}/edit" class="nav-link">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-edit fa-w-20"></i>
                    </span>
                    <span>Edit</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="admin/user/{{$user->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="nav-link btn" type="submit"
                        onclick="return confirm('Do you really want to delete this item?')">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                            <i class="fa fa-trash fa-w-20"></i>
                        </span>
                        <span>Delete</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-5 text-md-right col-form-label"></label>
                            <div class="col-md-7 col-xl-6">
                                <p>
                                    <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip"
                                        title="Avatar" data-placement="bottom"
                                        src="front/img/user/{{$user->avatar ?? 'default-avatar.jpg'}}" alt="Avatar">
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-5 text-md-right col-form-label">
                                Name
                            </label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->name ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-5 text-md-right col-form-label">Email</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->email ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-5 text-md-right col-form-label">
                                Company Name
                            </label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->company_name ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="country"
                                class="col-md-5 text-md-right col-form-label">Country</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->country ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-5 text-md-right col-form-label">
                                Street Address</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->street_address ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-5 text-md-right col-form-label">
                                Postcode Zip</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->postcode_zip ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-5 text-md-right col-form-label">
                                Town City</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->town_city ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-5 text-md-right col-form-label">Phone</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->phone ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="level" class="col-md-5 text-md-right col-form-label">Level</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{App\Utilities\Constant::$user_level[$user->level] ?? '-'}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-5 text-md-right col-form-label">Description</label>
                            <div class="col-md-7 col-xl-6">
                                <p>{{$user->description ?? '-'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
