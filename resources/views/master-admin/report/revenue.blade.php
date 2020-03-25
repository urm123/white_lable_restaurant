@extends('layouts.master-admin')

@section('content')
    <div id="reports">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav stats-nav">
                    <ul class="nav nav-tabs">
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
                            <div class="tab-pane fade in active table-responsive" id="sales-figures">
                                <table class="requests-table sales-figures-table">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">Restaurant</th>
                                        <th colspan="2">Total Gross Revenue</th>
                                        <th colspan="2">Expenses</th>
                                        <th rowspan="2">Net Revenue</th>
                                    </tr>
                                    <tr>
                                        <th>{{__("Delivery")}}</th>
                                        <th>{{__("Takeaway")}}</th>
                                        <th>Promotions</th>
                                        <th>Subscriptions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="result in results">
                                        <td>@{{ result.name }}</td>
                                        <td>@{{ currency(result.delivery_total) }}</td>
                                        <td>@{{ currency(result.takeaway_total)}}</td>
                                        <td>@{{
                                            currency(parseFloat(result.site_promotions)+parseFloat(result.restaurant_promotions)+parseFloat(result.menu_item_promotions))}}
                                        </td>
                                        <td></td>
                                        <td>@{{
                                            currency(parseFloat(result.delivery_total)+parseFloat(result.takeaway_total)-parseFloat(result.site_promotions)-parseFloat(result.restaurant_promotions)-parseFloat(result.menu_item_promotions))
                                            }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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


        const data = {
            results: [],
            delivery_data: [],
            takeaway_data: [],
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateTimeString()}}',
            to_date: '{{\Carbon\Carbon::now()->toDateTimeString()}}',
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
                    axios.get('{{route('master-admin.report.revenue.data')}}?from_date=' + this.from_date + '&to_date=' + this.to_date)
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.results = response.data.data.results;
                                $this.$nextTick(function () {
                                    tableColumnWidths();
                                });
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
