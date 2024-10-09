<div class="section px-2 px-lg-4 pb-4 pt-5 mb-5" id="contact">
    <div class="container-narrow">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">Contact Me</h2>
        </div>
        <div class="row">
            <div class="col-md-12" data-aos="zoom-in" data-aos-delay="100">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-light my-2 p-3 pt-2">
                    <form action="{{ route('sent')}}" method="POST">
                        @csrf
                        <div class="form-group my-2">
                            <label for="name" class="form-label fw-bolder">Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                required>
                        </div>
                        <div class="form-group my-2">
                            <label for="email" class="form-label fw-bolder">Email</label>
                            <input class="form-control" type="email" id="email" name="_replyto"
                                required>
                        </div>
                        <div class="form-group my-2">
                            <label for="message" class="form-label fw-bolder">Message</label>
                            <textarea class="form-control" style="resize: none;" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>