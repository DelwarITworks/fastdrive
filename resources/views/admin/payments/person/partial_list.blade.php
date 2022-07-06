@extends('admin.layouts.app')

@section('content')

        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">FDT admin</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">payment Manage</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <!-- Button trigger modal -->
                             @if($payment->practical)
                            <a href="{{ route('payment.list') }}" class="btn btn-primary" ><i class="fadeIn animated bx bx-plus"></i>Practical Payments</a>
                            @endif
                             @if($payment->theory)
                            <a href="{{ route('theory.payment.list') }}" class="btn btn-primary" ><i class="fadeIn animated bx bx-plus"></i>Theory Payments</a>
                            @endif
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->


                <h6 class="mb-0 text-uppercase">List of payments Name : @if($payment->theory)<span class="text-success">{{ $payment->theory->name }}</span> , Tracking Id :  <span class="text-success">{{ $payment->theory->track_id }}</span>  @endif  @if($payment->practical)<span class="text-success">{{ $payment->practical->name }}</span> , Tracking Id :  <span class="text-success">{{ $payment->practical->track_id }}</span>  @endif</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Partial</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($payment->partialpayment as $pay)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $pay->amount }}</td>
                                        <td>{{ $pay->created_at->format('d-m-Y') }}</td>
                            <!-- Button trigger modal -->
                                   </tr>

                                   @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Partial</th>
                                        <th>Created_at</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js_extra')

@endsection
