@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Ctegories</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Table</h4>
                        <a href="{{ route('categories.create') }}" class="btn btn-success" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add Category</a>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-success table-striped align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Corporate Plan</td>
                                    <td><i class="ri-checkbox-circle-line align-middle text-success"></i> Subscribed</td>
                                    <td>$1599</td>
                                    <td>Nov 22, 2021</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <!-- <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a> -->
                                            <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end page title -->

    </div>
    <!-- container-fluid -->
</div>
@endsection