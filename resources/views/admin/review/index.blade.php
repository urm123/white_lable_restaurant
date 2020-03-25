@extends('layouts.admin')

@section('content')

    <div id="reviews">
        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'customer'])
                    </div>
                    <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                        <div class="filter-greybox">
                            <div class="select-box1">
                                <h4>{{__('Reviews')}} <a href="{{route('admin.ticket.index')}}"> <span
                                            class="p" style="margin-right: 0;"> Support Tickets</span></a>
                                    <a href="{{route('admin.customer.index')}}"> <span
                                            class="p1" style="margin-right: 0">{{__('Customers')}}</span> </a>
                                    <date-picker id="from_date" @input="filter" v-model="from_date"></date-picker>
                                    <date-picker id="to_date" @input="filter" v-model="to_date"></date-picker>
                                    {{--                                    <div class="sort">{{__('Sort by:')}}<select>--}}
                                    {{--                                            <option>Sort by A-Z</option>--}}
                                    {{--                                        </select></div>--}}
                                </h4>
                            </div>
                        </div>
                        <div class="table-report table-report_res_review table-responsive">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>{{__('Rating')}}</th>
                                    {{--                                    <th>Comment</th>--}}
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="review in filtered_reviews">
                                    <td>@{{ review.created_at }}</td>
                                    <td>@{{ review.user.first_name }} @{{ review.user.last_name }}</td>
                                    <td>
                                        <star-rating :rating="review.rating"></star-rating>
                                    </td>
                                    {{--                                    <td style="word-wrap:break-word;--}}
                                    {{--              table-layout: fixed;">@{{ review.review }}--}}
                                    {{--                                    </td>--}}
                                    <td>
                                        <a href="#" @click.prevent="openReview(review)">
                                            <svg width="33"
                                                 height="27"
                                                 viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path
                                                        d="M0 18.4766C0 19.1365 0.553691 19.6864 1.21812 19.6864H6.14597V25.7902C6.14597 26.2301 6.42282 26.6701 6.8104 26.89C6.97651 27 7.19799 27 7.36409 27C7.64094 27 7.86242 26.945 8.08389 26.78L17.995 19.6314H31.7819C32.4463 19.6314 33 19.0815 33 18.4216V1.20978C33 0.549898 32.4463 0 31.7819 0H1.21812C0.553691 0 0 0.549898 0 1.20978V18.4766ZM2.43624 2.41955H30.5084V17.2118H17.6074C17.3305 17.2118 17.1091 17.2668 16.8876 17.4318L8.63758 23.4257V18.4766C8.63758 17.8167 8.08389 17.2668 7.41946 17.2668H2.49161L2.43624 2.41955Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M8.41516 8.08301C5.75745 8.08301 5.75745 12.1523 8.41516 12.1523C11.0729 12.1523 11.0729 8.08301 8.41516 8.08301Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M16.4991 12.1523C19.1569 12.1523 19.1569 8.08301 16.4991 8.08301C13.8414 8.08301 13.8414 12.1523 16.4991 12.1523Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M24.5831 12.1523C27.2409 12.1523 27.2409 8.08301 24.5831 8.08301C21.9254 8.08301 21.9254 12.1523 24.5831 12.1523Z"
                                                        fill="#828282"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="33" height="27" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Edit Item Modal -->
        <div class="modal fade review-response-modal" id="review-response-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Review Response</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Date:</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">@{{ review.date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">@{{ review.user.first_name }} @{{ review.user.last_name }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>{{__('Rating')}}</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">
                                    <star-rating :rating="review.rating"></star-rating>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Comment</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail" style="word-break: break-all;">
                                    @{{ review.review }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>Admin Response</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="" placeholder="Enter comment" rows="6"
                                          v-model="review.response"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><input type="submit" name="" @click.prevent="saveResponse"
                                                          value="Submit"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        const data = {
            reviews:{!! json_encode($reviews) !!},
            review: {user: {}},
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->addMonth()->toDateString()}}',
            filtered_reviews: []
        };

        const reviews = new Vue({
            el: '#reviews',
            data: data,
            mounted: function () {
                this.filter();
            },
            methods: {
                openReview: function (review) {
                    this.review = review;
                    jQuery('#review-response-modal').modal('show');
                },
                saveResponse: function () {
                    let review = this.review;
                    axios.put('{{route('admin.review.index')}}/' + review.id, {
                        _token: '{{csrf_token()}}',
                        response: review.response,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#review-response-modal').modal('hide');
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                filter: function () {
                    var from_time = this.from_date + ' {{\Carbon\Carbon::now()->format('H:i:s')}}';
                    var to_time = this.to_date + ' {{\Carbon\Carbon::now()->format('H:i:s')}}';


                    var filtered_reviews = this.reviews.filter(function (review) {
                        return from_time <= review.created_at && to_time >= review.created_at;
                    });

                    this.filtered_reviews = filtered_reviews;

                    $this.$nextTick(function () {
                        tableColumnWidths();
                    });
                }
            }
        });
    </script>

@endsection

<!-- Edit Item Modal -->
