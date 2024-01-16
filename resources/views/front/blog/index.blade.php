@extends('front.layout.master')

@section('title', 'Shop')

@section('body')
    <!-- Breadcrumb Section start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/index"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section end -->

    <!-- Blog Section begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Keyword…">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="">N4 PMMNM News</a></li>
                                <li><a href="">Travel</a></li>
                                <li><a href="">Science</a></li>
                                <li><a href="">Games</a></li>
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent posts</h4>
                            <div class="recent-blog">
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The start of the Project…</h6>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The start of the Project…</h6>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The start of the Project…</h6>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The start of the Project…</h6>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Tag #2</a>
                                <a href="#">Tag #3</a>
                                <a href="#">Tag #4</a>
                                <a href="#">Tag #5</a>
                                <a href="#">Tag #6</a>
                                <a href="#">Tag #7</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-1">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-1.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-2.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…2</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-3.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…3</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-4.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…4</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-5.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…5</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <!-- <a href="blog-details.html"></a> -->
                                    <img src="img/blog/blog-6.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The start of the Project…6</h4>
                                        <p>Quang Du <span>- 18/07/2023</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="loading-more">
                                <i class="icon_loading">
                                    <a href="#">Loading More</a>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section end -->
@endsection
