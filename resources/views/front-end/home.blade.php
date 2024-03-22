<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>{{ $basic_details->d_name }} | Portfolio</title>
    <!-- font icons -->
    @foreach ($css as $path)
        <link rel="stylesheet" href="{{ config('site-specific.live-path') . $path }}">
    @endforeach

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    {{-- <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i
            class="ti-shift-left-alt"></i> Components</a> --}}
    <header class="header"
        style="background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ getUploadImage($basic_details->CoverImage->image_name, 'portfolio_cover_image') }});
    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ getUploadImage($basic_details->CoverImage->image_name, 'portfolio_cover_image') }});">
        <div class="container">
            <ul class="social-icons pt-3">
                @foreach ($basic_details->Connections as $item)
                    <li class="social-item"><a class="social-link text-light" href="{{ $item->link }}"><i
                                class="ti-{{ $item->icon }}" aria-hidden="true"></i></a></li>
                @endforeach
                {{-- <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-facebook"
                            aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-twitter"
                            aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-google"
                            aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-instagram"
                            aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-github"
                            aria-hidden="true"></i></a></li> --}}
            </ul>
            <div class="header-content">
                <h4 class="header-subtitle">Hello, I am</h4>
                <h1 class="header-title">{{ $basic_details->d_name }}</h1>
                <h6 class="header-mono">{{ $basic_details->m_path }}</h6>
                <a class="btn btn-primary btn-rounded"><i class="ti-printer pr-2"></i>Print Resume</a>
            </div>
        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#resume" class="nav-link">Resume</a>
                    </li>
                </ul>
                <ul class="navbar-nav brand">
                    <img src="{{ getUploadImage($basic_details->UserImage->image_name, 'portfolio_user_image') }}"
                        alt="" class="brand-img">
                    <li class="brand-txt">
                        <h5 class="brand-title">{{ $basic_details->d_name }}</h5>
                        <div class="brand-subtitle">{{ $basic_details->m_path }}</div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#portfolio" class="nav-link">Projects</a>
                    </li>
                    @if ($news)
                        <li class="nav-item">
                            <a href="#blog" class="nav-link">Blog</a>
                        </li>
                    @endif
                    <li class="nav-item last-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="about" class="row about-section">
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Who am I ?</h3>
                <span class="line mb-5"></span>
                <h5 class="mb-3">{{ $basic_details->caption }}</h5>
                <p class="mt-20">{{ $basic_details->about }}</p>
                <button class="btn btn-outline-danger"><i class="icon-down-circled2 "></i>Download My CV</button>
            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Personal Info</h3>
                <span class="line mb-5"></span>
                <ul class="mt40 info list-unstyled">
                    <li><span>Birthdate</span> : {{ $basic_details->b_date }}</li>
                    <li><span>Email</span> : {{ $basic_details->email }}</li>
                    <li><span>Phone</span> : + (94) {{ $basic_details->p_number }}</li>
                    <li><span>Address</span> : {{ $basic_details->address }}</li>
                </ul>
                <ul class="social-icons pt-3">
                    @foreach ($basic_details->Connections as $item)
                        <li class="social-item"><a class="social-link" href="{{ $item->link }}"><i
                                    class="ti-{{ $item->icon }}" aria-hidden="true"></i></a></li>
                    @endforeach
                    {{-- <li class="social-item"><a class="social-link" href="#"><i class="ti-facebook"
                                aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-twitter"
                                aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-google"
                                aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-instagram"
                                aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-github"
                                aria-hidden="true"></i></a></li> --}}
                </ul>
            </div>
            @if (count($expertise) > 0)
                <div class="col-lg-4 about-card">
                    <h3 class="font-weight-light">My Expertise</h3>
                    <span class="line mb-5"></span>
                    @foreach ($expertise as $item)
                        <div class="row">
                            <div class="col-1 text-danger pt-1"><i class="fab fa-2xl fa-{{ $item->icon }}"></i></div>
                            <div class="col-10 ml-auto mr-3">
                                <h6>{{ $item->title }}</h6>
                                <p class="subtitle">{{ $item->short_title }}</p>
                                <hr>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Web Development</h6>
                        <p class="subtitle">Lorem ipsum dolor sit consectetur.</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Digital Marketing</h6>
                        <p class="subtitle">voluptate commodi illo voluptatib.</p>
                        <hr>
                    </div>
                </div> --}}
                </div>
            @endif
        </div>
    </div>

    <!--Resume Section-->
    <section class="section" id="resume">
        <div class="container">
            <h2 class="mb-5"><span class="text-danger">My</span> Resume</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="mt-2">
                                <h4>Education</h4>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($education as $item)
                                <h6 class="title text-danger">{{ $item->SchoolDetails->from }} -
                                    {{ $item->SchoolDetails->to }}</h6>
                                <P><b>{{ $item->SchoolDetails->title }}</b></P>
                                <P><b>{{ $item->EducationDetails->title }} - {{ $item->title }}</b></P>
                                <P class="subtitle">{{ $item->description }}</P>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <h4 class="mt-2">Skills</h4>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            @foreach ($skills as $item)
                                <h6>{{ $item->skill }}</h6>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                        style="width: {{ $item->percentage }}%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <h4 class="mt-2">Languages</h4>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            @foreach ($languages as $item)
                                <h6>{{ $item->languages }}</h6>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                        style="width: {{ $item->percentage }}%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (count($expertise) > 0)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-2">
                                    <h4>Expertise</h4>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($expertise as $item)
                                    <h6 class="title text-danger">{{ $item->title }}</h6>
                                    <p><b>{{ $item->short_title }}</b></p>
                                    <P class="subtitle">{{ $item->description }}</P>
                                    <hr>
                                @endforeach

                                {{-- <h6 class="title text-danger">2016 - 2017</h6>
                            <P>Front-end Developer</P>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum
                                recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                            <hr>
                            <h6 class="title text-danger">2015 - 2016</h6>
                            <P>UX Designer</P>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum
                                recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P> --}}
                            </div>
                        </div>
                    </div>
                @endif
                @if (count($work_experience) > 0)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-2">
                                    <h4>Work Experience</h4>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($work_experience as $item)
                                    <h6 class="title text-danger">{{ $item->company }}</h6>
                                    <P><b>{{ $item->position }}</b></P>
                                    <P><b>{{ $item->from }} - {{ $item->to }}</b></P>
                                    <hr>
                                @endforeach

                                {{-- <h6 class="title text-danger">2016 - 2017</h6>
                            <P>Front-end Developer</P>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum
                                recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                            <hr>
                            <h6 class="title text-danger">2015 - 2016</h6>
                            <P>UX Designer</P>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum
                                recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P> --}}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <section class="section bg-dark text-center">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="row ">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">500</h1>
                            <p class="text-light mb-1">Hours Worked</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">50K</h1>
                            <p class="text-light mb-1">Project Finished</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">200K</h1>
                            <p class="text-light mb-1">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">2k</h1>
                            <p class="text-light mb-1">Coffee Drinked</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($my_service)
        <section class="section" id="service">
            <div class="container">
                <h2 class="mb-5 pb-4"><span class="text-danger">My</span> Services</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-vector text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Ullam</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-write text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Asperiores</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-package text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Tempora</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-map-alt text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Provident</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-bar-chart text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Consectetur</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-5">
                            <div class="card-header has-icon">
                                <i class="ti-support text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="card-body px-4 py-3">
                                <h5 class="mb-3 card-title text-dark">Veritatis</h5>
                                <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                                    commodi
                                    provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt!
                                    In
                                    praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores
                                    suscipit
                                    blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($pricing)
        <section class="section bg-custom-gray" id="price">
            <div class="container">
                <h1 class="mb-5"><span class="text-danger">Packs</span> Pricing</h1>
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="price-card text-center mb-4">
                            <h3 class="price-card-title">Free</h3>
                            <div class="price-card-cost">
                                <sup class="ti-money"></sup>
                                <span class="num">0</span>
                                <span class="date">MO</span>
                            </div>
                            <ul class="list">
                                <li class="list-item">5 <span class="text-muted">Project</span></li>
                                <li class="list-item">1GB <span class="text-muted">Storage</span></li>
                                <li class="list-item"><span class="text-muted">No Domain</span></li>
                                <li class="list-item">1 <span class="text-muted">User</span></li>
                            </ul>
                            <button class="btn btn-primary btn-rounded w-lg">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="price-card text-center mb-4">
                            <h3 class="price-card-title">Basic</h3>
                            <div class="price-card-cost">
                                <sup class="ti-money"></sup>
                                <span class="num">10</span>
                                <span class="date">MO</span>
                            </div>
                            <ul class="list">
                                <li class="list-item">50 <span class="text-muted">Project</span></li>
                                <li class="list-item">10GB <span class="text-muted">Storage</span></li>
                                <li class="list-item">1<span class="text-muted">Domain</span></li>
                                <li class="list-item">5 <span class="text-muted">User</span></li>
                            </ul>
                            <button class="btn btn-primary btn-rounded w-lg">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="price-card text-center price-card-requried mb-4">
                            <h3 class="price-card-title">Exclusive</h3>
                            <div class="price-card-cost">
                                <sup class="ti-money"></sup>
                                <span class="num">25</span>
                                <span class="date">MO</span>
                            </div>
                            <ul class="list">
                                <li class="list-item">150 <span class="text-muted">Project</span></li>
                                <li class="list-item">15GB <span class="text-muted">Storage</span></li>
                                <li class="list-item">5<span class="text-muted"> Domain</span></li>
                                <li class="list-item">15<span class="text-muted">User</span></li>
                            </ul>
                            <button class="btn btn-primary btn-rounded w-lg">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="price-card text-center mb-4">
                            <h3 class="price-card-title">Pro</h3>
                            <div class="price-card-cost">
                                <sup class="ti-money"></sup>
                                <span class="num">99</span>
                                <span class="date">MO</span>
                            </div>
                            <ul class="list">
                                <li class="list-item">500 <span class="text-muted">Project</span></li>
                                <li class="list-item">1000GB <span class="text-muted">Storage</span></li>
                                <li class="list-item">10<span class="text-muted"> Domain</span></li>
                                <li class="list-item">Unlimite<span class="text-muted">User</span></li>
                            </ul>
                            <button class="btn btn-primary btn-rounded w-lg">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($freelance)
        <section class="section bg-dark py-5">
            <div class="container text-center">
                <h2 class="text-light mb-5 font-weight-normal">I Am Available For FreeLance</h2>
                <button class="btn bg-primary w-lg">Hire me</button>
            </div>
        </section>
    @endif

    <!-- Portfolio Section -->
    <section class="section bg-custom-gray" id="portfolio">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">My</span> Projects</h1>
            <div class="portfolio">
                <div class="filters">
                    <a href="#" data-filter=".new" class="active">
                        New
                    </a>
                    <a href="#" data-filter=".advertising">
                        Advertising
                    </a>
                    <a href="#" data-filter=".branding">
                        Branding
                    </a>
                    <a href="#" data-filter=".web">
                        Web
                    </a>
                </div>
                <div class="portfolio-container">
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-1.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-2.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-2.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSTISING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 web">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-4.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 advertising">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-1.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSITING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-3.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-3.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSITING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-4.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERTISING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-1.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-2.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-3.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-4.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-5.jpg" class="img-fluid"
                                alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-5.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of portfolio section -->

    @if ($news)
        <section class="section" id="blog">
            <div class="container">
                <h2 class="mb-5">Latest <span class="text-danger">News</span></h2>
                <div class="row">
                    <div class="blog-card">
                        <div class="img-holder">
                            <img src="assets/imgs/blog1.jpg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="content-holder">
                            <h6 class="title">Consectetur adipisicing elit</h6>

                            <p class="post-details">
                                <a href="#">By: Admin</a>
                                <a href="#"><i class="ti-heart text-danger"></i> 234</a>
                                <a href="#"><i class="ti-comment"></i> 123</a>
                            </p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nesciunt qui sit velit
                                delectus voluptates, repellat ipsum culpa id deleniti. Rerum debitis facilis accusantium
                                neque numquam mollitia modi quasi distinctio.</p>

                            <p><b>Necessitatibus nihil impedit! Ex nisi eveniet, dolor aliquid consequuntur
                                    repudiandae.</b>
                            </p>
                            <p>Magnam in repellat enim harum omnis aperiam! Explicabo illo, commodi, dolor blanditiis
                                cupiditate harum nisi vero accusamus laudantium voluptatibus dolores quae obcaecati.</p>

                            <a href="#" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                        </div>
                    </div><!-- end of blog wrapper -->

                    <!-- blog-card -->
                    <div class="blog-card">
                        <div class="img-holder">
                            <img src="assets/imgs/blog2.jpg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="content-holder">
                            <h6 class="title">Explicabo illo</h6>

                            <p class="post-details">
                                <a href="#">By: Admin</a>
                                <a href="#"><i class="ti-heart text-danger"></i> 456</a>
                                <a href="#"><i class="ti-comment"></i> 264</a>
                            </p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit excepturi laborum enim,
                                vitae ipsam atque eum, ad iusto consequuntur voluptas, esse doloribus. Perferendis porro
                                quisquam vitae exercitationem aliquid, minus eos laborum repudiandae, cumque debitis
                                iusto
                                omnis praesentium? Laborum placeat sit adipisci illum tempore maxime, esse qui quae?
                                Molestias excepturi corporis similique doloribus. Esse vitae earum architecto nulla non
                                dolores illum at perspiciatis quod, et deleniti cupiditate reiciendis harum facere,
                                delectus
                                eum commodi soluta distinctio sit repudiandae possimus sunt. Ipsum, rem.</p>

                            <a href="#" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                        </div>
                    </div><!-- end of blog wrapper -->
                    <!-- blog-card -->
                    <div class="blog-card">
                        <div class="img-holder">
                            <img src="assets/imgs/blog3.jpg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="content-holder">
                            <h4 class="title">Porro Quisqua</h4>

                            <p class="post-details">
                                <a href="#">By: Admin</a>
                                <a href="#"><i class="ti-heart text-danger"></i> 431</a>
                                <a href="#"><i class="ti-comment"></i> 312</a>
                            </p>

                            <p> consectetur adipisicing elit. Impedit excepturi laborum enim, vitae ipsam atque eum, ad
                                iusto consequuntur voluptas, esse doloribus. Perferendis porro quisquam vitae
                                exercitationem
                                aliquid, minus eos laborum repudiandae, cumque debitis iusto omnis praesentium? Laborum
                                placeat sit adipisci illum tempore maxime, esse qui quae? Molestias excepturi corporis
                                similique doloribus. Esse vitae earum architecto nulla non dolores illum at perspiciatis
                                quod, et deleniti cupiditate reiciendis harum facere, delectus eum commodi soluta
                                distinctio
                                sit repudiandae possimus sunt. Ipsum, rem.</p>

                            <a href="#" class="read-more">Read more <i class="ti-angle-double-right"></i></a>
                        </div>
                    </div><!-- end of blog wrapper -->

                </div>
            </div>
        </section>
    @endif

    <div class="section contact" id="contact">
        <div id="map" class="map"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-card">
                        <h4 class="contact-title">Send a message</h4>
                        <form action="">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id=" placeholder="Message *" rows="7" required></textarea>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="form-control btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <h4 class="contact-title">Get in touch</h4>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-mobile icon-md"></i>
                            </div>
                            <div class="col-10 ">
                                <h6 class="d-inline">Phone : <br> <span class="text-muted">+ (94)
                                        {{ $basic_details->p_number }}</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-map-alt icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Address :<br> <span
                                        class="text-muted">{{ $basic_details->address }}</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-envelope icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Email :<br> <span
                                        class="text-muted">{{ $basic_details->email }}</span></h6>
                            </div>
                        </div>
                        <ul class="social-icons pt-4">
                            @foreach ($basic_details->Connections as $item)
                                <li class="social-item"><a class="social-link text-dark"
                                        href="{{ $item->link }}"><i class="ti-{{ $item->icon }}"
                                            aria-hidden="true"></i></a></li>
                            @endforeach
                            {{-- <li class="social-item"><a class="social-link text-dark" href="#"><i
                                        class="ti-twitter" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i
                                        class="ti-google" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i
                                        class="ti-linkedin" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i
                                        class="ti-github" aria-hidden="true"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer py-3">
        <div class="container">
            <p class="small mb-0 text-light">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> Created <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com"
                    target="_blank"><span class="text-danger"
                        title="Bootstrap 4 Themes and Dashboards">IDK</span></a>
            </p>
        </div>
    </footer>

    <!-- core  -->
    @foreach ($script as $path)
        <script src="{{ config('site-specific.live-path') . $path }}"></script>
    @endforeach
</body>

</html>
