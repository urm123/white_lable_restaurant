@extends('layouts.master-admin')

@section('content')

    <div id="users">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    @include('includes.master-admin-platform-header',['active'=>'user'])
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="cuisines">
                            <div class="table-responsive">
                                <table class="requests-table">
                                    <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td>@{{ user.id }}</td>
                                        <td>@{{ user.first_name }}</td>
                                        <td>@{{ user.last_name }}</td>
                                        <td>@{{ user.email }}</td>
                                        <td>@{{ user.phone }}</td>
                                        <td>
                                            <div class="material-switch">
                                                <input :id="'switch_'+user.id" name="someSwitchOption001"
                                                       v-model="user.deleted" @change.prevent="updateUser(user,'table')"
                                                       type="checkbox"/>
                                                <label :for="'switch_'+user.id" class="label-success"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" @click.prevent="show(user)">
                                                <img src="{{asset('master-admin/img/view.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- User Modal -->
        <div class="modal fade" id="userModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h2>User ID #0000001 </h2>
                        <form class="requestmodal-form">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label"> User ID:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label"> @{{ user.id }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">First Name: </p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.first_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Last Name:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.last_name }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Email: </p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Phone Number: </p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Country:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.country }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">City:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label"> @{{ user.city }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">State/Province:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.province }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Zip/Postal Code:</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.postcode }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Total Orders</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.orders }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label">Total Order Value</p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <p class="right-label">@{{ user.order_total }} £</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group text-left" style="float:left;">
                                    <div class="terms-check">
                                        <input name="rememberme" type="checkbox" id="rememberme"
                                               value="forever" v-model="user.deactivated"/>
                                        <label for="rememberme">Deactivate User</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <input type="submit" @click.prevent="updateUser(user,'modal')" value=" Save Changes"
                                           class="btn btn-signin">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        const data = {
            users: [],
            user: {}
        };

        const users = new Vue({
            el: '#users',
            data: data,
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.user.get')}}', {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.users = response.data.data.users;
                                $this.$nextTick(function () {
                                    tableColumnWidths();
                                });
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                deleteUser: function (user_id) {
                    let $this = this;
                    axios.delete('{{route('master-admin.user.index')}}/' + user_id, {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#userModal').modal('hide');
                                $this.getData();
                                $.alert({title: 'Success!', content: 'Deactivated Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                restoreUser: function (user_id) {
                    let $this = this;
                    axios.post('{{route('master-admin.user.restore')}}', {
                        _token: '{{csrf_token()}}',
                        user_id: user_id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#userModal').modal('hide');
                                $this.getData();
                                $.alert({title: 'Success!', content: 'Activated Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                show: function (user) {
                    this.user = user;
                    jQuery('#userModal').modal('show');
                },
                updateUser: function (user, source) {
                    if (source == 'modal') {
                        if (user.deactivated) {
                            this.deleteUser(user.id);
                        } else {
                            this.restoreUser(user.id);
                        }
                    } else {
                        if (!user.deleted) {
                            this.deleteUser(user.id);
                        } else {
                            this.restoreUser(user.id);
                        }
                    }
                }
            }
        })
    </script>

@endsection
