@extends('layouts.master-admin')

@section('content')

    <div id="payment_methods">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    @include('includes.master-admin-platform-header',['active'=>'payment_method'])
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="cuisines">
                            <div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{route('master-admin.payment-method.create')}}"
                                           class="btn btn-add-post" style="    width: auto;
    height: auto;
    padding: 15px;
    margin-bottom: 20px;">
                                            Add New Payment Method
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="requests-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payment_methods as $payment_method)
                                        <tr>
                                            <td>{{ $payment_method->name }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger"
                                                   onclick="deletePaymentMethod(event,'{{$payment_method->id}}')">Delete</a>
                                            </td>
                                            <td>
                                                <a href="{{route('master-admin.payment-method.edit',$payment_method)}}">
                                                    <img src="{{asset('master-admin/img/view.png')}}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deletePaymentMethod(event, payment_method_id) {
            event.preventDefault();
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to delete the payment method?',
                theme: 'error',
                buttons: {
                    confirm: function () {

                        axios.delete('{{route('master-admin.payment-method.index')}}/' + payment_method_id, {
                            _token: '{{csrf_token()}}',
                            id: payment_method_id
                        })
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    $.alert({
                                        title: 'Success!',
                                        content: 'Deleted Successfully!',
                                        theme: 'success'
                                    });
                                    window.location.reload();
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    },
                    cancel: function () {

                    },
                }
            });

        }
    </script>

@endsection
