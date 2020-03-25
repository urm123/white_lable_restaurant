@extends('layouts.admin')

@section('content')

    <section>
        <div class="container">
            <div class="row res-admin">
                <div class="col-md-2 col-sm-3 res-admin-side">
                    @include('includes.admin-side-bar',['active'=>'reports'])
                </div>
                <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                    <div id="reports">
                        <div class="filter-greybox report">
                            {{--                            <div class="select-box1">--}}
                            <table class="table table-responsive">
                                <tr>

                                    <th>Order From:</th>
                                    <td>
                                        <date-picker id="from_date" v-model="from_date" placeholder="From:"
                                                     @input="getData"></date-picker>
                                    </td>
                                    <th>Order To:</th>
                                    <td>
                                        <date-picker id="to_date" v-model="to_date" placeholder="To:"
                                                     @input="getData"></date-picker>
                                    </td>
                                </tr>
                                {{--                                <tr>--}}
                                {{--                                    <th>Created From:</th>--}}
                                {{--                                    <td>--}}
                                {{--                                        <date-picker id="created_from" v-model="created_from" placeholder="From:"--}}
                                {{--                                                     @input="getData"></date-picker>--}}
                                {{--                                    </td>--}}
                                {{--                                    <th>Created To:</th>--}}
                                {{--                                    <td>--}}
                                {{--                                        <date-picker id="created_to" v-model="created_to" placeholder="To:"--}}
                                {{--                                                     @input="getData"></date-picker>--}}
                                {{--                                    </td>--}}

                                {{--                                </tr>--}}
                            </table>
                            <table class="table table-responsive">
                                <tr>
                                    <th>Order Type:</th>
                                    <td>
                                        <select v-model="type" @change.prevent="getData">
                                            <option value="">Select Order Type</option>
                                            <option value="delivery">{{__("Delivery")}}</option>
                                            <option value="takeaway">{{__("Takeaway")}}</option>
                                            <option value="reservation">Reservation</option>
                                        </select>
                                    </td>
                                    <th v-if="type">Sort By:</th>
                                    <td v-if="type">
                                        <select v-model="sort" @change.prevent="getData">
                                            <option value="">Select Sort</option>
                                            {{--                                            <option value="payment_asc">{{__("Payment Method Ascending")}}</option>--}}
                                            {{--                                            <option value="payment_desc">{{__("Payment Method Descending")}}</option>--}}
                                            <option value="customer_asc">{{__("Customer Name Ascending")}}</option>
                                            <option value="customer_desc">{{__("Customer Name Descending")}}</option>
                                            <option value="order_id_asc">{{__("Order ID Ascending")}}</option>
                                            <option value="order_id_desc">{{__("Order ID Descending")}}</option>
                                        </select>
                                    </td>
                                    <th>
                                        <button class="print-report" onclick="PrintElem('sales-figures')">Print
                                            Report
                                        </button>
                                    </th>
                                </tr>
                            </table>


                            {{--                                <div class="sort">{{__('Sort by:')}}<select>--}}
                            {{--                                        <option>Sort by A-Z</option>--}}
                            {{--                                    </select></div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="totals" style="margin-top: 20px;">
                            <table class="table table-responsive">
                                <tr>
                                    <th>Delivery Total:</th>
                                    <td class="text-right">£ @{{ currency(totals.delivery.total) }}</td>
                                    {{--                                    <th>Delivery Card Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.delivery.card) }}</td>--}}
                                    {{--                                    <th>Delivery Cash Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.delivery.cash) }}</td>--}}
                                    {{--                                    <th>Delivery Ticket Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.delivery.ticket) }}</td>--}}
                                    {{--                                    <th>Delivery Paypal Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.delivery.paypal) }}</td>--}}
                                    {{--                                </tr>--}}
                                    {{--                                <tr>--}}
                                    <th>Takeaway Total:</th>
                                    <td class="text-right">£ @{{ currency(totals.takeaway.total) }}</td>
                                    {{--                                    <th>Takeaway Card Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.takeaway.card) }}</td>--}}
                                    {{--                                    <th>Takeaway Cash Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.takeaway.cash) }}</td>--}}
                                    {{--                                    <th>Takeaway Ticket Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.takeaway.ticket) }}</td>--}}
                                    {{--                                    <th>Takeaway Paypal Total:</th>--}}
                                    {{--                                    <td class="text-right">£ @{{ currency(totals.takeaway.paypal) }}</td>--}}
                                </tr>
                            </table>
                        </div>
                        <div class="table-report table-responsive" id="sales-figures" v-if="type">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Order Time</th>
                                    <th>Created Date</th>
                                    <th>Created Time</th>
                                    <th>OrderID</th>
                                    <th>Customer</th>
                                    <th v-if="type=='reservation'">Head Count</th>
                                    <th v-if="type!='reservation'">Order Amount</th>
{{--                                    <th v-if="type!='reservation'">Order Payment Method</th>--}}
                                    <th v-if="type!='reservation'">No. of Items</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="result in results">
                                    <td>@{{ result.date }}</td>
                                    <td>@{{ result.display_time }}</td>
                                    <td>@{{ result.created_date }}</td>
                                    <td>@{{ result.created_display_time }}</td>
                                    <td>@{{ result.id }}</td>
                                    <td>@{{ result.customer }}</td>
                                    <td v-if="type=='reservation'">@{{ result.head_count }}</td>
                                    <td v-if="type!='reservation'">‎£ @{{ currency(result.total) }}</td>
                                    {{--                                    <td v-if="type!='reservation'">@{{ result.payment.type }}</td>--}}
                                    <td v-if="type!='reservation'">@{{ result.item_count }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
    </section>


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
                    label: '{{__("Delivery")}}',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                    ],
                    borderWidth: 1
                },
                    {
                        label: '{{__("Takeaway")}}',
                        data: [],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
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
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            {{--            created_from: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',--}}
                {{--            created_to: '{{\Carbon\Carbon::now()->toDateString()}}',--}}
            type: '',
            sort: 'payment_asc',
            totals: {
                takeaway: {
                    total: 0,
                    card: 0,
                    cash: 0,
                    ticket: 0,
                    paypal: 0,
                },
                delivery: {
                    total: 0,
                    card: 0,
                    cash: 0,
                    ticket: 0,
                    paypal: 0,
                },
            },
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
                    {{--axios.get('{{route('admin.report.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&created_from=' + this.created_from + '&created_to=' + this.created_to + '&type=' + this.type + '&sort=' + this.sort)--}}
                    axios.get('{{route('admin.report.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&type=' + this.type + '&sort=' + this.sort)
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.results = response.data.data.results;
                                $this.createCharts();
                                $this.getTotals();
                                $this.$nextTick(function () {
                                    tableColumnWidths();
                                });
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                getTotals: function () {
                    let $this = this;

                    this.totals = {
                        takeaway: {
                            total: 0,
                            card: 0,
                            cash: 0,
                            ticket: 0,
                            paypal: 0,
                        },
                        delivery: {
                            total: 0,
                            card: 0,
                            cash: 0,
                            ticket: 0,
                            paypal: 0,
                        },
                    };

                    {{--axios.get('{{route('admin.report.total')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&created_from=' + this.created_from + '&created_to=' + this.created_to)--}}
                    axios.get('{{route('admin.report.total')}}?from_date=' + this.from_date + '&to_date=' + this.to_date)
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                var deliveries = response.data.data.delivery_totals;
                                var takeaways = response.data.data.takeaway_totals;


                                deliveries.forEach(function (delivery) {
                                    $this.totals.delivery.total += parseFloat(delivery.total);
                                    if (delivery.payment.type == 'cash') {
                                        $this.totals.delivery.cash += parseFloat(delivery.total);
                                    }
                                    if (delivery.payment == 'card') {
                                        $this.totals.delivery.card += parseFloat(delivery.total);
                                    }
                                    if (delivery.payment.type == 'ticket') {
                                        $this.totals.delivery.ticket += parseFloat(delivery.total);
                                    }
                                    if (delivery.payment.type == 'paypal') {
                                        $this.totals.delivery.paypal += parseFloat(delivery.total);
                                    }
                                });

                                takeaways.forEach(function (takeaway) {
                                    $this.totals.takeaway.total += parseFloat(takeaway.total);
                                    if (takeaway.payment.type == 'cash') {
                                        $this.totals.takeaway.cash += parseFloat(takeaway.total);
                                    }
                                    if (takeaway.payment.type == 'card') {
                                        $this.totals.takeaway.card += parseFloat(takeaway.total);
                                    }
                                    if (takeaway.payment.type == 'ticket') {
                                        $this.totals.takeaway.ticket += parseFloat(takeaway.total);
                                    }
                                    if (takeaway.payment.type == 'paypal') {
                                        $this.totals.takeaway.paypal += parseFloat(takeaway.total);
                                    }
                                });


                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                createCharts: function () {
                    let $this = this;
                    {{--axios.get('{{route('admin.report.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&created_from=' + this.created_from + '&created_to=' + this.created_to + '&type=delivery')--}}
                    axios.get('{{route('admin.report.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date + '&type=delivery&method=chart')
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.delivery_data = response.data.data.results;
                            }
                            {{--axios.get('{{route('admin.report.data')}}?from_date=' + $this.from_date + '&to_date=' + $this.to_date + '&created_from=' + $this.created_from + '&created_to=' + $this.created_to + '&type=takeaway')--}}
                            axios.get('{{route('admin.report.data')}}?from_date=' + $this.from_date + '&to_date=' + $this.to_date + '&type=takeaway&method=chart')
                                .then(function (response) {
                                    if (response.data.message == 'success') {
                                        $this.takeaway_data = response.data.data.results;
                                        pie_chart.data.labels = ['{{__("Delivery")}}', '{{__("Takeaway")}}'];
                                        let delivery_total = 0;
                                        let takeaway_total = 0;
                                        $this.delivery_data.forEach(function (delivery_datum) {
                                            delivery_total += parseFloat(delivery_datum.total);
                                        });

                                        $this.takeaway_data.forEach(function (takeaway_datum) {
                                            takeaway_total += parseFloat(takeaway_datum.total);
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

                    axios.get('{{route('admin.report.data.bar')}}')
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
            },
            watch: {}
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
