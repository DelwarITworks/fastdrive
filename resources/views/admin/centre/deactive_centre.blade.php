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
                                <li class="breadcrumb-item active" aria-current="page">Centre Manage</li>
                            </ol>
                        </nav>
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
         
           <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
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

                <h6 class="mb-0 text-uppercase">List of Deactive Centres</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Ref. ID</th>
                                        <th>Date</th>
                                        <th>Centre</th>
                                        <th>Buying cost</th>
                                        <th>Selling cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($centres as $centre)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $centre->ref_id }}</td>
                                        <td>{{ $centre->date }}</td>
                                        <td>{{ $centre->centre_name }}</td>
                                        <td>{{ $centre->buy_cost }}</td>
                                        <td>{{ $centre->sell_cost }}</td>
                                        <td>@if($centre->status == 1) <span class="badge bg-success">Success</span> @endif</td>
                                        <td>
                                         <!-- Large modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCentre{{ $centre->id }}"><i class="bx bxs-edit"></i></button>
                                             <a href="{{ route('delete.centre',$centre->id) }}" class="btn btn-xs waves-effect waves-light btn-danger" id="delete"><i class="lni lni-trash"></i></a>
                                         <!-- Small modal -->
                                        </td>
                            <!-- Button trigger modal -->
                                   </tr>

                            <div class="modal fade" id="editCentre{{ $centre->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Centre {{ $centre->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 mx-auto">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="p-4 border rounded">
                                                                <form action="{{ route('update.centre',$centre->id) }}" method="post" class="row g-3 needs-validation" novalidate>
                                                                    @csrf
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Reference Id</label>
                                                                        <input type="text" name="ref_id" class="form-control" id="" value="{{ $centre->ref_id }}" required>
                                                                        <div class="invalid-feedback">Please enter reference id</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Date</label>
                                                                        <input type="text" name="date" class="form-control" id="" value="{{ $centre->date }}" required>
                                                                        <div class="invalid-feedback">Please enter date</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Center Address</label>
                                                                        <input type="text" name="centre_name" class="form-control" id="" value="{{ $centre->centre_name }}" required>
                                                                        <div class="invalid-feedback">Please enter center location</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Buying cost</label>
                                                                        <input type="text" name="buy_cost" class="form-control" id="" value="{{ $centre->buy_cost }}" required>
                                                                        <div class="invalid-feedback">Please enter Buying cost</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Selling cost</label>
                                                                        <input type="text" name="sell_cost" class="form-control" id="" value="{{ $centre->sell_cost }}" required>
                                                                        <div class="invalid-feedback">Please enter Selling cost</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="validationCustom01" class="form-label">Account No</label>
                                                                        <input type="text" name="account_no" class="form-control" id="" value="{{ $centre->account_no }}" >
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button class="btn btn-primary mt-4" type="submit">Submit form</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                   @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Ref. ID</th>
                                        <th>Date</th>
                                        <th>Centre</th>
                                        <th>Buying cost</th>
                                        <th>Selling cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
