@extends('layouts.main')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Starter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Medicine Form</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

    </div>
    <!-- container-fluid -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Medicine Form</h4>
                    <a href="{{ route('medicines.index') }}" class="btn btn-success" id="addproduct-btn"><i class=" ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
                </div>
                <div class="card-body">


                    <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-6">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Select Category</label>
                                    <select id="ForminputState" class="form-select" name="category" required>
                                        <option selected>Choose...</option>
                                        @forelse($category as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @empty
                                        <option value="uncategorized">Uncategorized</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="firstSupplierinput" class="form-label">Medicine Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter medicine name" id="firstSupplierinput" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Numberinput" class="form-label">Purchase price per piece</label>
                                    <input type="number" class="form-control" name="purchase" placeholder="Enter Purchase Price" id="Numberinput" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="SellNumberinput" class="form-label">Selling price per piece</label>
                                    <input type="number" class="form-control" name="selling" placeholder="Enter Selling Price" id="SellNumberinput" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Numberbox" class="form-label">Number of Boxes in Stock</label>
                                    <input type="number" class="form-control" name="box" placeholder="Store Box" id="Numberbox" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Numberitems" class="form-label">Number of Items per box</label>
                                    <input type="number" class="form-control" name="items" placeholder="Items Each Box" id="Numberitems" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Forminputgeneric" class="form-label">Generic name</label>
                                    <select id="Forminputgeneric" class="form-select" name="status" required>
                                        <option selected>Choose...</option>
                                        @forelse($generic as $generic)
                                        <option value="{{ $generic->name }}">{{ $generic->name }}</option>
                                        @empty
                                        <option value="n/a">No generic name</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Forminputsupplier" class="form-label">Supplier name</label>
                                    <select id="Forminputsupplier" class="form-select" name="status" required>
                                        <option selected>Choose...</option>
                                        @forelse($supplier as $supplier)
                                        <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                        @empty
                                        <option value="n/a">No supplier name</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Status</label>
                                    <select id="ForminputState" class="form-select" name="status" required>
                                        <option selected>Choose...</option>
                                        <option value="active">Publish</option>
                                        <option value="inactive">Unpublish</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Medicine Description</span>
                                        <textarea class="form-control" name="description" aria-label="Medicine Description" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Image</label>
                                        <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                        <label for="StartDate" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" name="expiry_date" id="StartDate" required>
                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = "{{ session('success') }}";
        const errorMessage = "{{ session('error') }}";

        if (successMessage) {
            Toastify({
                text: successMessage,
                duration: 3000, // Duration in milliseconds
                gravity: 'top', // Toast position (top, bottom, left, right)
                close: true, // Show close button
                backgroundColor: 'green', // Background color of the toast
            }).showToast();
        } else if (errorMessage) {
            Toastify({
                text: errorMessage,
                duration: 3000, // Duration in milliseconds
                gravity: 'top', // Toast position (top, bottom, left, right)
                close: true, // Show close button
                backgroundColor: 'red', // Background color of the toast
            }).showToast();
        }
    });
</script>


@endsection