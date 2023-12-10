<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('/assets/images/logo.png') }}" type="image/png">
    <met#aeb3b8et="utf-8">
        <title>{{ env('APP_NAME') }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('/assets/css/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/css/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 sticky-lg-top vh-100">
                <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
                    <img class="w-100 img-fluid mb-4" src="{{ isset($user['image_path']) && !empty($user['image_path']) ? asset('assets/images/'. $user['image_path'])  : asset('assets/images/user-thumb.jpg') }}" alt="Image">
                    <h1 class="text-primary mt-2">{{ null !== $user->fullName() ? $user->fullName() : 'About Me kayıtlı değil' }}</h1>
                    <div class="mb-4" style="height: 22px;">
                        <h4 class="typed-text-output d-inline-block text-light"></h4>
                        <div class="typed-text d-none">Web Developer, Front End Developer, Apps Developer</div>
                    </div>
                    <div class="d-flex justify-content-center mt-auto mb-3">
                    <a class="btn btn-secondary btn-square mx-1" href={{ $user->twitter ? $user->twitter: '#' }}><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href={{ $user->github_link ? $user->github_link: '#'}}><i class="fab fa-github"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href={{ $user->linkedin_link ? $user->linkedin_link: '#' }}><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href="https://www.instagram.com/alperen.aaydnr/"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="d-flex align-items-end justify-content-between border-top">
                        <!-- <a href="" class="btn w-50 border-end">Download CV</a> -->
                        <a href="#contact" class="btn w-100 btn-scroll">Contact Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <!-- About Start -->
                <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="title pb-3 mb-5">About Me</h1>
                    <p>{{ isset($user['about_me']) ? $user['about_me'] : 'Abount Me kayıtlı değil' }}</p>
                    <div class="row mb-4">
                        <div class="col-sm-6 py-1">
                            <span class="fw-medium text-primary">Name:</span>{{ null !== $user->fullName() ? $user->fullName() : 'About Me kayıtlı değil' }}
                        </div>
                        <div class="col-sm-6 py-1">
                            <span class="fw-medium text-primary">Birthday:</span> 06 June 2000
                        </div>
                        <div class="col-sm-6 py-1">
                            <span class="fw-medium text-primary">Experience:</span> 3 Years
                        </div>
                        <div class="col-sm-6 py-1">
                            <span class="fw-medium text-primary">Email:</span> {{ isset($user['email']) ? $user['email'] : 'yourmail@example.com' }}
                        </div>
                        <div class="col-sm-6 py-1">
                            <span class="fw-medium text-primary">Freelance:</span> Available
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="d-flex bg-secondary p-4">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">3</h1>
                                <div class="ps-3">
                                    <p class="mb-0">Years of</p>
                                    <h5 class="mb-0">Experience</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="d-flex bg-secondary p-4">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                <div class="ps-3">
                                    <p class="mb-0">Complete</p>
                                    <h5 class="mb-0">Projects</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- About End -->

                <!-- Skills Start -->
                <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="title pb-3 mb-5">Skills</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            @foreach ($user['skills'] as $skills)
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">{{ isset($skills->skill_name) ? $skills->skill_name : '' }}</p>
                                    <p class="mb-2">{{ isset($skills->skill_percentage) ? $skills->skill_percentage : '' }}</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{ isset($skills->skill_percentage) ? $skills->skill_percentage : '' }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </section>
                <!-- Skills End -->

                <!-- Expericence Start -->
                <!--<section class="py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Expericence</h1>
                        <div class="border-start border-2 border-light pt-2 ps-5">
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; left: -50px;"></span>
                                <h5 class="mb-1">Web Designer</h5>
                                <p class="mb-2">Soft Company | <small>2000 - 2050</small></p>
                                <p>Tempor eos dolore amet tempor dolor tempor. Dolore ea magna sit amet dolor eirmod. Eos ipsum est tempor dolor. Clita lorem kasd sed ea lorem diam ea lorem eirmod duo sit ipsum stet lorem diam</p>
                            </div>
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; left: -50px;"></span>
                                <h5 class="mb-1">Web Designer</h5>
                                <p class="mb-2">Soft Company | <small>2000 - 2050</small></p>
                                <p>Tempor eos dolore amet tempor dolor tempor. Dolore ea magna sit amet dolor eirmod. Eos ipsum est tempor dolor. Clita lorem kasd sed ea lorem diam ea lorem eirmod duo sit ipsum stet lorem diam</p>
                            </div>
                            <div class="position-relative mb-4">
                                <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; left: -50px;"></span>
                                <h5 class="mb-1">Web Designer</h5>
                                <p class="mb-2">Soft Company | <small>2000 - 2050</small></p>
                                <p>Tempor eos dolore amet tempor dolor tempor. Dolore ea magna sit amet dolor eirmod. Eos ipsum est tempor dolor. Clita lorem kasd sed ea lorem diam ea lorem eirmod duo sit ipsum stet lorem diam</p>
                            </div>
                        </div>
                    </section>-->
                <!-- Expericence End -->

                <!-- Services Start -->
                <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="title pb-3 mb-5">Services</h1>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="service-item">
                                <i class="fa fa-2x fa-laptop-code mx-auto mb-4"></i>
                                <h5 class="mb-2">Web Design</h5>
                                <p class="mb-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem lorem lorem est amet labore</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-item">
                                <i class="fab fa-2x fa-android mx-auto mb-4"></i>
                                <h5 class="mb-2">Apps Development</h5>
                                <p class="mb-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem lorem lorem est amet labore</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-item">
                                <i class="fa fa-2x fa-search mx-auto mb-4"></i>
                                <h5 class="mb-2">SEO</h5>
                                <p class="mb-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem lorem lorem est amet labore</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-item">
                                <i class="fa fa-2x fa-edit mx-auto mb-4"></i>
                                <h5 class="mb-2">Content Creating</h5>
                                <p class="mb-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem lorem lorem est amet labore</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Services End -->

                <!-- Portfolio Start -->
                <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="title pb-3 mb-5">Portfolio</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 text-center mb-2">
                                    <ul class="list-inline mb-4" id="portfolio-flters">
                                        <li class="btn btn-secondary active" data-filter="*"><i class="fa fa-star me-2"></i>All</li>
                                        <li class="btn btn-secondary" data-filter=".first"><i class="fa fa-laptop-code me-2"></i>Design</li>
                                        <li class="btn btn-secondary" data-filter=".second"><i class="fa fa-mobile-alt me-2"></i>Development</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row portfolio-container">
                                <div class="col-md-6 mb-4 portfolio-item first">
                                    <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid w-100" src="{{ url('assets/images/portfolio-1.jpg')}}" alt="">
                                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                            <a href="img/portfolio-1.jpg')}}" data-lightbox="portfolio">
                                                <i class="bi bi-plus text-light"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 portfolio-item second">
                                    <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid w-100" src="{{ url('assets/images/portfolio-2.jpg')}}" alt="">
                                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                            <a href="img/portfolio-2.jpg')}}" data-lightbox="portfolio">
                                                <i class="bi bi-plus text-light"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 portfolio-item first">
                                    <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid w-100" src="{{ url('assets/images/portfolio-3.jpg')}}" alt="">
                                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                            <a href="img/portfolio-3.jpg')}}" data-lightbox="portfolio">
                                                <i class="bi bi-plus text-light"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 portfolio-item second">
                                    <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid w-100" src="{{ url('assets/images/portfolio-4.jpg')}}" alt="">
                                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                            <a href="img/portfolio-4.jpg')}}" data-lightbox="portfolio">
                                                <i class="bi bi-plus text-light"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Portfolio End -->

                <!-- Testimonial Start -->
                <!--<section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Testimonial</h1>
                        <div class="owl-carousel testimonial-carousel">
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="{{ url('assets/images/testimonial-1.jpg')}}" style="width: 60px; height: 60px;">
                                    <div class="ps-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="{{ url('assets/images/testimonial-2.jpg')}}" style="width: 60px; height: 60px;">
                                    <div class="ps-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p class="fs-4 mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="{{ url('assets/images/testimonial-3.jpg')}}" style="width: 60px; height: 60px;">
                                    <div class="ps-3">
                                        <p class="text-primary fs-5 mb-1">Client Name</p>
                                        <i>Profession</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>-->
                <!-- Testimonial End -->

                <!-- Contact Start -->
                <section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
                    <h1 class="title pb-3 mb-5">Contact Me</h1>
                    <p class="mb-4">Thank you for reaching out! To get in touch, please fill out the form below, and I'll get back to you as soon as possible. Alternatively</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-secondary" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0 bg-secondary" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-secondary" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 bg-secondary" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="button" id="mailTo">Send Message</button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- Contact End -->

                <!-- Footer Start -->
                <section class="wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary text-light text-center p-5">
                        <div class="d-flex justify-content-center mb-4">
                        <a class="btn btn-secondary btn-square mx-1" href={{ $user->twitter ? $user->twitter: '#' }}><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href={{ $user->github_link ? $user->github_link: '#'}}><i class="fab fa-github"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href={{ $user->linkedin_link ? $user->linkedin_link: '#' }}><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-secondary btn-square mx-1" href="https://www.instagram.com/alperen.aaydnr/"><i class="fab fa-instagram"></i></a>
                        </div>

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <p class="m-0">Copyright © 2023 - 2024 {{ isset($user['email']) ? $user['email'] : 'yourmail@example.com' }}"</p>
                    </div>
                </section>
                <!-- Footer End -->
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/css/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/css/typed/typed.min.js') }}"></script>
    <script src="{{ asset('assets/css/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/css/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/css/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/css/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/css/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/css/lightbox/js/lightbox.min.js') }}"></script>

    <!-- <script src="lib/typed/typed.min.js"></script> -->
    <!-- <script src="lib/easing/easing.min.js"></script> -->
    <!-- <script src="lib/waypoints/waypoints.min.js"></script> -->
    <!-- <script src="lib/counterup/counterup.min.js"></script> -->
    <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
    <!-- <script src="lib/isotope/isotope.pkgd.min.js"></script> -->
    <!-- <script src="lib/lightbox/js/lightbox.min.js"></script> -->


    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#mailTo").click(function() {
                // Form verilerini al
                var email = $("#email").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                var name = $("#name").val();

                // CSRF belirtecini al
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // E-posta gönderme AJAX isteği
                $.ajax({
                    url: '/blogMail',
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        email: email,
                        subject: subject,
                        message: message,
                        name:name
                    },
                    success: function(response) {
                        console.log(response);
                        alert(response.message);
                    },
                    error: function(error) {

                        alert('E-posta gönderirken bir hata oluştu.');
                    }
                });
            });

        });
    </script>
</body>

</html>