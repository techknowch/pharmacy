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
                     <li class="breadcrumb-item active">Orders Form</li>
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
               <h4 class="card-title mb-0 flex-grow-1">Orders Form</h4>
               <a href="{{ route('orders.index') }}" class="btn btn-success" id="addproduct-btn"><i class=" ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
            <div class="card-body">
               <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                     <label for="customerName" class="form-label">Customer Name</label>
                     <input type="text" class="form-control" name="customer_name" id="customerName" required>
                  </div>
                  <div class="mb-3">
                     <label for="customerAddress" class="form-label">Customer Address</label>
                     <input type="text" class="form-control" name="customer_address" id="customerAddress" required>
                  </div>
                  <div class="mb-3">
                     <label for="customerPhone" class="form-label">Customer Phone</label>
                     <input type="text" class="form-control" name="phone" id="customerPhone" required>
                  </div>
                  <div class="mb-3" id="productrow">
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="products" class="form-label">Select Products</label>
                           <select id="products" class="form-select" name="product_id" required>
                              @forelse($products as $product)
                              <option value="{{ $product->id }}">{{ $product->name }}</option>
                              @empty
                              <option value="uncategorized">No products available</option>
                              @endforelse
                           </select>
                        </div>
                        <div class="col-lg-3">
                           <label for="quantiy" class="form-label">Quantity</label>
                           <input type="number" class="form-control" name="quantity" id="quantiy" required>
                        </div>
                        <div class="col-lg-3">
                           <label for="price" class="form-label">Price</label>
                           <input type="number" class="form-control" name="itemprice" id="price" required>
                        </div>
                        <div class="col-lg-3">
                           <label for="subtotal" class="form-label">Sub Total</label>
                           <input type="number" class="form-control" name="subtotal" id="subtotal" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="mb-3">
                        <div class="col-lg-12">
                           <div class="">
                              <label for="grandtotal" class="form-label">Grand Total</label>
                              <input type="number" class="form-control" name="total_price" id="grandtotal" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="">
                        <button type="submit" class="btn btn-primary">Submit Order</button>
                     </div>
                  </div>
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
