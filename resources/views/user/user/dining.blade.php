@extends('layouts.app')

@section('content')

    <section class="confirm-address">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-xs-12">
                    <div class="delivery-method">
                        <h2>
                            Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h2>
                        @include('includes.user-header',['active'=>'details'])
                        <hr class="breadcrumb-hr mydetail-bread">
                        @include('includes.user-details-header',['active'=>'dining'])
                        <div class="row reservations-section">
                            <div class="col-md-10">
                                <form class="delivery-form" method="post" action="{{route('user.dining.post')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Primary Dining Location*</label>
                                                <input type="text" class="form-control" id="location"
                                                       name="dining_location"
                                                       value="{{$user->dining_location}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requests">Special Requests</label>
                                                <textarea class="form-control" id="requests" rows="7" name="requests"
                                                          maxlength="255"
                                                          placeholder="Enter your Special Requests here">{{$user->requests}}</textarea>
                                                <script type="text/javascript">
                                                    let remainingCount = 255;
                                                    document.getElementById('requests').addEventListener('keyup', function (event) {
                                                        remainingCount = 255 - event.target.value.length;
                                                        document.getElementById('character-count').innerHTML = remainingCount;
                                                    });
                                                </script>
                                                <span class="help-block small">Max <span
                                                        id="character-count">255</span> characters</span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="submit" value="Save Changes" class="btn btn-save-changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
