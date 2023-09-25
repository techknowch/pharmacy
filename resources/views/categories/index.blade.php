@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Categories</h4>

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
                                @forelse($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    @if($category->status === 'publish')
                                    <td><i class="ri-checkbox-circle-line align-middle text-success"></i> Published</td>
                                    @else
                                    <td><i class="ri-indeterminate-circle-line  align-middle text-danger"></i> Unpublished</td>
                                    @endif
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            {{-- <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a> --}}
                                            <a href="javascript:void(0);" class="link-danger fs-15 delete-category" data-id="{{ $category->id }}" data-confirm="Are you sure you want to delete this category?">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th>No data</th>
                                    <td>No data</td>
                                    <td>No data</td>
                                    <td>No data</td>
                                    <td>No data</td>
                                    <td>No data</td>
                                </tr>
                                @endforelse
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

@section('scripts')

<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteLinks = document.querySelectorAll(".delete-category");

        deleteLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();

                const categoryId = link.getAttribute("data-id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: "Yes, delete it!",
                    buttonsStyling: false,
                    showCloseButton: true,
                }).then(function(result) {
                    if (result.value) {
                        // User confirmed the deletion, send an AJAX request
                        fetch(`/categories/${categoryId}`, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}", // Include the CSRF token
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your category has been deleted.",
                                        icon: "success",
                                        confirmButtonClass: "btn btn-primary w-xs mt-2",
                                        buttonsStyling: false,
                                    }).then(function() {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Failed to delete the category.",
                                        icon: "error",
                                        confirmButtonClass: "btn btn-primary w-xs mt-2",
                                        buttonsStyling: false,
                                    });
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                            });
                    }
                });
            });
        });
    });
</script>
@endsection