<div class="section px-2 px-lg-4 pt-5" id="portfolio">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">Portfolio</h2>
        </div>

        <div class="grid bp-gallery pb-3" data-aos="zoom-in-up" data-aos-delay="100">
            @foreach ($protfolios as $key => $protfolio)
                <div class="grid-sizer"></div>
                <div class="grid-item"> <a href="https://dribbble.com/">
                        <figure class="portfolio-item">


                            <img src="{{ url('storage/' . ($protfolio->image ? $protfolio->image : 'images/no-image.png')) }}"
                                alt="{{ $protfolio->image }}">

                            <figcaption>
                                <h4 class="h5 mb-0">{{ $protfolio->protfolio_name }}</h4>
                                <div>{{ $protfolio->protfolio_link }}/div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
