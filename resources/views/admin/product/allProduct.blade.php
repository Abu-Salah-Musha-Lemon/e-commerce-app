@extends('admin.layouts.layout')
@section('main')
<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page / </span>Products</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between">
				<h5 class="card-header">All Products</h5>
				<small class="text-muted float-end"><a href="{{ route('product.create') }}" class="btn btn-success"><i
							class="bi bi-cart-plus"></i></a></small>
			</div>

			<div class="table-responsive" style="margin: 20px;">
				<table id="dataTable" class="table table-striped table-bordered">
					<thead>
						<tr class="text-nowrap">
							<th>#</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Count</th>
							<th>Product Image</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach($products as $product)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $product->product_name }}</td>
							<td>${{ number_format($product->product_price, 2) }}</td>
							<td>{{ $product->product_quantity }}</td>
							<td>
								@if($product->product_img)
								<img src="{{ asset('products/' . $product->product_img) }}" alt="{{ $product->product_name }}"
									width="40" height="40">
								@else
								<img src="{{ asset('images/placeholder.png') }}" alt="No Image" width="40" height="40">
								@endif
							</td>
							<td>
								<a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-primary"><i
										class="bi bi-pencil-square"></i></a>
								<a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-secondary"><i
										class="bi bi-eye"></i></a>
								<form action="{{ route('product.destroy', $product->id) }}" method="GET" style="display:inline;">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')"><i
											class="bi bi-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>
@section('script')
<script>
	$(document).ready(function () {
		initializeDataTable(['Product Name', 'Product Price', 'Product Count']);
	});
</script>
@endsection
@endsection