<div class="section pt-4 px-3 px-lg-4" id="about">
    <div class="container-narrow">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h4 my-2">Hello! I’m {{ $users->name ?? '' }}</h1>
                <p>{{ $profile->description ?? '' }}</p>
                <div class="row mt-3">
                    <div class="col-sm-2">
                        <div class="pb-1">Age:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder">{{ $profile->age ?? '' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div class="pb-1">Email:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder">
                            {{ Auth()->user()->email ?? '' }}
                            {{-- <a
                                href="https://demo.templateflip.com/cdn-cgi/l/email-protection"
                                class="__cf_email__"
                                data-cfemail="582f39342c3d2a183b373528393621763b3735">[email&#160;protected]</a> --}}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="pb-1">Skype:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder"> {{ Auth()->user()->name ?? '' }}@skype.com</div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="pb-1">Phone:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder">{{ $profile->phone ?? '' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div class="pb-1">Address:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder">{{ $profile->address ?? '' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div class="pb-1">Staus:</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="pb-1 fw-bolder">{{ $profile->status ?? '' }}</div>
                    </div>
                </div>
            </div>
            @if ($profile && $profile->image)
                <div class="col-md-5 offset-md-1" data-aos="fade-left" data-aos-delay="100">
                    <img class="avatar img-fluid mt-2" src="{{ asset('storage/' . $profile->image) }}" width="400"
                        height="400" alt="Walter Patterson" />
                </div>
            @else
                <p>Profile image not found.</p>
            @endif




        </div>
    </div>
</div>
