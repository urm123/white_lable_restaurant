@extends('layouts.app')

@section('content')

    <section class="container-fluid page-header no-gutters" style="@if(setting('faq_main_banner')) background: url({{ asset('storage/'.setting('faq_main_banner')) }}) @else background: url({{ asset('img/menu-header.png') }}) @endif">
        <div class="row">
            <div class="col-xs-12">
                <h1>F.A.Q.</h1>
            </div>
        </div>
    </section>
    <section class="main-section" style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        {!! setting('faq_list') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
