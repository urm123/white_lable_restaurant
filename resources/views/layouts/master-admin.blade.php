<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$platform_name}}</title>

    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('master-admin/css/master-responsive.css')}}?ver={{\Carbon\Carbon::now()->format('YmdHis')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('master-admin/css/master-style.css')}}?ver={{\Carbon\Carbon::now()->format('YmdHis')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('master-admin/css/font-family.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="{{asset('master-admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
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
            $(".select2").select2();
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
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
                            src="{{asset('master-admin/img/arrow-down.svg')}}"
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
<div class="navbar navbar-inverse navbar-fixed-top second-navbar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="navbar-header"><a class="navbar-brand" href="{{route('master-admin.restaurant.request')}}"></a><span class="mas-head"> Master Dashboard</span>
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
<section class="master-dashboard-section">
    <div class="container-fluid">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="col-md-2 admin-panel">
                    <h2>
                        @php
                            $hour = \Carbon\Carbon::now()->hour;
                        @endphp
                        @if($hour>=0&&$hour<12)
                            Good Morning
                        @endif
                        @if($hour>=12&&$hour<15)
                            Good Afternoon
                        @endif
                        @if($hour>=15&&$hour<24)
                            Good Evening
                        @endif, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</h2>
                    <div class="master-sidebar">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs category-tab">
                                <li @if(Route::currentRouteName()=='master-admin.restaurant.request') class="active" @endif>
                                    <a href="{{route('master-admin.restaurant.request')}}">Restaurants</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.order.index') class="active" @endif>
                                    <a href="{{route('master-admin.order.index')}}">Orders</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.review.index') class="active" @endif>
                                    <a href="{{route('master-admin.review.index')}}">{{__('Reviews')}}</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.report.sales') class="active" @endif>
                                    <a href="{{route('master-admin.report.sales')}}">Stats & Reports</a>
                                </li>
                                <li @if(Request::is('master-admin/theme-settings*')) class="active" @endif>
                                    <a href="{{route('master-admin.settings.general')}}">General Settings</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.cuisine.index') class="active" @endif>
                                    <a href="{{route('master-admin.cuisine.index')}}">Platform Settings</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.admin-user.index') class="active" @endif>
                                    <a href="{{route('master-admin.admin-user.index')}}">Master Settings</a>
                                </li>
                                <li @if(Request::is('master-admin/page-settings*')) class="active" @endif>
                                    <a href="{{route('master-admin.page.home')}}">Page Settings</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.attributes') class="active" @endif>
                                    <a href="{{route('master-admin.attributes')}}">Attributes Settings</a>
                                </li>
                                <li @if(Route::currentRouteName()=='master-admin.request.index') class="active" @endif>
                                    <a href="{{route('master-admin.request.index')}}">Notifications
                                        <div class="notification-count">{{$notification_count}}</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurants">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
        tableColumnWidths();
        var height = window.innerHeight
            - 52
            - jQuery('.first-navbar').outerHeight()
            - jQuery('.second-navbar').outerHeight()
            - jQuery('.single-project-nav').height()
            - jQuery('.requests-table thead').height();

        jQuery('.requests-table tbody').height(height);


        document.querySelector('.loader').classList.remove('show');
    });
</script>
</body>
</html>
