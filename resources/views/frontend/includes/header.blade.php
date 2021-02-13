<header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="{{route('homePage')}}"><img src="{{asset('public/upload/logo_images/'.$logo->image)}}" >
                            </div>
                            <div class="login-content">
                                <a class="btn btn-success" href="{{ route('dashboard') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li>
                                        <a href="{{route('homePage')}}" >Home</a>
                                    </li>                           
                                    <li><a href="{{route('about-us')}}">About AUB</a></li>
                                    <li class="cn-dropdown-item has-down pr12"><a href="#">Routine</a>
                                        <ul class="dropdown bg-success hover-dark">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="course.html">Course</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                        <span class="dd-trigger"></span><span class="dd-arrow"></span>
                                    </li>
                                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+8801678664413"><i class="icon-telephone-2"></i> <span>(+88)01678664413</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>