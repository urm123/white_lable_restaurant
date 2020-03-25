@extends('layouts.master-admin')

@section('content')
    <div id="restaurant">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        @include('includes.master-admin-platform-header' , ['active'=>'payment-method'])
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="restaurant-profile-section">
                                    <h2 style="margin-bottom: 30px;">Update Payment Method</h2>
                                    <div class="restaurant-profile-form">
                                        <div class="row">
                                            <div class="col-md-9 col-xs-12">
                                                <form action="{{route('master-admin.payment-method.update',$payment_method)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 @if($errors->has('name')) has-error @endif">
                                                            <label>Name*</label>
                                                            <input type="text"
                                                                   class="form-control" name="name"
                                                                   value="{{$payment_method->name}}"
                                                                   placeholder="Enter Payment Method Name">
                                                            @if($errors->has('name'))
                                                                <span class="help-block">
                                                                {{$errors->first('name')}}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="submit"
                                                                   class="btn btn-approve"
                                                                   value="Approve & Save Changes">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection