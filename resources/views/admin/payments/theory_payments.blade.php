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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"><i class="fadeIn animated bx bx-plus"></i> Add New Center</button>
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->

           @if(session('success'))
           <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif 
           @if(session('wrong'))
         
           <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('wrong') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

            @if ($errors->any())
                 @foreach ($errors->all() as $error)
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                            </div>
                            <div class="ms-3">
                                <div class="text-dark">Warning !! {{ $error }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 @endforeach
            <hr/>
             @endif
                <h6 class="mb-0 text-uppercase">List of payments</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Customer Name</th>
                                        <th>Client id</th>
                                        <th>Amount</th>
                                        <th>Refund</th>
                                        <th>Total</th>
                                        <th>Partial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($payments as $payment)
                                   @if($payment->theory_id)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $payment->theory->name }}</td>
                                        <td>{{ $payment->theory->track_id }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>
                                             <button href="" class="btn btn-xs waves-effect waves-light btn-danger" id=""  data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal1{{ $payment->id }}">Refund</button>
                                         </td>
                                        <td>@if($payment->partialpayment->sum('amount')) @if( $payment->partialpayment->sum('amount') >= $payment->amount) <span class="badge bg-danger">Refunded</span> @elseif( $payment->partialpayment->sum('amount') < $payment->amount) <span class="badge bg-warning">Partial</span> @endif @else <span class="badge bg-success">Success</span> @endif</td>
                                        <td>
                                             <button href="" class="btn btn-xs waves-effect waves-light btn-success" id=""  data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal{{ $payment->id }}">Partial</button>
                                         <!-- Small modal -->
                                        </td>
                            <!-- Button trigger modal -->
                                   </tr>

                            <div class="modal fade" id="exampleExtraLargeModal{{ $payment->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">New Centre Form <a href="{{ route('partial.list',$payment->id) }}" class="btn btn-sm btn-success">check</a></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('theory.partial.payment',$payment->id) }}" method="post" class="row g-3 needs-validation" novalidate>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="col-md-12 mt-3">
                                                    <input type="number" name="amount"  placeholder="Amount" class="form-control" value="{{ old('amount') }}" required="">
                                                </div>
                                    
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" >Partial Payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- refund --}}
                            
                            <div class="modal fade" id="exampleExtraLargeModal1{{ $payment->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Refund</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('theory.payment.refund',$payment->id) }}" method="post" class="row g-3 needs-validation" novalidate>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="col-md-12 mt-3">
                                                    @php 
                                                    $refund1 = $payment->amount - $payment->partialpayment->sum('amount');

                                                    @endphp
                                                    <input type="hidden" name="amount"  placeholder="Amount" class="form-control" value="{{ $refund1 }}" required="">
                                                </div>
                                    
                                                <button class="btn btn-danger" >Refund now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                                   @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Customer Name</th>
                                        <th>Client id</th>
                                        <th>Amount</th>
                                        <th>Refund</th>
                                        <th>Totoal</th>
                                        <th>Partial</th>
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
