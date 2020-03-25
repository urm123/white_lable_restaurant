@extends('layouts.master-admin')

@section('content')
    <div id="reviews">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav stats-nav">
                    <ul class="nav nav-tabs">
                        <li style="">
                            <date-picker id="from_date" v-model="from_date" placehoder="Select From Date"
                                         class="form-control"></date-picker>
                        </li>
                        <li style="">
                            <date-picker id="to_date" v-model="to_date" placehoder="Select To Date"
                                         class="form-control"></date-picker>
                        </li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active table-responsive">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Restaurant</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Response</th>
                                    <th>Status</th>
                                    <th>Set Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="review in reviews">
                                    <td>
                                        @{{ review.user.first_name }} @{{ review.user.last_name }}
                                    </td>
                                    <td>@{{ review.restaurant.name }}</td>
                                    <td>
                                        <star-rating :rating="review.rating"></star-rating>
                                    </td>
                                    <td>
                                        @{{ review.review }}
                                    </td>
                                    <td>
                                        @{{ review.response }}
                                    </td>
                                    <td>
                                        <label class="label label-danger" v-if="review.deleted">Blocked</label>
                                        <label class="label label-success" v-if="!review.deleted">Approved</label>
                                    </td>
                                    <td>
                                        <button class="btb btn-success" @click.prevent="setStatus(review.id,true)"
                                                v-if="review.deleted"><i
                                                class="fa fa-check"></i>
                                            Approve
                                        </button>
                                        <button class="btb btn-danger" @click.prevent="setStatus(review.id,false)"
                                                v-if="!review.deleted"><i
                                                class="fa fa-times"></i>
                                            Block
                                        </button>
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




    <script type="text/javascript">
        var data = {
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            reviews: [],
        };

        var reviews = new Vue({
            data: data,
            el: '#reviews',
            mounted: function () {
                this.getReviews();
            },
            methods: {
                getReviews: function () {
                    var $this = this;
                    axios.post('{{route('master-admin.review.get')}}', {
                        _token: '{{csrf_token()}}',
                        from_date: $this.from_date,
                        to_date: $this.to_date,
                    }).then(function (response) {
                        $this.reviews = response.data.reviews;
                        $this.$nextTick(function () {
                            tableColumnWidths();
                        });
                    }).catch(function (error) {
                        console.log(error);
                    })
                },
                setStatus: function (review_id, status) {
                    var $this = this;

                    axios.post('{{route('master-admin.review.set')}}', {
                        _token: '{{csrf_token()}}',
                        review_id: review_id,
                        status: status
                    }).then(function (response) {
                        if (response.data.status) {
                            $.alert({title: 'Success!', content: response.data.message, theme: 'success'});
                            $this.getReviews();
                        } else {
                            $.alert({title: '{{__('Oh Sorry!')}}', content: response.data.message, theme: 'error'});
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            watch: {
                from_date: function () {
                    this.getReviews();
                },
                to_date: function () {
                    this.getReviews();
                },
            }
        })
    </script>
@endsection
