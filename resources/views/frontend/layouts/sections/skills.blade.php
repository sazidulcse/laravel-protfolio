<div class="section px-3 px-lg-4 pt-5" id="skills">
    <div class="container-narrow">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">My Skills</h2>
        </div>

        <div class="text-center">
            <p class="mx-auto mb-3" style="max-width:600px">I am a quick learner and specialize in
                multitude of skills required for Web Application Development and Product Design</p>
        </div>
        <div class="bg-light p-3">
            <div class="row">
                @forelse ($skills as $key=> $skill)
                    <div class="col-md-5">
                        <div class="py-1">
                            <div class="d-flex text-small fw-bolder"><span
                                    class="me-auto">{{ $skill->skill_name }}</span><span>{{ $skill->percent }}</span>
                            </div>
                            <div class="progress my-1">
                                <div class="progress-bar bg-primary" role="progressbar" data-aos="zoom-in-right"
                                    data-aos-delay="100" data-aos-anchor=".skills-section"
                                    style="width: {{ $skill->percent }}%" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6 mx-auto text-center mr-2">
                        <h3>No skill found Your Skill </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
