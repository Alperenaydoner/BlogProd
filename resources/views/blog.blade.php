{{ view('layouts.header') }}
<link rel="stylesheet" href="{{ asset('/../../resources/css/style.css') }}">

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="container-fluid wrapper">
                        <div class="row">
                            <div class="sidebar-wrapper col-4">
                                <div class="profile-container">
                                    <img class="profile box-image-preview img-fluid img-circle elevation-2" src="{{ isset($user['image_path']) && !empty($user['image_path']) ? asset('assets/images/'. $user['image_path'])  : asset('assets/images/user-thumb.jpg') }}" alt="" style="height:200px; width:200px;" />
                                    <h1 class="name">
                                        {{ isset($user['first_name']) ? $user['first_name'] : '' }}
                                        {{ isset($user['last_name']) ? $user['last_name'] : '' }}
                                    </h1>
                                    <h3 class="tagline">
                                        {{ isset($user['profile_title']) ? $user['profile_title'] : '' }}
                                    </h3>
                                </div>
                                <!--//profile-container-->

                                <div class="contact-container container-block">
                                    <ul class="list-unstyled contact-list">
                                        @if (!empty($user['email']))
                                        <li class="email"><i class="fa-solid fa-envelope"></i>
                                            <a class="ms-3" href="mailto: {{ isset($user['email']) ? $user['email'] : 'yourmail@example.com' }}">{{ isset($user['email']) ? $user['email'] : '' }}</a>
                                        </li>
                                        @endif
                                        @if (!empty($user['phone_number']))
                                        <li class="phone"><i class="fa-solid fa-phone"></i>
                                            <a class="ms-3" href="tel:{{ isset($user['phone_number']) ? $user['phone_number'] : '' }}">{{ isset($user['phone_number']) ? $user['phone_number'] : '' }}</a>
                                        </li>
                                        @endif
                                        @if (!empty($user['website']))
                                        <li class="website"><i class="fa-solid fa-globe"></i>
                                            <a class="ms-3" href="{{ isset($user['website']) ? $user['website'] : '' }}" target="_blank">{{ isset($user['website']) ? $user['website'] : '' }}</a>
                                        </li>
                                        @endif
                                        @if (!empty($user['linkedin_link']))
                                        <li class="linkedin"><i class="fa-brands fa-linkedin-in"></i>
                                            <a class="ms-3" href="{{ isset($user['linkedin_link']) ? $user['linkedin_link'] : '' }}" target="_blank">{{ isset($user['linkedin_link']) ? $user['linkedin_link'] : '' }}</a>
                                        </li>
                                        @endif
                                        @if (!empty($user['github_link']))
                                        <li class="github"><i class="fa-brands fa-github"></i>
                                            <a class="ms-3" href="{{ isset($user['github_link']) ? $user['github_link'] : '' }}" target="_blank">{{ isset($user['github_link']) ? $user['github_link'] : '' }}</a>
                                        </li>
                                        @endif
                                        @if (!empty($user['twitter']))
                                        <li class="twitter"><i class="fa-brands fa-twitter"></i>
                                            <a class="ms-3" href="{{ isset($user['twitter']) ? $user['twitter'] : '' }}" target="_blank">{{ isset($user['twitter']) ? $user['twitter'] : '' }}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <!--//contact-container-->

                                <div class="education-container container-block">
                                    <h2 class="container-block-title">Education</h2>
                                    @if (!empty($user['education']))
                                    @foreach ($user['education'] as $education)
                                    <div class="item">
                                        <h4 class="degree">
                                            {{ isset($education['degree_title']) ? $education['degree_title'] : '' }}
                                        </h4>
                                        <h5 class="meta">
                                            {{ isset($education['institute']) ? $education['institute'] : '' }}
                                        </h5>
                                        <div class="time">
                                        {{ isset($education['edu_start_date']) ? \Carbon\Carbon::createFromFormat('M d Y h:i:sA', $education['edu_start_date'])->format('Y-m-d') : '' }}
                                            -
                                            {{ isset($education['edu_end_date']) ? \Carbon\Carbon::createFromFormat('M d Y h:i:s:A', $education['edu_end_date'])->format('Y-m-d') : '' }}
                                        </div>
                                        <p>
                                            {{ isset($education['education_description']) ? $education['education_description'] : '' }}
                                        </p>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <!--//education-container-->

                                <div class="languages-container container-block">
                                    <h2 class="container-block-title">Languages</h2>
                                    <ul class="list-unstyled interests-list">
                                        @if (!empty($user['languages']))
                                        @foreach ($user['languages'] as $languages)
                                        <li>{{ isset($languages['language']) ? $languages['language'] : '' }}
                                            <span class="lang-desc">
                                                ({{ isset($languages['language_level']) ? $languages['language_level'] : '' }})
                                            </span>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <!--//languages-->

                                <div class="interests-container container-block">
                                    <h2 class="container-block-title">Interests</h2>
                                    <ul class="list-unstyled interests-list">
                                        @if (!empty($user['interests']))
                                        @foreach ($user['interests'] as $interests)
                                        <li>
                                            {{ isset($interests['interest']) ? $interests['interest'] : '' }}
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <!--//interests-->

                            </div>
                            <!--//sidebar-wrapper-->

                            <div class="main-wrapper col-8">
                                <section class="section summary-section">
                                    <h2 class="section-title">
                                        <span class="icon-holder">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        Career Profile
                                    </h2>
                                    @if (!empty($user['about_me']))

                                    <div class="summary">
                                        <p>
                                            {{ isset($user['about_me']) ? $user['about_me'] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis aliquam est harum minima dolorem nisi, et beatae dolorum atque eius necessitatibus molestiae perferendis, ipsum esse.' }}
                                        </p>
                                    </div>
                                    @endif

                                    <!--//summary-->
                                </section>
                                <!--//section-->

                                <section class="section experiences-section">
                                    <h2 class="section-title">
                                        <span class="icon-holder"><i class="fa-solid fa-briefcase"></i>
                                        </span>
                                        Experiences
                                    </h2>
                                    @if (!empty($user['experience']))
                                    @foreach ($user['experience'] as $experience)
                                    <div class="item">
                                        <div class="meta">
                                            <div class="upper-row">
                                                <h3 class="job-title">
                                                    {{ isset($experience['job_title']) ? $experience['job_title'] : '' }}
                                                </h3>
                                                <div class="time">
                                                    {{ isset($experience['job_start_date']) ? $experience['job_start_date'] : '' }}
                                                    -
                                                    {{ isset($experience['job_end_date']) ? $experience['job_end_date'] : '' }}
                                                </div>
                                            </div>
                                            <!--//upper-row-->
                                            <div class="company">
                                                {{ isset($experience['organization']) ? $experience['organization'] : '' }}
                                            </div>
                                        </div>
                                        <!--//meta-->
                                        <div class="details">
                                            <p>{{ isset($experience['job_description']) ? $experience['job_description'] : '' }}
                                            </p>
                                        </div>
                                        <!--//details-->
                                    </div>
                                    <!--//item-->
                                    @endforeach
                                    @endif

                                </section>
                                <!--//section-->

                                <section class="section projects-section">
                                    <h2 class="section-title">
                                        <span class="icon-holder"><i class="fa-solid fa-archive"></i></span>
                                        Projects
                                    </h2>
                                    @if (!empty($user['projects']))
                                    @foreach ($user['projects'] as $projects)
                                    <div class="item">
                                        <span class="project-title">
                                            <a target="_blank">{{ isset($projects['project_title']) ? $projects['project_title'] : '' }}</a>
                                        </span>
                                        -
                                        <span class="project-tagline">
                                            {{ isset($projects['project_description']) ? $projects['project_description'] : '' }}
                                        </span>

                                    </div>
                                    <!--//item-->
                                    @endforeach
                                    @endif
                                </section>
                                <!--//section-->

                                <section class="skills-section section">
                                    <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-rocket"></i></span>Skills
                                        &amp; Proficiency</h2>
                                    <div class="skillset">
                                        @if (!empty($user['skills']))
                                        @foreach ($user['skills'] as $skills)
                                        <div class="item">
                                            <h3 class="level-title">
                                                {{ isset($skills['skill_name']) ? $skills['skill_name'] : '' }}
                                            </h3>
                                            <div class="progress level-bar">
                                                <div class="progress-bar theme-progress-bar" role="progressbar" style="width: {{ isset($skills['skill_percentage']) ? $skills['skill_percentage'] : '0' }}%" aria-valuenow="{{ isset($skills['skill_percentage']) ? $skills['skill_percentage'] : '0' }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <!--//item-->
                                        @endforeach
                                        @endif

                                    </div>
                                </section>
                                <!--//skills-section-->

                            </div>
                            <!--//main-body-->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
</div>

{{ view('layouts.footer') }}