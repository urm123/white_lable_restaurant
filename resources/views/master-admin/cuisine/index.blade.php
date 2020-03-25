@extends('layouts.master-admin')

@section('content')

    <div class="row">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading single-project-nav">
                @include('includes.master-admin-platform-header',['active'=>'cuisine'])
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="cuisines">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-code-form">
                                    <div>
                                        <h4>Cuisine Types</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <form action="{{route('master-admin.cuisine.store')}}"
                                                          method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div
                                                            class="col-md-4 col-sm-4 form-group @if($errors->has('name')) has-error @endif">
                                                            <input type="text" class="form-control" name="name"
                                                                   placeholder="Enter Cuisine">
                                                            @if($errors->has('name'))
                                                                <span class="help-block">
                                                                    {{$errors->first('name')}}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-2 form-group" id="image-preview-wrapper"
                                                             style="display: none;">
                                                            <img src="" alt="" class="img-responsive" id="image-preview"
                                                                 style="display: none;">
                                                        </div>
                                                        <div
                                                            class="col-md-4 col-sm-4 form-group @if($errors->has('image')) has-error @endif">
                                                            <input type="file" class="form-control" name="image"
                                                                   id="image-file"
                                                                   placeholder="Enter Cuisine Image">
                                                            <p class="help-block">Max filesize: 1MB</p>
                                                            @if($errors->has('image'))
                                                                <span class="help-block">
                                                                    {{$errors->first('image')}}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-2 col-sm-2">
                                                            <input type="submit" class="btn btn-add-post"
                                                                   value="Add Cuisine +  ">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row cuisine-lists-row">
                            @foreach($cuisines as $cuisine)
                                <div class="col-md-2 col-sm-3 cuisine-block">
                                    <img src="{{ asset('storage/'.$cuisine->logo) }}" alt="" class="img-responsive"
                                         style="object-fit: cover;width: 100%;">
                                    <div class="cuisine-lists">
                                        <a href="#" onclick="deleteCuisine('{{$cuisine->id}}')">
                                            <div class="rect"></div>
                                        </a>
                                        <p><a href="#"
                                              onclick="updateCuisine({{$cuisine->id}})">{{$cuisine->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-cuisine-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Cuisine</h4>
                </div>
                <form id="update-cuisine-form" action="{{route('cuisine.index')}}" enctype="multipart/form-data"
                      method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Cuisine Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Cuisine">
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <img src="" alt="" class="img-responsive" id="preview" style="display: none;">
                            <input type="file" class="form-control" name="image" id="image"
                                   placeholder="Enter Cuisine Image">
                            <p class="help-block">Max filesize: 1MB</p>
                            <p class="help-block">Enter Cuisine Image</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        let cuisines = {!! json_encode($cuisines) !!};

        function deleteCuisine(cuisine_id) {
            var confirm = window.confirm('Are you sure you want to delete this cuisine?');

            if (confirm) {
                axios.delete('{{route('master-admin.cuisine.index')}}/' + cuisine_id)
                    .then(function (response) {
                        if (response.data.message == 'success') {
                            $.alert({title: 'Success!', content: 'Deleted Successfully!', theme: 'success'});
                            window.location.reload();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }

        function updateCuisine(cuisine_id) {
            let selected_cuisine = cuisines.filter(function (cuisine) {
                return cuisine.id == cuisine_id
            });
            cuisine = selected_cuisine[0];
            document.getElementById('name').value = cuisine.name;
            document.getElementById('update-cuisine-form').action = '{{route('master-admin.cuisine.index')}}/' + cuisine.id;
            jQuery('#edit-cuisine-modal').modal('show');
        }

        window.addEventListener('load', function () {
            jQuery('.cuisine-block img').each(function (cuisine) {
                jQuery(this).height(jQuery(this).width());
            });
        });

        document.querySelector('#image-file').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#image-preview').setAttribute('src', e.target.result);
                    document.querySelector('#image-preview').style.display = 'block';
                    document.querySelector('#image-preview-wrapper').style.display = 'block';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        document.querySelector('#image').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#preview').setAttribute('src', e.target.result);
                    document.querySelector('#preview').style.display = 'block';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>

@endsection
