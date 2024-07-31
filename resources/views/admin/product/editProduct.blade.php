@extends('admin.layouts.layout')

@section('main')

<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Edit Product</h4>
<div class="row">
	<div class="col-xl">
		<div class="card mb-12">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h5 class="mb-0">Edit Product</h5>
				<small class="text-body float-end">Edit Product</small>
			</div>
			<div class="card-body">
				<form action="{{ route('product.update', $product->id) }}" method="get" enctype="multipart/form-data">
					@csrf
					@method('GET')

					<div class="row">

						<div class="col-md-3">
							<!-- Photo -->
							<div class="form-group my-2">
								<div class="input-group mb-3"
									style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
									<div class="input-group-prepend">
										<span>Product Photo</span>
									</div>
									<img id="image" src="{{ $product->product_img ? asset('products/' . $product->product_img) : '' }}"
										style="width: 190px; height: 190px; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.1);">

									<div class="fileUpload btn btn-success"
										style="margin-top: 10px; position: relative; display: inline-block;">
										<span id="uploadButton" style="cursor: pointer;">
											<i class="ion-upload m-r-5"></i> Upload
										</span>
										<input type="file" name="product_img" id="product_img" accept="image/*" class="upload"
											style="display: none;" />
									</div>

									<span class='text-danger'>@error('product_img'){{ $message }}@enderror</span>
								</div>
							</div>

							<script>
								document.getElementById('uploadButton').addEventListener('click', function () {
									document.getElementById('product_img').click();
								});
							</script>
						</div>

						<div class="col-md-4">

							<div class="mb-6">
								<label class="form-label" for="product_name">Product Name</label>
								<input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name"
									placeholder="Enter Name" value="{{ old('product_name', $product->product_name) }}" required>
								<span class='text-danger'>@error('product_name'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_short_des">Product Short Description</label>
								<input type="text" class="form-control @error('product_short_des') is-invalid @enderror"
									name="product_short_des" placeholder="Enter Short Description"
									value="{{ old('product_short_des', $product->product_short_des) }}" required>
								<span class='text-danger'>@error('product_short_des'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_des">Product Description</label>
								<textarea class="form-control @error('product_des') is-invalid @enderror" name="product_des"
									placeholder="Enter Description" required>{{ old('product_des', $product->product_des) }}</textarea>
								<span class='text-danger'>@error('product_des'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_price">Product Price</label>
								<input type="text" class="form-control @error('product_price') is-invalid @enderror"
									name="product_price" placeholder="Enter Price"
									value="{{ old('product_price', $product->product_price) }}" required>
								<span class='text-danger'>@error('product_price'){{ $message }}@enderror</span>
							</div>

						</div>

						<div class="col-md-4">

							<div class="mb-6">
								<label class="form-label" for="product_category_id">Category</label>
								<select name="product_category_id" id="product_category_id" class="form-select">
									<option selected>Select Category</option>
									
									@foreach ($categories as $category)
									<option value="{{ $category->id }}" {{ $category->id === $product->product_category_id ? 'selected' :'' }}>
										{{ $category->category_name }}
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
									<option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->product_subcategory_id ?
										'selected' : '' }}>
										{{ $subcategory->subcategory_name }}
									</option>
									@endforeach
								</select>
								<span class='text-danger'>@error('product_subcategory_id'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="product_quantity">Product Quantity</label>
								<input type="number" class="form-control @error('product_quantity') is-invalid @enderror"
									name="product_quantity" placeholder="Enter Quantity"
									value="{{ old('product_quantity', $product->product_quantity) }}" required>
								<span class='text-danger'>@error('product_quantity'){{ $message }}@enderror</span>
							</div>

							<div class="mb-6">
								<label class="form-label" for="slug">Slug</label>
								<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
									placeholder="Enter Slug" value="{{ old('slug', $product->slug) }}">
								<span class='text-danger'>@error('slug'){{ $message }}@enderror</span>
							</div>

						</div>

					</div>

					<button type="submit" class="btn btn-primary">Update Product</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection