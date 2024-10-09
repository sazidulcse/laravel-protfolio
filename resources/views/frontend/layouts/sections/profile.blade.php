<header>
    <div class="cover bg-light">
        <div class="container px-3">
            <div class="row">
                <div class="col-lg-6 p-2"><img class="img-fluid"
                        src="{{ asset('assets/images/illustrations/hello3.svg') }}" alt="hello" /></div>
                <div class="col-lg-6">
                    <div class="mt-5">
                        <p class="lead text-uppercase mb-1">Hello!</p>
                        <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">I’m {{Auth()->user()->name??''}}
                            </h1>
                        <p class="lead fw-normal mt-3" data-aos="fade-up" data-aos-delay="100">{{$profile->profession ?? ''}}</p>
                       
                        <div class="social-nav" data-aos="fade-up" data-aos-delay="200">
                            <nav role="navigation">
                                <ul class="nav justify-content-left">
                                    <li class="nav-item"><a class="nav-link"
                                            href="https://twitter.com/{{$profile->twitter??''}}" title="Twitter"><i
                                                class="fab fa-twitter"></i><span
                                                class="menu-title sr-only">Twitter</span></a></li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="https://www.facebook.com/{{$profile->fb??''}}"
                                            title="Facebook"><i class="fab fa-facebook"></i><span
                                                class="menu-title sr-only">Facebook</span></a></li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="https://www.instagram.com/templateflip"
                                            title="Instagram"><i class="fab fa-instagram"></i><span
                                                class="menu-title sr-only">Instagram</span></a></li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="https://www.linkedin.com/" title="LinkedIn"><i
                                                class="fab fa-linkedin"></i><span
                                                class="menu-title sr-only">{{$profile->linkdin??''}}</span></a></li>

                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="mt-3" data-aos="fade-up" data-aos-delay="200"><a
                                class="btn btn-primary shadow-sm mt-1 hover-effect" href="#contact">Get In
                                Touch <i class="fas fa-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-bg"></div>
</header>