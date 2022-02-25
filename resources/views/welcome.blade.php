<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SJE Members</title>
    <link rel="icon" href="/brand/icon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/welcome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm ">
            <div class="container">
                <!-- Brand Name -->
                <div id="brand" style="margin-left:100px">
                    <a  class="navbar-brand d-flex align-items-center" href="/">
                        <div class="pr-3" style="border-right:1px solid #333"><img src="/brand/logo.png" style="width:50px;"></div>
                        <div class="pl-3">SJE Members</div>
                    </a>
                </div>
                <!-- Collapsible Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Authentification Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item d-flex">
                                    <!-- My Profile -->
                                    <a class="nav-link" href="/profile/{{Auth::user()->id}}">My Profile</a>
                                    <!-- Logout -->
                                    @if(Route::has('logout'))
                                        <div>
                                            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @endif
                                </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div id="card-body" class="container">
                <!-- Header -->
                <div class="row mt-3 pt-3 col-12" id="container">
                    <div id="sje_picture-box" class="col-md-4 col-12 mb-4">
                        <a href="https://supcomje.tn/"><img src="/brand/SJE_Picture.png" id="sje_picture" class="rounded-circle" alt=""></a>
                    </div>
                    <div class="col-md-4 col-6 mt-3">
                        <div> <u><b> Number of Members : </u></b> <div class = "offset-3 offset-lg-2" style="font-size:50px">{{count($users)}}</div></div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div data-aos = "fade-up" data-aos-duration = "1000" data-aos-delay = "100" data-aos-easing = "easeOutCubic" class="row mt-3" id="container">
                        <div> <b> <u> Bureau Members :</u> </b></div>
                        @foreach($users as $user)
                            @if ($user->bureau == 'on')
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="/profile/{{$user->id}}" style="text-decoration:none; color:white"> -{{$user->firstname}}<span class="text-uppercase"> {{$user->lastname}}</span></a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <hr>
                <!-- Homepage -->
                <div class="container">
                    <div class="row mt-3" id="container">
                        <div data-aos = "fade-right" data-aos-duration = "1000" data-aos-delay = "100" data-aos-easing = "easeOutCubic" class="row mt-3" id="container">
                        <h3> <b> Pôle Projet </b> | {{$projet}} members :</h3>
                        @foreach($users as $user)
                            @if ($user->pole == 'Projet')
                                <div  class="col-3 col-sm-3 col-md-2 col-lg-1 mr-lg-5">
                                    <a href="/profile/{{$user->id}}"><img id="users" src="{{$user->profile->profileImage()}}"></a>
                                    <div class="pt-2" id="name">{{$user->firstname}} <span class="text-uppercase">{{$user->lastname}}</span></div>
                                    <div id="pole"> <b>{{$user->class}}</b> </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <hr>
                    <div data-aos = "fade-right" data-aos-duration = "1000" data-aos-delay = "100" data-aos-easing = "easeOutCubic" class="row mt-3" id="container">
                        <h3> <b> Pôle Developpement Commercial et Partenariat </b> | {{$devco}} members :</h3>
                        @foreach($users as $user)
                            @if ($user->pole == 'DevCo')
                                <div class="col-3 col-sm-3 col-md-2 col-lg-1 mr-lg-5">
                                    <a href="/profile/{{$user->id}}"><img id="users" src="{{$user->profile->profileImage()}}"></a>
                                    <div class="pt-2" id="name">{{$user->firstname}} <span class="text-uppercase">{{$user->lastname}}</span></div>
                                    <div id="pole"> <b>{{$user->class}}</b> </div>
                                </div>
                            @endif  
                        @endforeach
                    </div>
                    <hr>
                    <div data-aos = "fade-right" data-aos-duration = "1000" data-aos-delay = "100" data-aos-easing = "easeOutCubic" class="row mt-3" id="container">
                        <h3> <b> Pôle Marketing </b> | {{$marketing}} members :</h3>
                        @foreach($users as $user)
                            @if ($user->pole == 'Marketing')
                                <div class="col-3 col-sm-3 col-md-2 col-lg-1 mr-lg-5">
                                    <a href="/profile/{{$user->id}}"><img id="users" src="{{$user->profile->profileImage()}}"></a>
                                    <div class="pt-2" id="name">{{$user->firstname}} <span class="text-uppercase">{{$user->lastname}}</span></div>
                                    <div id="pole"> <b>{{$user->class}}</b> </div>
                                </div>
                            @endif  
                        @endforeach
                    </div>
                    <hr>
                    <div data-aos = "fade-right" data-aos-duration = "1000" data-aos-delay = "100" data-aos-easing = "easeOutCubic" class="row mt-3" id="container">
                        <h3> <b> Pôle Ressources Humaines et Formation </b> | {{$rh}} members :</h3>
                        @foreach($users as $user)
                            @if ($user->pole == 'RH')
                                <div class="col-3 col-sm-3 col-md-2 col-lg-1 mr-lg-5">
                                    <a href="/profile/{{$user->id}}"><img id="users" src="{{$user->profile->profileImage()}}"></a>
                                    <div class="pt-2" id="name">{{$user->firstname}} <span class="text-uppercase">{{$user->lastname}}</span></div>
                                    <div id="pole"> <b>{{$user->class}}</b> </div>
                                </div>
                            @endif  
                        @endforeach
                    </div>
                    <hr>
                </div>
                <!-- Footer -->
                <footer class="text-center text-lg-start bg-dark text-muted">
                    <!-- Section: Links  -->
                    <section>
                        <div id="footer" class="text-center text-md-start mt-5">
                            <div class="row mt-3">
                                <!-- Image -->
                                <div class="col-lg-3 col-md-4 col-7 mb-4" style="margin-left:-50px">
                                    <a href="https://supcomje.tn/"><img src="/brand/footer.png" id="sje_picture" class="rounded-circle" alt=""></a>
                                </div>
                                <!-- Social Media -->
                                <div class="col-lg-3 col-md-3 col-5 mx-auto mb-4">
                                    <h6 class="text-uppercase fw-bold mb-4">Social Media</h6>
                                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/SupComJuniorEntrepriseSJE/?epa=SEARCH_BOX" role="button"><i class="fab fa-facebook-f"></i></a><span> - Facebook <br></span>
                                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/junior_supcom/" role="button"><i class="fab fa-instagram"></i></a><span> - Instagram <br></span>
                                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/company/supcomjuniorentreprise/" role="button"><i class="fab fa-linkedin-in"></i></a><span> - LinkedIn <br></span>
                                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UCnOSQceLAfFp1iVtSY6HULw" role="button"><i class="fab fa-youtube"></i></a><span> - Youtube </span>
                                </div>
                                <!-- Contact -->
                                <div id="contact" class="col-lg-4 col-md-5 col-12  mx-auto mb-4">
                                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                                    <p class="text-reset">Phone: +216 20 094 552</p>
                                    <p class="text-reset">Email: junior.entreprise@supcom.tn</p>
                                    <p class="text-reset">Address: Ecole Supérieure des Communications de Tunis Cité Technologique des Communication- Route de Raoued Km 3.5 2083 El Ghazala - Ariana</p>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <!-- Copyright -->
                    <div id = "copyright" class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                        © 2021 Copyright:
                        <a class="text-reset fw-bold" href="https://supcomje.tn/">SJE</a>
                    </div>
                </footer>    
            </div>
        </main>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
