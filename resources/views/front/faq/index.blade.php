@extends('front.layout.master')

@section('title', 'FAQ')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/index"><i class="fa fa-home"></i> Home</a>
                        <span>FAQ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading active">
                                    <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                        Question Number #1
                                    </a>
                                </div>
                                <div class="collapse show" id="collapseOne" data-parrent="accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dignissimos vero inventore harum ratione, veniam laudantium odio vel veritatis facilis illum non ducimus obcaecati quidem! Vero quas voluptate blanditiis ex.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        Question Number #2
                                    </a>
                                </div>
                                <div class="collapse" id="collapseTwo" data-parrent="accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dignissimos vero inventore harum ratione, veniam laudantium odio vel veritatis facilis illum non ducimus obcaecati quidem! Vero quas voluptate blanditiis ex.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Question Number #3
                                    </a>
                                </div>
                                <div class="collapse" id="collapseThree" data-parrent="accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dignissimos vero inventore harum ratione, veniam laudantium odio vel veritatis facilis illum non ducimus obcaecati quidem! Vero quas voluptate blanditiis ex.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
