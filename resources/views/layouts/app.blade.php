<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(Route::currentRouteName()=='user.home')
        <title>{{ setting('home_meta_title') }}</title>
        <meta name="description" content="{{ setting('home_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.restaurant.menu')
        <title>{{ setting('menu_meta_title') }}</title>
        <meta name="description" content="{{ setting('menu_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.restaurant.reviews')
        <title>{{ setting('review_meta_title') }}</title>
        <meta name="description" content="{{ setting('review_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.about')
        <title>{{ setting('about_meta_title') }}</title>
        <meta name="description" content="{{ setting('about_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.contact')
        <title>{{ setting('contact_meta_title') }}</title>
        <meta name="description" content="{{ setting('contact_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.faq')
        <title>{{ setting('faq_meta_title') }}</title>
        <meta name="description" content="{{ setting('faq_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.terms')
        <title>{{ setting('terms_meta_title') }}</title>
        <meta name="description" content="{{ setting('terms_meta_description') }}">
    @elseif(Route::currentRouteName()=='user.privacy')
        <title>{{ setting('privacy_meta_title') }}</title>
        <meta name="description" content="{{ setting('privacy_meta_description') }}">
    @else
        <title>{{$platform_name}}</title>
@endif


    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="google" content="notranslate">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('css/style.css?ver='.\Carbon\Carbon::now()->format('YmdHis'))}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('css/stylesheet.css?ver='.\Carbon\Carbon::now()->format('YmdHis'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive-s.css?rere')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-family.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/nouislider.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-clockpicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}"/>
    @if(setting('site_theme') == 'orange-peel')
        <link rel="stylesheet" type="text/css" href="{{asset('css/themes/orange_peel.css')}}"/>
    @endif
    @if(setting('site_theme') == 'whiskey')
        <link rel="stylesheet" type="text/css" href="{{asset('css/themes/whiskey.css')}}"/>
    @endif
    @if(setting('site_theme') == 'thunderbird')
        <link rel="stylesheet" type="text/css" href="{{asset('css/themes/thunderbird.css')}}"/>
    @endif
    @if(setting('site_theme') == 'amber')
        <link rel="stylesheet" type="text/css" href="{{asset('css/themes/amber.css')}}"/>
    @endif
    @if(setting('site_theme') == 'apple')
        <link rel="stylesheet" type="text/css" href="{{asset('css/themes/apple.css')}}"/>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script defer src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script defer src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/lodash.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>

    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/'.setting('favicon')) }}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

{{--    <script src="https://js.stripe.com/v3/"></script>--}}

<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">
        window.addEventListener('load', function () {
            jQuery('.timepicker input').timepicker({
                minuteStep: 1
            });
        });
    </script>

    <script type="text/javascript">
        Vue.component('star-rating', {
            template: '<span><i v-for="i in parseInt(rating)" class="fa fa-star active" aria-hidden="true"></i>' +
                '<i v-for="i in 5-parseInt(rating)" class="fa fa-star" aria-hidden="true"></i></span>',
            props: ['rating'],
            mounted: function () {

            },
            watch: {},
            destroyed: function () {

            }
        });
    </script>

    <script type="text/javascript">
        Vue.component('date-picker', {
            template: '<input type="text" :id="id" :name="id" :placeholder="placeholder" autocomplete="false" readonly="true" :value="value" @input="$emit(\'input\',$event.target.value)"/>',
            props: ['id', 'placeholder', 'value'],
            mounted: function () {
                var vm = this;
                jQuery(this.$el)
                    .datepicker({
                        format: '{{ setting('date_format') }}'+' DD',
                        todayHighlight: true,
                        autoclose: true,
                        closeOnDateSelect: true,
                        startDate: "today"
                    })
                    .trigger('change')
                    .on('changeDate', function () {
                        vm.$emit('input', this.value);
                    });
            },
            watch: {
                value: function (value) {
                    jQuery(this.$el)
                        .val(value)
                        .trigger('change');
                },
            },
            destroyed: function () {

            }
        });

        Vue.component('time-picker', {
            template: '<input type="text" :id="id" :name="id" :placeholder="placeholder" autocomplete="false" :value="value" @input="$emit(\'input\',$event.target.value)" readonly="true"/>',
            props: ['id', 'placeholder', 'value'],
            mounted: function () {
                var vm = this;

                jQuery(this.$el).timepicker({
                    minuteStep: 1
                }).trigger('change')
                    .on('changeTime.timepicker', function () {
                        vm.$emit('input', this.value);
                        vm.$emit('validate');
                    });
            },
            watch: {
                value: function (value) {
                    jQuery(this.$el)
                        .val(value)
                        .trigger('change');
                },
            },
            destroyed: function () {

            }
        });
    </script>
</head>
<body>

<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ setting('google_analytics_id') }}', 'auto');
    ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<div class="loader show">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>

@if($offlineMode == 'yes')
    <div id="hellobar-bar" class="regular closable">
        <div class="hb-content-wrapper">
            <div class="hb-text-wrapper">
                <div class="hb-headline-text">
                    <p><span>We're closed and will open again on {{ date('F j, Y, g:i a', strtotime($restaurant_info->online_to_time)) }}</span></p>
                </div>
            </div>
        </div>
        <div class="hb-close-wrapper">
            <a href="javascript:void(0);" class="icon-close" onClick="$('#hellobar-bar').fadeOut()">&#10006;</a>
        </div>
    </div>
@endif

<div class="navbar navbar-fixed-top second-navbar header" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="{{route('user.home')}}">
                    <img src="{{ asset('storage/'.$restaurant_info->logo) }}" alt="">
                </a>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">


            <ul class="nav navbar-nav navbar-right">

                <li @if(Route::currentRouteName()=='user.restaurant.menu') class="active" @endif><a href="{{route('user.restaurant.menu')}}">Menu</a></li>
                <li @if(Route::currentRouteName()=='user.restaurant.reviews') class="active" @endif><a href="{{route('user.restaurant.reviews')}}">Reviews</a></li>
                <li class="about-us @if(Route::currentRouteName()=='user.about') active @endif"><a href="{{route('user.about')}}">About</a></li>

                @guest
                    <li class="sign-up">
                        <button class="button-signup btn" data-toggle="modal"
                                data-target="#signupModal">{{__('Sign Up')}}</button>
                    </li>
                    <li class="sign-in">
                        <button data-toggle="modal" data-target="#signinModal"
                                class="button-signin btn">{{__('Sign In')}}</button>
                    </li>
                @else
                    @if(\Illuminate\Support\Facades\Auth::user()->email!= setting('guest_email_id'))
                        <li class="sign-up">
                            <button class="button-signup btn" type="button"
                                    onclick="window.location.href='{{route("user.reservations")}}'">{{__('Profile')}}</button>
                        </li>
                    @endif
                    <li class="sign-in">
                        <button type="button" class="button-signup btn" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout
                        </button>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    @yield('content')
</div>
<footer class="container-fluid no-gutters">
    <div class="row">
        <div class="col-xs-12">
            <div class="container-fluid limit-width">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <h3 class="col-xs-12">
                                            Explore
                                        </h3>
                                        <ul class="col-xs-12">
                                            <li><a href="{{route('user.about')}}">About Us</a></li>
                                            <li><a href="{{route('user.faq')}}">FAQ</a></li>
                                            <li><a href="{{route('user.restaurant.reviews')}}">Reviews</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h3 class="col-xs-12">
                                            Customer Service
                                        </h3>
                                        <ul class="col-xs-12">
                                            <li><a href="{{route('user.contact')}}">Contact Us</a></li>
                                            <li><a href="{{route('user.terms')}}">Terms of Service</a></li>
                                            <li><a href="{{route('user.privacy')}}">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-right col-sm-6">
                                <h3 class="col-xs-12">
                                    Join Us On
                                </h3>
                                <div class="col social-icons">
                                    <ul class="col-xs-12">
                                        <li>
                                            <a target="_blank" href="{{ setting('fb_page_url') }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{ setting('twitter_url') }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{ setting('instagram_url') }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@guest
    <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" role="dialog">
        @include('includes.progress_loader')
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h2>Welcome to {{ $restaurant_info->name }}</h2>
                    <form class="signin-form" action="{{route('auth.sign-up.validate')}}"
                          @submit.prevent="signUp($event)" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.first_name}">
                                    <label>First Name*</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                           placeholder="Enter First Name">
                                    <span v-if="signup.first_name" class="help-block" role="alert">
                                        <strong>@{{ signup.first_name[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.last_name}">
                                    <label>Last Name*</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           placeholder="Enter Last Name">
                                    <span v-if="signup.last_name" class="help-block" role="alert">
                                        <strong>@{{ signup.last_name[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.email}">
                                    <label>Enter Email*</label>
                                    <input type="email" class="form-control" id="signup-email" name="email"
                                           placeholder="Enter Email Address">
                                    <span v-if="signup.email" class="help-block" role="alert">
                                        <strong>@{{ signup.email[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.postcode}">
                                    <label>Enter Postcode*</label>
                                    <input type="text" class="form-control" id="signup-postcode" name="postcode"
                                           placeholder="Enter Postcode">
                                    <span v-if="signup.postcode" class="help-block" role="alert">
                                        <strong>@{{ signup.postcode[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.password}">
                                    <label>Enter Password*</label>
                                    <input type="password" class="form-control" id="signup-password" name="password"
                                           placeholder="Enter Password">
                                    <span v-if="signup.password" class="help-block" role="alert">
                                        <strong>@{{ signup.password[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.password_confirmation}">
                                    <label>Confirm Password*</label>
                                    <input type="password" class="form-control" id="cpassword"
                                           name="password_confirmation"
                                           placeholder="Re-enter Password">
                                    <span v-if="signup.password_confirmation" class="help-block" role="alert">
                                        <strong>@{{ signup.password_confirmation[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Create Account" class="btn btn-signin">
                            </div>
                        </div>
                        <hr class="yellow-hr">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign in Modal -->
    <div class="modal fade" id="signinModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h2>{{__('Sign In')}}</h2>
                    <form class="signin-form" action="{{route('login')}}" @submit.prevent="signIn($event)">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signin.email}">
                                    <label>Email*</label>
                                    <input type="email" class="form-control" id="signin-email"
                                           placeholder="Enter Email Address">
                                    <span v-if="signin.email" class="help-block" role="alert">
                                        <strong>@{{ signin.email[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signin.password}">
                                    <label>Enter Password*</label>
                                    <input type="password" class="form-control" id="signin-password"
                                           placeholder="Enter Password">
                                    <span v-if="signin.password" class="help-block" role="alert">
                                        <strong>@{{ signin.password[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit" value="{{__('Sign In')}}" class="btn btn-signin">
                                @if(setting('login_as_guest'))
                                    <br>
                                    <br>
                                    <span class="no-account">
                                        <a href="{{route('user.guest')}}" style="font-size: 16px;vertical-align: middle;">Login as a guest</a>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr class="yellow-hr">
                        <div class="no-account">
                            <h4>Don’t have an account?
                                <a href="#" id="join-us" data-toggle="modal" data-target="#signupModal"> Join Us</a></h4>
                            <label class="forgot-password">
                                <a href="" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password!</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('load', function (event) {
            document.getElementById('join-us').addEventListener('click', function () {
                jQuery('#signinModal').modal('hide');
            });
        });
    </script>

    <!-- Reset Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h2>Reset Password</h2>
                    <form class="signin-form" action="{{ route('password.email') }}"
                          @submit.prevent="resetPassword($event)">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':reset_password.email}">
                                    <label>Email*</label>
                                    <input type="email" class="form-control" id="reset-password-email"
                                           placeholder="Enter Email Address">
                                    <span v-if="reset_password.email" class="help-block" role="alert">
                                        <strong>@{{ reset_password.email[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Reset Password" class="btn btn-signin">
                            </div>
                        </div>
                        <hr class="yellow-hr">
                    </form>
                </div>
            </div>

        </div>
    </div>

@endguest

<script type="text/javascript">
    // window.addEventListener('load', function () {
    //     jQuery('.clockpicker').clockpicker({
    //         autoclose: true,
    //         'default': 'now'
    //     });
    // })
</script>

<script>
    function showDropDelivery() {
        var element = document.getElementById('dropdown-content-delivery');
        if (element.style.display == 'none') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>


<script>
    $(document).ready(function () {
        $('img[src$=".svg"]').each(function () {
            var $img = jQuery(this);
            var imgURL = $img.attr('src');
            var attributes = $img.prop("attributes");

            $.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Remove any invalid XML tags
                $svg = $svg.removeAttr('xmlns:a');

                // Loop through IMG attributes and apply on SVG
                $.each(attributes, function () {
                    $svg.attr(this.name, this.value);
                });

                // Replace IMG with SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    });
</script>
@guest
    <script type="text/javascript">
        var data = {
            signup: {
                first_name: false,
                last_name: false,
                email: false,
                password: false,
                postcode: false,
            },
            signin: {
                email: false,
                password: false
            },
            reset_password: {
                email: false,
            },
            loading: false
        };

        var signup = new Vue({
            data: data,
            el: '#signupModal',
            methods: {
                signUp: function (event) {
                    this.loading = true;
                    var action = event.target.action;

                    var target = event.target;

                    var $this = this;

                    this.signup = {
                        first_name: false,
                        last_name: false,
                        email: false,
                        password: false,
                        postcode: false,
                    };

                    axios.post(action, {
                        _token: '{{csrf_token()}}',
                        first_name: target.querySelector('#first_name').value,
                        last_name: target.querySelector('#last_name').value,
                        email: target.querySelector('#signup-email').value,
                        password: target.querySelector('#signup-password').value,
                        postcode: target.querySelector('#signup-postcode').value,
                        password_confirmation: target.querySelector('#cpassword').value,
                    })
                        .then(function (response) {
                            target.action = '{{route('register')}}';
                            target.submit();
                            $this.loading = false;
                        })
                        .catch(function (error) {
                            $this.loading = false;
                            if (error.response.status == 422) {
                                var errors = error.response.data.errors;
                                if (typeof errors.first_name != 'undefined') {
                                    $this.signup.first_name = errors.first_name;
                                }
                                if (typeof errors.last_name != 'undefined') {
                                    $this.signup.last_name = errors.last_name;
                                }
                                if (typeof errors.email != 'undefined') {
                                    $this.signup.email = errors.email;
                                }
                                if (typeof errors.password != 'undefined') {
                                    $this.signup.password = errors.password;
                                }
                                if (typeof errors.postcode != 'undefined') {
                                    $this.signup.postcode = errors.postcode;
                                }

                            }
                        });
                }
            }
        });

        var singin = new Vue({
            data: data,
            el: '#signinModal',
            methods: {
                signIn: function (event) {
                    var action = event.target.action;

                    var target = event.target;

                    var $this = this;

                    this.signin = {
                        email: false,
                        password: false
                    };

                    axios.post(action, {
                        _token: '{{csrf_token()}}',
                        email: target.querySelector('#signin-email').value,
                        password: target.querySelector('#signin-password').value,
                    })
                        .then(function (response) {
                            window.location.reload();
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                var errors = error.response.data.errors;
                                if (typeof errors.email != 'undefined') {
                                    $this.signin.email = errors.email;
                                }
                                if (typeof errors.password != 'undefined') {
                                    $this.signin.password = errors.password;
                                }
                            }
                        });
                }
            }
        });
        var reset_password = new Vue({
            data: data,
            el: '#forgotPasswordModal',
            methods: {
                resetPassword: function (event) {
                    var action = event.target.action;

                    var target = event.target;

                    var $this = this;

                    this.reset_password = {
                        email: false,
                    };

                    axios.post(action, {
                        _token: '{{csrf_token()}}',
                        email: target.querySelector('#reset-password-email').value,
                    })
                        .then(function (response) {
                            // window.location.reload();
                            $.alert({
                                title: 'Success!',
                                content: 'Please check email for password reset instructions',
                                theme: 'success'
                            });
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                var errors = error.response.data.errors;
                                if (typeof errors.email != 'undefined') {
                                    $this.reset_password.email = errors.email;
                                }
                            }
                        });
                }
            }
        });
    </script>
@endguest

<script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (location) {
                axios.post('{{route('user.location')}}', {
                    _token: '{{csrf_token()}}',
                    latitude: location.coords.latitude,
                    longitude: location.coords.longitude,
                }).then(function (response) {

                });
            });
        }
    }

    window.addEventListener('load', function () {
        getLocation();
    });
</script>

@if ($errors->any())
    <script type="text/javascript">
        window.addEventListener('load', function (ev) {
            $.alert({
                title: '{{__('Oh Sorry!')}}',
                content: '<ul>@foreach ($errors->all() as $error) <li>{{ __($error) }} </li>@endforeach</ul>',
                theme: 'error'
            });
        });
    </script>
@endif

@if (session('success')!=null)
    <script type="text/javascript">
        window.addEventListener('load', function (ev) {
            $.alert({
                title: 'Success!',
                content: ' {!! session('success')  !!}  ',
                theme: 'success'
            });
        });
    </script>
@endif


<script type="text/javascript">
    window.addEventListener('load', function () {
        jQuery('.date').datepicker({
            format: '{{ setting('date_format') }}',
            todayHighlight: true,
            autoclose: true,
            closeOnDateSelect: true,
            startDate: "today"
        });

        document.querySelector('.loader').classList.remove('show');
    });
</script>
</body>
</html>

