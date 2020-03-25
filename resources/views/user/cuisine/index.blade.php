@extends('layouts.app')

@section('content')

    <section class="cuisines-main">
        <div class="container">
            <div class="row">
                @foreach($cuisines as $cuisine)
                    <div class="col-md-15">
                        <a href="{{route('cuisine.show',$cuisine)}}">
                            <div id="overlay">
                                @if($cuisine->logo)
                                    <img src="{{$cuisine->logo}}">
                                @else
                                    <img src="{{asset('img/default.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="bottom-left">{{$cuisine->name}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.addEventListener('load', function () {
            jQuery('.col-md-15 img').height(jQuery('.col-md-15 img').width());
        });
    </script>

@endsection
