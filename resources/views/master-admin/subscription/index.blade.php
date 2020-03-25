@extends('layouts.master-admin')

@section('content')

    <div id="subscriptions">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    @include('includes.master-admin-platform-header',['active'=>'subscriptions'])
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="cuisines">
                            <div class="subscriptions-section">
                                <div class="row">
                                    <div class="col-md-4" v-for="subscription in subscriptions">
                                        <div class="subscription-box">
                                            <h4>@{{ subscription.name }}</h4>
                                            <p>
                                                @{{ subscription.description }}
                                            </p>
                                            <ul>
                                                <li v-for="point in subscription.points">@{{ point.point }}</li>
                                            </ul>
                                            <a href="#" class="btn btn-edit-subscription"
                                               @click.prevent="editSubscription(subscription)">Edit Subscription</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- User Modal -->
        <div class="modal fade" id="subscription-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                    <div class="modal-body">
                        <h2>Edit Subscription </h2>
                        <div class="requestmodal-form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':subscription_validation.name!=''}">
                                        <label>Subscription Name*</label>
                                        <input type="text" class="form-control" id="itemname"
                                               placeholder="Enter Item Name" v-model="subscription.name">
                                        <span class="help-block" v-if="subscription_validation.name!=''">
                                @{{ subscription_validation.name[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':subscription_validation.description!=''}">
                                        <label>Item Description*</label>
                                        <textarea class="form-control" placeholder="Enter Item Description" rows="5"
                                                  v-model="subscription.description"
                                                  cols="7"></textarea>
                                        <span class="help-block" v-if="subscription_validation.description!=''">
                                @{{ subscription_validation.description[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div v-for="(point,index) in subscription.points">
                                <hr class="yellow-hr">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':subscription_validation.point}">
                                            <label>Point @{{ index+1}} <a href="#"
                                                                          @click.prevent="removePoint(index)"><img
                                                            src="{{asset('master-admin/img/x-red.png')}}"></a></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="Enter Point Name" v-model="point.point">
                                            <span class="help-block" v-if="subscription_validation.point">
                                @{{ subscription_validation.point[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr class="yellow-hr">

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-add-varient" @click.prevent="addPoint"> Add Point +</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Submit" class="btn btn-signin"
                                           @click.prevent="updatePoint(subscription)">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        const data = {
            subscriptions: [],
            subscription: {points: [{name: ''}]},
            subscription_validation: {name: [], description: []}
        };

        const subscriptions = new Vue({
            el: '#subscriptions',
            data: data,
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.subscription.get')}}', {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.subscriptions = response.data.data.subscriptions;
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                editSubscription: function (subscription) {
                    this.subscription = subscription;
                    jQuery('#subscription-modal').modal('show');
                },
                addPoint: function () {
                    this.subscription.points.push({name: ''});
                },
                updatePoint: function (subscription) {
                    this.subscription_validation = {name: [], description: []};

                    if (subscription.name == '') {
                        this.subscription_validation.name.push('Please enter the name');
                    }

                    if (subscription.description == '') {
                        this.subscription_validation.description.push('Please enter the description');
                    }

                    if (subscription.name == '' || subscription.description == '') {
                        return false;
                    }

                    let $this = this;
                    axios.put('{{route('master-admin.subscription.index')}}/' + subscription.id, {
                        _token: '{{csrf_token()}}',
                        name: subscription.name,
                        description: subscription.description,
                        points: subscription.points,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.getData();
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                                jQuery('#subscription-modal').modal('hide');
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                removePoint: function (index) {
                    this.subscription.points.splice(index, 1);
                }
            }
        });
    </script>
@endsection
