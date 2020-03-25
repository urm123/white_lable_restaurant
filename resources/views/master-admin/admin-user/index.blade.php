@extends('layouts.master-admin')

@section('content')
    <div id="users">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                @include('includes.master-admin-settings-header')

                <button data-toggle="modal" data-target="#add-new-admin-user" class="btn btn-new-admin">
                    Add New Admin
                </button>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="admin-users">
                            <div class="table-responsive">
                                <table class="requests-table">
                                    <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td v-if="user.role === 'admin'">
                                            <span class="re-admin-lbl">Restaurant Admin</span>
                                        </td>
                                        <td v-if="user.role === 'master_admin'">
                                            <span class="m-admin-lbl">Master Admin</span>
                                        </td>
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
                        <h2>Admin ID #0000001 </h2>
                        <form class="requestmodal-form">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <p class="left-label"> Admin ID:</p>
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
                                    <p class="right-label">@{{ user.postcode }}</p>
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

        <!-- New Admin User Modal -->
        <div class="modal fade add-new-item-modal" id="add-new-admin-user" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Add New Admin User</h4>
                        <hr>
                        <p>First Name*</p>
                        <div class="form-group" :class="{'has-error':account_validation.first_name}">
                            <input type="text" placeholder="Enter First Name" v-model="first_name" name="first_name" id="first_name" class="form-control">
                            <span v-if="account_validation.first_name" class="help-block">@{{ account_validation.first_name[0] }}</span>
                        </div>
                        <p>Last Name*</p>
                        <div class="form-group" :class="{'has-error':account_validation.last_name}">
                            <input type="text" placeholder="Enter Last Name" name="last_name" v-model="last_name" id="last_name" class="form-control">
                            <span v-if="account_validation.last_name" class="help-block">@{{ account_validation.last_name[0] }}</span>
                        </div>
                        <p>Email*</p>
                        <div class="form-group" :class="{'has-error':account_validation.email}">
                            <input type="email" placeholder="Enter Email" name="email" v-model="email" id="email" class="form-control">
                            <span v-if="account_validation.email" class="help-block">@{{ account_validation.email[0] }}</span>
                        </div>
                        <p>Enter Password*</p>
                        <div class="form-group" :class="{'has-error':account_validation.password}">
                            <input type="password" placeholder="Enter Password" v-model="password" name="password" id="password" class="form-control">
                            <span v-if="account_validation.password" class="help-block">@{{ account_validation.password[0] }}</span>
                        </div>
                        <p>Confirm Password*</p>
                        <div class="form-group" :class="{'has-error':account_validation.password_confirmation}">
                            <input type="password" placeholder="Re-enter Password" v-model="password_confirmation" name="password_confirmation" id="cpassword" class="form-control">
                            <span v-if="account_validation.password_confirmation" class="help-block">@{{ account_validation.password_confirmation[0] }}</span>
                        </div>
                        <p>Assign Role*</p>
                        <div class="form-group" :class="{'has-error':account_validation.role}">
                            <select name="role" id="role" class="form-control" v-model="role">
                                <option value="admin" selected="selected">Restauran Admin</option>
                                <option value="master_admin">Master Admin</option>
                            </select>
                            <span v-if="account_validation.role" class="help-block">@{{ account_validation.role[0] }}</span>
                        </div>
                        <input type="submit" name="" value="Create" @click.prevent="createAdminUser">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        const data = {
            users: [],
            user: {},
            account_validation: [],
            account_item: {},
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirmation: '',
            role: '',
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
                    axios.post('{{route('master-admin.admin-user.get')}}', {
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
                    axios.post('{{route('master-admin.admin-user.restore')}}', {
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
                },
                createAdminUser: function () {
                    let $this = this;

                    let post_data = {
                        _token: '{{csrf_token()}}',
                        first_name: $this.first_name,
                        last_name: $this.last_name,
                        email: $this.email,
                        password: $this.password,
                        password_confirmation: $this.password_confirmation,
                        role: $this.role,
                    };

                    axios.post('{{route('master-admin.admin-user.store')}}', post_data)
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#add-new-admin-user').modal('hide');
                                this.getData();
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                                $this.user = {};
                            }
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                $this.account_validation = error.response.data.errors;
                            }
                        });
                }
            }
        });

    </script>

@endsection
