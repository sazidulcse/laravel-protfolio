@push('custom_css')
<style>
    .p{
        color:red;
    }
</style>
@endpush

<div class="section px-3 px-lg-4 pt-5" id="services">
    <div class="container-narrow">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">My Services</h2>
        </div>
        <div class="text-center">
            <p class="mx-auto mb-3" style="max-width:600px"> I offer services fit for any website or app.
                I can quickly maximize timely deliverables for real-time schemas.</p>
        </div>

        <div class="row py-3">
            @forelse ($services as $service)

            <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="100">
                <img class="mb-2" src="{{ url('storage/' . ($service->image ? $service->image : 'images/no-image.png')) }}"
                    width="96" height="96" alt="web design" />

                <div class="h5">{{ $service->service_name}}</div>
            </div>
            @endforeach

           
        </div>
    </div>
</div>
@push('custom_js')
<script>
    document.getElementById('services');
</script>
@endpush