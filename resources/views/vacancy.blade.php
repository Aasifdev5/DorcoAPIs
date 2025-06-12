@extends('master')
@section('title')
{{ __('Agricultural Engineering') }}
@endsection
@section('content')
<div class="solution-carousel">
    <div class="owl-carousel owl-theme owl-loaded owl-drag">



    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-4096px, 0px, 0px); transition: all; width: 14336px;"><div class="owl-item cloned" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider-2.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item cloned" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider-3.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item animated owl-animated-in fadeIn active" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider-2.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item animated owl-animated-in fadeIn" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider-3.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item cloned" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item cloned" style="width: 2048px;"><div class="item">
            <div class="solution-gallery" style="background-image:url({{ asset('images/commons/agriculture-solition-slider-2.jpg') }});">
                <div class="container">
                    <div class="pages-title">
                        <h1>Agriculture</h1>
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
        </div></div></div></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
    <div class="owl-theme">
        <div class="owl-controls">
            <div class="custom-nav owl-nav"></div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- SOLUTION SIDEBAR START -->
        <div class="col-lg-4 order-last order-md-3 spacing-md">
            <aside>
                <div class="inner-aside">
                    <div class="list-group solution-list-group">
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center current">
                            Agricultural Engineering
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center">
                            Chemical Research
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center">
                            Mechanical Engineering
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center">
                            Material Engineering
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center">
                            Petroleum and Gas
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                        <a href="{{ url('vacancy') }}" class="list-group-item d-flex justify-content-between align-items-center">
                            Power and Energy
                            <span class="badge"><i class="fas fa-chevron-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="inner-aside">
                    <h5>Latest News</h5>
                    <ul class="list-unstyled">
                        <li class="media">
                            <a href="blog-single.html"><img src="{{ asset('images/commons/blog-thumb-1.jpg') }}" class="mr-3" alt="..."> </a>
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="blog-single.html">The advances in the mechanics
                                        sector</a></h6>
                                <p>June 22 2020</p>
                            </div>
                        </li>
                        <li class="media center-media">
                            <a href="blog-single.html"><img src="{{ asset('images/commons/blog-thumb-2.jpg') }}" class="mr-3" alt="..."> </a>
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="blog-single.html">The Roth strategy we wish
                                        retirement</a></h6>
                                <p>June 18 2020</p>
                            </div>
                        </li>
                        <li class="media">
                            <a href="blog-single.html"><img src="{{ asset('images/commons/blog-thumb-3.jpg') }}" class="mr-3" alt="..."> </a>
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="blog-single.html">Improvements in construction
                                        techniques</a></h6>
                                <p>June 15 2020</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="inner-aside">
                    <h5>Popular Tags</h5>
                    <ul class="tags">
                        <li><a class="btn btn-default" href="#" role="button">Industrial</a></li>
                        <li><a class="btn btn-default" href="#" role="button">Construction</a></li>
                        <li><a class="btn btn-default" href="#" role="button">Oil</a></li>
                        <li><a class="btn btn-default" href="#" role="button">Gas</a></li>
                        <li><a class="btn btn-default" href="#" role="button">Petroleum</a></li>
                        <li><a class="btn btn-default" href="#" role="button">Material</a></li>
                    </ul>
                </div>
                <div class="inner-aside">
                    <h5>Follow On</h5>
                    <ul class="blog-social d-flex ">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="inner-aside">
                    <figure class="promo-banner">
                        <img src="{{ asset('images/commons/banner.jpg') }}" alt="">
                    </figure>
                </div>
            </aside>
        </div>
        <!-- SOLUTION SIDEBAR END -->

        <!-- SOLUTION CONTENT START -->
        <div class="col-lg-8 order-first order-md-9">
            <figure class="solution-feature">
                <img src="{{ asset('images/commons/agri-feature.jpg') }}" alt="">
            </figure>
            <div class="solution-caption">
                <h3 class="solution-title">
                    The Agricultural Engineering Provide by Industra
                </h3>
                <p>The vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                    cupiditate non provident. Similique sunt in culpa qui officia deserunt mollitia animi, id est
                    laborum et dolorum fuga. Et harum quidem rerum</p>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore
                    veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia
                    voluptas sit aspernatur aut odit aut fugit</p>
                <h3 class="solution-title">
                    Why Choose Industra
                </h3>
                <p>
                    <strong>The reason to explain to you how all this mistaken idea of denouncing pleasure and
                        praising pain was born and I will give you a complete account of the system, and expound the
                        actual teachings of the great explorer </strong>
                </p>
                <div class="row grid-layer">
                    <div class="col-lg-6">
                        <div class="grid-block">
                            <div class="media">
                                <div class="gb-box">
                                    <figure class="grid-blok-icon">
                                        <img src="{{ asset('images/icons/innovation.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Innovation Tecnology</h5>
                                    <p>The Industrial is responsible for minor and the codes security in hotel
                                        Ecosystem for Food and Cleaner through.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="grid-block">
                            <div class="media">
                                <div class="gb-box">
                                    <figure class="grid-blok-icon">
                                        <img src="{{ asset('images/icons/engineer.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Qualified Engineers</h5>
                                    <p>Our Aim Is to Keep the House Clean – Your Aim Will Help! the through Digital
                                        Innovation World Summit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="grid-block">
                            <div class="media">
                                <div class="gb-box">
                                    <figure class="grid-blok-icon">
                                        <img src="{{ asset('images/icons/shield.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Extended Warranty</h5>
                                    <p>Both of us take a lot of time in getting cleaned and beautified Clean Home.
                                        Professional Service.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="grid-block">
                            <div class="media">
                                <div class="gb-box">
                                    <figure class="grid-blok-icon">
                                        <img src="{{ asset('images/icons/medal-2.png') }}" alt="">
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Awarded Company</h5>
                                    <p>We are a company dedicated to giving our customers back the time they deserve
                                        to enjoy the things they love.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grid-layer">
                    <div class="col-lg-6">
                        <figure class="gl-thumb">
                            <img src="{{ asset('images/commons/ag-pic-3.jpg') }}" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-6 spacing-md">
                        <figure class="gl-thumb">
                            <img src="{{ asset('images/commons/ag-pic-1.jpg') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="accordion-layer">
                    <ul class="accordion">
                        <li>
                            <a class="active">How can i contact you?</a>
                            <p style="display: block;">The vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi.</p>
                        </li>
                        <li>
                            <a>What is your payment method?</a>
                            <p>We denounce with righteous indignation and dislike men who are so beguiled and
                                demoralized by the charms of pleasure of the moment, so blinded by desire.</p>
                        </li>
                        <li class="last-item">
                            <a>What are gas solutions?</a>
                            <p> when our power of choice is untrammelled and when nothing prevents our being able to
                                do what we like best, every pleasure is to be welcomed and every pain avoided. But
                                in certain circumstances and owing to the claims of duty or the obligations.</p>
                        </li>
                    </ul> <!-- / accordion -->
                </div>
            </div>
        </div>
        <!-- SOLUTION CONTENT END -->
    </div>
</div>
@endsection
