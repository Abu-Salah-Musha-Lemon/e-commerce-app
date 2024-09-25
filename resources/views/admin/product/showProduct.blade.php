<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalProductName"></span></p>
                <p><strong>Price:</strong> <span id="modalProductPrice"></span></p>
                <p><strong>Quantity:</strong> <span id="modalProductQuantity"></span></p>
                <p><strong>Description:</strong><br> <span id="modalProductDescription"></span></p>
                <p><strong>Image:</strong></p>
                <img id="modalProductImage" src="" alt="Product Image" class="img-fluid"	style="width: 190px; height: 190px; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.1);">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
	function showProductDetails(id, name, price, quantity, description, image) {
			// Update the modal content
			document.getElementById('modalProductName').innerText = name;
			document.getElementById('modalProductPrice').innerText = '$' + price;
			document.getElementById('modalProductQuantity').innerText = quantity;
			document.getElementById('modalProductDescription').innerText = description;
			document.getElementById('modalProductImage').src = image || '{{ asset('products/' . $product->product_img) }}';

			// Show the modal
			var modal = new bootstrap.Modal(document.getElementById('productModal'));
			modal.show();
	}
</script>