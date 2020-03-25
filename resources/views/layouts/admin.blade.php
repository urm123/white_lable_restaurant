<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$platform_name}}</title>

    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/css/style.css?ver='.\Carbon\Carbon::now()->format('YmdHis'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-family.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/css/responsive.css?ver='.\Carbon\Carbon::now()->format('YmdHis'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/responsive-s.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">


    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/lodash.js')}}"></script>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>

    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"
            integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- summernote Editor -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.m-editor').summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['hr']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2({
                width: '100%'
            });
        });
    </script>

    <script type="text/javascript">
        Vue.component('date-picker', {
            template: '<input type="text" :id="id" :name="id" :placeholder="placeholder" autocomplete="false" :value="value" @input="$emit(\'input\',$event.target.value)"/>',
            props: ['id', 'placeholder', 'value'],
            mounted: function () {
                var vm = this;
                $(this.$el)
                    .datepicker({
                        format: '{{ setting('date_format') }}',
                        todayHighlight: true,
                        autoclose: true,
                        closeOnDateSelect: true,
                        // startDate: "today"
                    })
                    .trigger('change')
                    .on('changeDate', function () {
                        vm.$emit('input', this.value)
                    });
            },
            watch: {
                value: function (value) {
                    $(this.$el)
                        .val(value)
                        .trigger('change');
                },
            },
            destroyed: function () {

            }
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
        function tableColumnWidths() {
            var container_width = jQuery('.requests-table tbody').innerWidth();

            jQuery('.requests-table tr').each(function () {
                var column_length = jQuery(this).find('td').length;
                var width = container_width / column_length;
                jQuery(this).find('td').css('width', width + 'px');
                var column_length = jQuery(this).find('th').length;
                var width = container_width / column_length;
                jQuery(this).find('th').css('width', width + 'px');
            });

            var height = window.innerHeight
                - 52
                - jQuery('.first-navbar').outerHeight()
                - jQuery('.second-navbar').outerHeight()
                - jQuery('.filter-greybox').height()
                - jQuery('.requests-table thead').height();

            jQuery('.requests-table tbody').height(height);
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<body>
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
<div class="navbar navbar-inverse navbar-fixed-top first-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>-->
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{route('user.home')}}">Go to {{ $restaurant_info->name }}</a></li>
                @auth
                    <li><a href="#" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                @endauth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En <img
                            src="{{asset('admin/img/arrow-down.svg')}}"
                            class="svg"></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('user.locale',['fr'])}}">French</a></li>
                        <li><a href="{{route('user.locale',['en'])}}">English</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
<div class="navbar navbar-inverse second-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="{{route('admin.delivery.index')}}">
                    {{ $restaurant_info->name }}
                </a>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

    </div>
</div>
<div>
    @yield('content')
</div>
<footer></footer>


@guest
    <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" role="dialog">
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
                        <input type="hidden" name="role" value="admin">
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
                                <div class="form-group" :class="{'has-error':signup.name}">
                                    <label>Restaurant Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Restaurant Name">
                                    <span v-if="signup.name" class="help-block" role="alert">
                                        <strong>@{{ signup.name[0] }}</strong>
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
                                <div class="form-group" :class="{'has-error':signup.phone}">
                                    <label>Enter Phone Number*</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           placeholder="Enter Phone Number">
                                    <span v-if="signup.phone" class="help-block" role="alert">
                                        <strong>@{{ signup.phone[0] }}</strong>
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
                                <div class="form-group" :class="{'has-error':signup.country}">
                                    <label>Restaurant Country*</label>
                                    <input class="form-control" id="country" placeholder="Enter Country" name="country">
                                    <span v-if="signup.country" class="help-block" role="alert">
                                        <strong>@{{ signup.country[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.city}">
                                    <label>Restaurant City*</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City"
                                           name="city">
                                    <span v-if="signup.city" class="help-block" role="alert">
                                        <strong>@{{ signup.city[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.province}">
                                    <label>Restaurant State/Province*</label>
                                    <input class="form-control" id="province" placeholder="Enter State/Province"
                                           name="province">
                                    <span v-if="signup.province" class="help-block" role="alert">
                                        <strong>@{{ signup.province[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.postcode}">
                                    <label>Restaurant Zip/Postal Code*</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode"
                                           placeholder="Enter Zip/Postal Code">
                                    <span v-if="signup.postcode" class="help-block" role="alert">
                                        <strong>@{{ signup.postcode[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.cuisines}">
                                    <label>{{__('Cuisines')}}*</label>
                                    <select name="cuisines[]" class="selectpicker form-control" id="cuisines">
                                        <option value="">Select a cuisine</option>
                                        @foreach($cuisines as $cuisine)
                                            <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                        @endforeach
                                    </select>
                                    <span v-if="signup.cuisines" class="help-block" role="alert">
                                        <strong>@{{ signup.cuisines[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.delivery}">
                                    <label>{{__("Delivery")}}</label>
                                    <select name="delivery" id="delivery" class="form-control">
                                        <option value="true" selected="selected">Available</option>
                                        <option value="false">Not Available</option>
                                    </select>
                                    <span v-if="signup.delivery" class="help-block" role="alert">
                                        <strong>@{{ signup.delivery[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.takeaway}">
                                    <label>{{__("Takeaway")}}</label>
                                    <select name="takeaway" id="takeaway" class="form-control">
                                        <option value="true" selected="selected">Available</option>
                                        <option value="false">Not Available</option>
                                    </select>
                                    <span v-if="signup.takeaway" class="help-block" role="alert">
                                        <strong>@{{ signup.takeaway[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" :class="{'has-error':signup.reserve}">
                                    <label>Reservation</label>
                                    <select name="reserve" id="reserve" class="form-control">
                                        <option value="true" selected="selected">Available</option>
                                        <option value="false">Not Available</option>
                                    </select>
                                    <span v-if="signup.reserve" class="help-block" role="alert">
                                        <strong>@{{ signup.reserve[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group" :class="{'has-error':signup.subscription}">
                                <div class="col-md-12">
                                    <label>Select Subscription Option*</label>
                                </div>
                                @foreach($subscriptions as $subscription)
                                    <div class="col-md-4 sub-radio">
                                        <div class="sub-radio-text">
                                            {{$subscription->name}}
                                        </div>
                                        <br>
                                        <span class="sub-bold">

                                            <ul>
                                                @foreach($subscription->points as $point)
                                                    <li>
                                                        {{$point->point}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </span>
                                        <br>
                                        <input type="radio" name="subscription" value="fixed" checked="checked">
                                    </div>
                                @endforeach
                                <span v-if="signup.subscription" class="help-block" role="alert">
                                        <strong>@{{ signup.subscription[0] }}</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Create Account" class="btn btn-signin">
                            </div>
                        </div>
                        <hr class="yellow-hr">
                        {{--                        <h4>Sign Up with</h4>--}}

                        {{--                        <div class="row social-signup">--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <img src="{{asset('img/facebook-f.png')}}">--}}
                        {{--                                <label>Facebook</label>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <img src="{{asset('img/google.png')}}">--}}
                        {{--                                <label>Google</label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
                                    <label class="forgot-password"><a href="" data-toggle="modal"
                                                                      data-target="#forgotPasswordModal">Forgot
                                            Password!</a></label>
                                    <input type="password" class="form-control" id="signin-password"
                                           placeholder="Enter Password">
                                    <span v-if="signin.password" class="help-block" role="alert">
                                        <strong>@{{ signin.password[0] }}</strong>
                                 </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="{{__('Sign In')}}" class="btn btn-signin">
                            </div>
                        </div>
                        <hr class="yellow-hr">
                        {{--                        <h4>Sign in with</h4>--}}

                        {{--                        <div class="row social-signup">--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <a href=""> <img src="{{asset('img/facebook-f.png')}}">--}}
                        {{--                                    <label>Facebook</label></a>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <a href=""> <img src="{{asset('img/google.png')}}">--}}
                        {{--                                    <label>Google</label></a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="no-account">--}}
                        {{--                            <h4>Don’t have an account? <a href="#" data-toggle="modal" data-target="#signupModal"> Join--}}
                        {{--                                    Us</a></h4>--}}
                        {{--                        </div>--}}
                    </form>
                </div>
            </div>

        </div>
    </div>

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
                        {{--                        <h4>Sign in with</h4>--}}

                        {{--                        <div class="row social-signup">--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <a href=""> <img src="{{asset('img/facebook-f.png')}}">--}}
                        {{--                                    <label>Facebook</label></a>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 col-xs-6 text-center">--}}
                        {{--                                <a href=""> <img src="{{asset('img/google.png')}}">--}}
                        {{--                                    <label>Google</label></a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </form>
                </div>
            </div>

        </div>
    </div>

@endguest


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

<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }
</script>

@guest
    <script type="text/javascript">
        var data = {
            signup: {
                first_name: false,
                last_name: false,
                name: false,
                phone: false,
                email: false,
                password: false,
                country: false,
                city: false,
                postcode: false,
                province: false,
                subscription: false,
                cuisines: false,

            },
            signin: {
                email: false,
                password: false
            },
            reset_password: {
                email: false,
            }
        };

        var signup = new Vue({
            data: data,
            el: '#signupModal',
            methods: {
                signUp: function (event) {
                    var action = event.target.action;

                    var target = event.target;

                    var $this = this;

                    this.signup = {
                        first_name: false,
                        last_name: false,
                        name: false,
                        phone: false,
                        email: false,
                        password: false,
                        country: false,
                        city: false,
                        postcode: false,
                        province: false,
                        subscription: false,
                        cuisines: false,
                    };

                    axios.post(action, {
                        _token: '{{csrf_token()}}',
                        first_name: target.querySelector('#first_name').value,
                        last_name: target.querySelector('#first_name').value,
                        email: target.querySelector('#signup-email').value,
                        password: target.querySelector('#signup-password').value,
                        password_confirmation: target.querySelector('#cpassword').value,
                        country: target.querySelector('#country').value,
                        city: target.querySelector('#city').value,
                        postcode: target.querySelector('#postcode').value,
                        province: target.querySelector('#province').value,
                        subscription: target.querySelector('input[name="subscription"]:checked').value,
                        name: target.querySelector('#name').value,
                        phone: target.querySelector('#phone').value,
                        cuisines: target.querySelector('#cuisines').value,
                        delivery: target.querySelector('#delivery').value,
                        takeaway: target.querySelector('#takeaway').value,
                        reserve: target.querySelector('#reserve').value,
                        role: 'admin',
                    })
                        .then(function (response) {
                            target.action = '{{route('register')}}';
                            target.submit();
                        })
                        .catch(function (error) {
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
                                if (typeof errors.country != 'undefined') {
                                    $this.signup.country = errors.country;
                                }
                                if (typeof errors.city != 'undefined') {
                                    $this.signup.city = errors.city;
                                }
                                if (typeof errors.province != 'undefined') {
                                    $this.signup.province = errors.province;
                                }
                                if (typeof errors.postcode != 'undefined') {
                                    $this.signup.postcode = errors.postcode;
                                }
                                if (typeof errors.subscription != 'undefined') {
                                    $this.signup.subscription = errors.subscription;
                                }
                                if (typeof errors.cuisines != 'undefined') {
                                    $this.signup.cuisines = errors.cuisines;
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
                            window.location.reload();
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
    window.addEventListener('load', function () {
        jQuery('.date').datepicker({
            format: '{{ setting('date_format') }}',
            todayHighlight: true,
            autoclose: true,
            closeOnDateSelect: true,
            startDate: "today"
        });
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
        axios.get('{{route('admin.restaurant.online')}}', {}).then(function (response) {
            if (response.data.restaurant) {
                document.getElementById('online_check').checked = response.data.restaurant.online;
            }
        }).catch();
    });

    document.getElementById('online_check').onchange = function (event) {
        var element = event.target;

        var checked = false;

        if (element.checked) {
            checked = true;
        }

        axios.post('{{route('admin.restaurant.online')}}', {
            online: checked,
            _token: '{{csrf_token()}}'
        }).then(function (response) {
            if (response.data.message == 'success') {
                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
            }
        }).catch(function (error) {

        });
    };
</script>


<script type="text/javascript">


    window.addEventListener('load', function () {
        tableColumnWidths();

        document.querySelector('.loader').classList.remove('show');
    });
</script>
@auth
    @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
        <script type="text/javascript">
            Pusher.logToConsole = true;

            var pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                forceTLS: true
            });

            var channel = pusher.subscribe('{{ str_slug(config('app.name')) }}_{{\Illuminate\Support\Facades\Auth::user()->restaurant()->withTrashed()->first()->id}}');
            channel.bind('create delivery', function (delivery) {
                jQuery('#new-delivery-id').text(delivery.id);
                jQuery('#view-delivery-button').attr('href', '{{route('admin.delivery.index')}}?id=' + delivery.id);
                jQuery('#new-delivery').modal('show');
                var audio = new Audio('{{asset('admin/audio/alert.mp3')}}');
                audio.play();
            });

            channel.bind('create takeaway', function (takeaway) {
                jQuery('#new-takeaway-id').text(takeaway.id);
                jQuery('#view-takeaway-button').attr('href', '{{route('admin.takeaway.index')}}?id=' + takeaway.id);
                jQuery('#new-takeaway').modal('show');
                var audio = new Audio('{{asset('admin/audio/alert.mp3')}}');
                audio.play();
            });

            channel.bind('create reservation', function (reservation) {
                jQuery('#new-reservation-id').text(reservation.id);
                jQuery('#view-reservation-button').attr('href', '{{route('admin.reservation.index')}}?id=' + reservation.id);
                jQuery('#new-reservation').modal('show');
                var audio = new Audio('{{asset('admin/audio/alert.mp3')}}');
                audio.play();
            });


        </script>
    @endif
@endauth
<div class="modal fade" id="new-delivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="new-order-alert">

                    <!-- Modal content -->
                    <div class="modal-content-new-order">
                        <h3>New Order Alert!</h3>
                        <p>Order ID: <span id="new-delivery-id"></span></p>
                        <a class="view-order-btn" id="view-delivery-button" href="#">
                            View Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="new-takeaway" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="new-order-alert">

                    <!-- Modal content -->
                    <div class="modal-content-new-order">
                        <h3>New Order Alert!</h3>
                        <p>Order ID: <span id="new-takeaway-id"></span></p>
                        <a class="view-order-btn" id="view-takeaway-button" href="#">
                            View Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="new-reservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="new-order-alert">

                    <!-- Modal content -->
                    <div class="modal-content-new-order">
                        <h3>New Booking Alert!</h3>
                        <p>Booking ID: <span id="new-reservation-id"></span></p>
                        <a class="view-order-btn" id="view-reservation-button" href="#">
                            View Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
