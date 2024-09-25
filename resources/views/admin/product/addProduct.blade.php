@extends('admin.layouts.layout')

@section('main')

<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Create Product</h4>
<div class="row">
	<div class="col-xl">
		<div class="card mb-12">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h5 class="mb-0">Create Product</h5>
				<small class="text-body float-end">Create New Product</small>
			</div>
			<div class="card-body">
				<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="row">

						<div class="col-md-3">
							<style>
								.fileUpload {
									position: relative;
									overflow: hidden;
								}

								.fileUpload input.upload {
									position: absolute;
									top: 0;
									right: 0;
									margin: 0;
									padding: 0;
									font-size: 20px;
									cursor: pointer;
									opacity: 0;
									filter: alpha(opacity=0);
								}
							</style>
							<!-- Photo -->
							<div class="form-group my-2">
								<div class="input-group mb-3"
									style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
									<div class="input-group-prepend">
										<span>Product Photo</span>
									</div>
									
									<img id="image" src=""
										style="width: 190px; height: 190px; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.1);">

									<div class="fileUpload btn btn-success"
										style="margin-top: 10px; position: relative; display: inline-block;">
										<span id="uploadButton" style="cursor: pointer;">
											<i class="ion-upload m-r-5"></i> Upload
										</span>
										<input type="file" name="product_img" id="image" accept="image/*" class="upload"
											style="width: 80px; height: 40px;" onchange="readURL(this);" />
									</div>

									<span class='text-danger'>@error('product_img'){{ $message }}@enderror</span>
								</div>
							</div>
							<!-- Photo
								<div class="form-group">
									<div class="text-center">
										<span>Product Photo</span>
										<img id="image"
											style="width: 190px; height: 190px; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.1)">
										<div class="fileUpload btn btn-success mt-2">
											<span><i class="ion-upload mr-2"></i>Upload</span>
											<input type="file" name="photo" id="photo" accept="image/*" class="upload form-control"
												onchange="readURL(this);" required/>
										</div>
										<br><span class='text-danger'>@error('photo'){{ $message }}@enderror</span>
									</div>
								</div> -->
							@section('script')
							<script>
								// document.getElementById('uploadButton').addEventListener('click', function () {
								//     document.getElementById('product_img').click();
								// });

								// function readURL(input) {
								//     if (input.files && input.files[0]) {
								//         var reader = new FileReader();
								//         reader.onload = function (e) {
								//             document.getElementById('image').src = e.target.result;
								//             document.getElementById('image').style.width = '190px';
								//             document.getElementById('image').style.height = '190px';
								//             document.getElementById('image').style.borderRadius = '16px';
								//         };
								//         reader.readAsDataURL(input.files[0]);
								//     }
								// }
							</script>
							@endsection
						</div>

						<div class="col-md-4">

							<div class="mb-6">
								<label class="form-label" for="product_name">Product Name</label>
								<input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name"
									placeholder="Enter Name" value="{{ old('product_name') }}" required>
								<span class='text-danger'>@error('product_name'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_short_des">Product Short Description</label>
								<input type="text" class="form-control @error('product_short_des') is-invalid @enderror"
									name="product_short_des" placeholder="Enter Short Description" value="{{ old('product_short_des') }}"
									required>
								<span class='text-danger'>@error('product_short_des'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_des">Product Description</label>
								<textarea class="form-control @error('product_des') is-invalid @enderror" name="product_des"
									placeholder="Enter Description" required>{{ old('product_des') }}</textarea>
								<span class='text-danger'>@error('product_des'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_price">Product Price</label>
								<input type="text" class="form-control @error('product_price') is-invalid @enderror"
									name="product_price" placeholder="Enter Price" value="{{ old('product_price') }}" required>
								<span class='text-danger'>@error('product_price'){{ $message }}@enderror</span>
							</div>

						</div>

						<div class="col-md-4">

							<div class="mb-6">
								<label class="form-label" for="product_category_id">Category</label>
								<select name="product_category_id" id="product_category_id" class="form-select">
									<option selected>Select Category</option>
									@foreach ($categories as $items)
									<option value="{{ $items->id }}" name="product_category_name">
										 {{ $items->category_name }}
									</option>
									@endforeach
								</select>
								<span class='text-danger'>@error('product_category_id'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_subcategory_id">Sub Category</label>
								<select name="product_subcategory_id" id="product_subcategory_id" class="form-select">
									<option value="">Select Sub Category</option>
									@foreach ($subcategories as $subcategory)
									<option value="{{ $subcategory->id }}"  name="product_subcategory_name">
										{{ $subcategory->subcategory_name }}
									</option>
									@endforeach
								</select>
								<span class='text-danger'>@error('product_subcategory_id'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_quantity">Product Quantity</label>
								<input type="number" class="form-control @error('product_quantity') is-invalid @enderror"
									name="product_quantity" placeholder="Enter Quantity" value="{{ old('product_quantity') }}" required>
								<span class='text-danger'>@error('product_quantity'){{ $message }}@enderror</span>
							</div>

						</div>

					</div>

					<button type="submit" class="btn btn-primary">Create Product</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection