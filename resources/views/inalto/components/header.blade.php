
<!-- main menu start -->
<div class="main-menu-wrapper sticky header-transparent">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <!-- logo area start -->
                <div class="brand-logo">
                    <a href="index.html">
                        <img src="assets/img/logo/logo.png" alt="brand logo">
                    </a>
                </div>
                <!-- logo area end -->
            </div>
            <div class="col-lg-9">
                <div class="main-menu-inner">
                    <!-- main menu navbar start -->
                    <nav class="main-menu">
                        <ul>
                        
                            <li class="active"><a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home Version 01</a></li>
                                    <li><a href="index-2.html">Home Version 02</a></li>
                                </ul>
                            </li>
                            <!--
                            <li><a href="about.html">About us</a></li>
                            <li><a href="service.html">Services</a>
                                <ul class="dropdown">
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
                                </ul>
                            </li>
                            <li><a href="team.html">Team</a>
                                <ul class="dropdown">
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="team-2.html">Team Style 02</a></li>
                                    <li><a href="team-details.html">Team Details</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-left-sidebar.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-grid-full-width.html">Blog No Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="blog-details-left.html">Blog Details Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"> Pages </a>
                                <ul class="dropdown">
                                    <li><a href="faq.html">Faq</a></li>
                                    <li><a href="404.html">Page Not Found</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            -->
                            @if (Route::has('login'))
                                @auth
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><livewire:logout /></li>
                                   @else
                                        <li><a href="{{ route('login') }}">Login</a></li>

                                        @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                @endauth
                            @endif

                        </ul>
                    </nav>
                    <!-- main menu navbar end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main menu end -->
