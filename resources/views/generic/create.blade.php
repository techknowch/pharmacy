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
                            <li class="breadcrumb-item active">Medicine Generic</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">Medicine Generic Form</h4>
                    <a href="{{ route('medicine-generics.index') }}" class="btn btn-success" id="addproduct-btn"><i class=" ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
                </div>
                <div class="card-body">


                    <form action="{{ route('medicine-generics.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Generic Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your catgeory" id="firstNameinput" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Status</label>
                                    <select id="ForminputState" class="form-select" name="status" required>
                                        <option selected>Choose...</option>
                                        <option value="publish">Publish</option>
                                        <option value="unpublish">Unpublish</option>
                                    </select>
                                </div>
                            </div><!--end col-->
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