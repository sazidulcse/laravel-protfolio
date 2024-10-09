<div class="section px-3 px-lg-4 pt-5" id="experience">
    <div class="container-narrow">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">Experience</h2>
        </div>
        <div class="row">
            @forelse ($experiences as $experience)
        
            <div class="col-md-6">
                <div class="card mb-3" data-aos="fade-right" data-aos-delay="100">
                    <div class="card-header px-3 py-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="h5 mb-1">{{ $experience->position ??''}}</h3>
                                <div class="text-muted text-small">{{ $experience->company_name??'' }}
                                    <small>({{ $experience->duration??'' }})</small></div>
                            </div><img src="{{ asset('assets/images/services/ui-ux.svg') }}"
                                width="48" height="48" alt="ui-ux" />
                        </div>
                    </div>
                    <div class="card-body px-3 py-2">
                        {{ $experience->description??'' }}
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
               <h3 class="text-center">No experiences found</h3>
            </div>
             @endforelse
             
        </div>
    </div>
</div>