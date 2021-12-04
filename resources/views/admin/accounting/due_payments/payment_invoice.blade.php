@extends('admin.master')
@section('title','Voucher Print')
@section('content')

    <main class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> @yield('title')</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-10 offset-1">

                <div class="tile">

                    <div class="tile-body" id="printDiv">

                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <h5 class="text-center">{{ $company->name }}</h5>
                                    <p class="text-center">{{ $company->address }}</p>
                                    <h4 class="text-center"> <span class="badge badge-dark"> {{ request()->type == 'debit' ? 'Debit' : 'Credit' }} Voucher </span></h4>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-left">Voucher No : {{ $payment_invoice->voucher->id }}</p>
                                    <p class="text-left">Date : {{ date('d/m/Y', strtotime($payment_invoice->voucher->voucher_date)) }}</p>
                                    <p class="text-left">Ref : {{ $payment_invoice->voucher->voucher_reference }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-left">Paid to : {{ $payment_invoice->voucher->party->name }}</p>
                                    <table class="table table-bordered">

                                        <tr>
                                            <td style="width: 80%">PARTICULARS</td>
                                            <td class="text-center">AMOUNT</td>
                                        </tr>

                                        @php($sum = 0)
                                      
                                        <tr>
                                            <td style="width: 80%">

                                                <dl class="row">
{{-- @dd($payment_invoice) --}}
                                                    <dd class="col-sm-3">Account</dd>
                                                    <dd class="col-sm-9">:&nbsp;&nbsp;&nbsp; {{ $payment_invoice->account_information->account_name }}</dd>

                                                    <dd class="col-sm-3">Cheque Number</dd>
                                                    <dd class="col-sm-9">:&nbsp;&nbsp;&nbsp; {{ $payment_invoice->cheque_number }}</dd>

                                                    <dd class="col-sm-3">Mode of payment</dd>
                                                    <dd class="col-sm-9">:&nbsp;&nbsp;&nbsp; 
                                                        {{ $payment_invoice->payment_method->method_name }}    
                                                    </dd>

                                                </dl>

                                            </td>
                                            <td class="text-right">
                                                {{ $payment_invoice->paid_amount }}
                                            </td>
                                        </tr>

{{--                                       
                                        <tr>
                                            <td style="width: 80%" class="text-right">Total</td>
                                            <td class="text-right">{{ number_format($sum) }}</td>
                                        </tr> --}}

                                    </table>

                                    {{-- <p class="text-left">In Word  &nbsp;:&nbsp;  {{ strtoupper(\App\Http\Controllers\VoucherController::convert_number_to_words(number_format($sum))) }}  Only</p> --}}

                                </div>
                            </div>

                            <br>

                            <div class="row mt-4">
                                <div class="col-sm-4 text-center">
                                    <div class="col-sm-8 offset-2 border-bottom"></div>
                                    <p>Received by</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="col-sm-8 offset-2 border-bottom"></div>
                                    <p>Checked by</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="col-sm-8 offset-2 border-bottom"></div>
                                    <p>Approved by</p>
                                </div>
                                <div class="col-sm-12">
                                    <hr>
                                    {{ request()->type == 'debit' ? 'Debit' : 'Credit' }} Voucher created by- {{ $payment_invoice->voucher->user->name }}, {{ $payment_invoice->voucher->created_at->format('F d , Y  H:i:s A') }}
                                </div>
                            </div>



                        <br>
                        <br>

                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <a class="btn btn-primary" href="javascript:window.print();" ><i class="fa fa-print"></i> Print</a>
                                <a class="btn btn-info" href="{{ url()->previous() }}" ><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>


    </main>


    <script type="text/javascript">

       // window.print();

    </script>


@endsection