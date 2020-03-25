<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$platform_name}}</title>

    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/master-responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/master-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/font-family.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" type="image/jpg" href="img/Favicon.jpg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="{{asset('master-admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"
            integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        Vue.component('date-picker', {
            template: '<input type="text" :id="id" :name="id" :placeholder="placeholder" autocomplete="false"/>',
            props: ['id', 'placeholder'],
            mounted: function () {
                var vm = this;
                $(this.$el)
                    .datepicker({
                        format: '{{ setting('date_format') }}',
                        todayHighlight: true,
                        autoclose: true,
                        closeOnDateSelect: true,
                        startDate: "today"
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

</head>
<body>

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

        <div class="collapse navbar-collapse desktop-navbar">
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{route('user.home')}}">Go to {{ config('app.name') }}</a></li>
                <li><a href="{{ url('faq') }}">{{__('FAQ')}}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En <img
                            src="{{asset('master-admin/img/arrow-down.svg')}}"
                            class="svg"></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">French</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top second-navbar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="#"></a><span class="mas-head"> Master Dashboard</span>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right mobile-navbar" style="display:none;">

                <li><a href="{{route('user.home')}}">Go to {{ config('app.name') }}</a></li>
                <li><a href="faq.php">{{__('FAQ')}}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En <img
                            src="{{asset('master-admin/img/arrow-down.svg')}}"
                            class="svg"></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">French</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<style>
    .mas-head {
        color: #F2F2F2;
    }
</style>
<section class="banner-section">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="banner-text">
                <h1>Welcome,</h1>
                <form class="signin-form" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email*</label>
                                <input type="email" class="form-control" id="email" value="{{old('email')}}"
                                       name="email"
                                       placeholder=" Enter Email Address">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Enter Password*</label>
                                <input type="password" class="form-control" id="password"
                                       placeholder="Enter Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('password') }}</strong>
    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="{{__('Sign In')}}" class="btn btn-signin">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
