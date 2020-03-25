@extends('layouts.master-admin')

@section('content')
    <div id="reports">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav stats-nav">
                    <ul class="nav nav-tabs">
                        <li>
                            <select class="form-control" v-model="restaurant" @change.prevent="getData">
                                <option>Select Restaurant</option>
                                @foreach($restaurants as $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <date-picker id="from_date" v-model="from_date" placeholder="From:" class="form-control"
                                         @input="getData"></date-picker>
                        </li>
                        <li>
                            <date-picker id="to_date" v-model="to_date" placeholder="To:" class="form-control"
                                         @input="getData"></date-picker>
                        </li>
                        <li class="stats-search">
                            <img src="{{asset('master-admin/img/Search.png')}}">
                        </li>
                        <li>
                            <button type="button" class="btn btn-print-report" onclick="PrintElem('sales-figures')">
                                Print Report
                            </button>
                        </li>
                        {{--                        <li class="sort-by" id="sort-by">--}}
                        {{--                            <label>{{__('Sort by:')}} </label>--}}
                        {{--                            <select class="form-control">--}}
                        {{--                                <option value="0">A-Z</option>--}}
                        {{--                            </select>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>

                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav stats-sub-nav">
                        @include('includes.master-admin-report-header',['active'=>'sales'])
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="sales-figures">
                                <div class="col-md-12 table-responsive" style="padding-left: 0px; padding-right: 0px;">
                                    <table class="requests-table sales-figures-table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>ID</th>
                                            <th>Order Type</th>
                                            <th>Order Amount</th>
                                            <th>Order Payment Method</th>
                                            <th>No. of Items</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="result in results">
                                            <td>@{{ result.date }}</td>
                                            <td>@{{ result.display_time }}</td>
                                            <td>@{{ result.id}}</td>
                                            <td>@{{ result.type}}</td>
                                            <td>@{{ currency(result.total) }}</td>
                                            <td>@{{ result.payment_method }}
                                            </td>
                                            <td>@{{ result.item_count }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="charts">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <canvas id="pie-chart"></canvas>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <canvas id="bar-chart"></canvas>
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

    <script type="text/javascript">
        var pie_chart_element = document.getElementById("pie-chart").getContext('2d');
        var pie_chart = new Chart(pie_chart_element, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Income',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var bar_chart_element = document.getElementById("bar-chart").getContext('2d');
        var bar_chart = new Chart(bar_chart_element, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Delivery',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                    ],
                    borderWidth: 1
                },
                    {
                        label: '{{__("Takeaway")}}',
                        data: [],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                },
            }
        });

        const data = {
            results: [],
            delivery_data: [],
            takeaway_data: [],
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateTimeString()}}',
            to_date: '{{\Carbon\Carbon::now()->toDateTimeString()}}',
            restaurant: '{{$restaurants[0]->id}}'
        };

        const reports = new Vue({
            data: data,
            el: '#reports',
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;
                    axios.get('{{route('master-admin.report.sales.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&restaurant_id=' + this.restaurant)
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.results = response.data.data.results;
                                $this.createCharts();
                                $this.$nextTick(function () {
                                    tableColumnWidths();
                                });
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                createCharts: function () {
                    let $this = this;
                    axios.get('{{route('master-admin.report.sales.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&restaurant_id=' + this.restaurant + '&type=delivery')
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.delivery_data = response.data.data.results;
                            }
                            axios.get('{{route('master-admin.report.sales.data')}}?from_date=' + $this.from_date + '&to_date=' + $this.to_date + '&restaurant_id=' + $this.restaurant + '&type=takeaway')
                                .then(function (response) {
                                    if (response.data.message == 'success') {
                                        $this.takeaway_data = response.data.data.results;
                                        pie_chart.data.labels = ['Delivery', '{{__("Takeaway")}}'];
                                        let delivery_total = 0;
                                        let takeaway_total = 0;
                                        $this.delivery_data.forEach(function (delivery_datum) {
                                            delivery_total += delivery_datum.total;
                                        });

                                        $this.takeaway_data.forEach(function (takeaway_datum) {
                                            takeaway_total += takeaway_datum.total;
                                        });

                                        pie_chart.data.datasets[0].data = [delivery_total, takeaway_total];
                                        pie_chart.update();
                                    }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                    axios.get('{{route('master-admin.report.sales.bar')}}')
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                var data = response.data.data.results;

                                var labels = [];

                                data.delivery_data.forEach(function (delivery_datum, index) {
                                    labels.push(delivery_datum.month);
                                });

                                bar_chart.data.labels = labels;

                                delivery_totals = [];
                                takeaway_totals = [];

                                data.delivery_data.forEach(function (delivery_datum) {
                                    delivery_totals.push(delivery_datum.total);
                                });

                                data.takeaway_data.forEach(function (takeaway_datum) {
                                    takeaway_totals.push(takeaway_datum.total);
                                });

                                bar_chart.data.datasets[0].data = delivery_totals;
                                bar_chart.data.datasets[1].data = takeaway_totals;
                                bar_chart.update();

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price)

                },
            }
        });
    </script>

    <script type="text/javascript">
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<h1>' + document.title + '</h1>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>
@endsection
