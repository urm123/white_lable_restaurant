@extends('layouts.master-admin')

@section('content')
    <div class="row">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading single-project-nav">
                @include('includes.master-admin-page-header',['active'=>'privacy-page'])
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active table-responsive">
                        <div class="restaurant-profile-form">
                            <div class="col-md-9 col-xs-12">
                                <form action="{{ url('master-admin/page-settings/store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="privacypage" name="section">
                                    <div id="menu1" class="tab-pane active">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    @if(count(config('setting_fields.privacypage', [])) )
                                                        @foreach(config('setting_fields.privacypage', []) as $section => $fields)
                                                            @foreach($fields['elements'] as $field)
                                                                @includeIf('fields.' . $field['type'] )
                                                            @endforeach
                                                            <hr>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="submit" class="btn btn-approve" value="Save Changes">
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
@endsection
