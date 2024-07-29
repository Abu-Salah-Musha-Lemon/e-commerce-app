@extends('admin.layouts.layout')
@section('main')

<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Add Products</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-12">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add Products</h5>
        <small class="text-body float-end">Add Products</small>
      </div>
      <div class="card-body">
        <form>
          <div class="row">

          <div class="col-md-3">
            <style>
              
            </style>
            	<!-- Photo -->
<div class="form-group my-2">
    <div class="input-group mb-3" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <div class="input-group-prepend">
            <span>Product Photo</span>
        </div>
        <img id="image"
            style="width: 190px; height: 190px; border-radius: 16px; border: 1px solid rgba(0, 0, 0, 0.1);">

        <div class="fileUpload btn btn-success" style="margin-top: 10px; position: relative; display: inline-block;">
            <span id="uploadButton" style="cursor: pointer;">
                <i class="ion-upload m-r-5"></i> Upload
            </span>
            <input type="file" name="photo" id="photo" accept="image/*" class="upload" style="display: none;"
                onchange="readURL(this);" required />
        </div>

        <span class='text-danger'>@error('photo'){{ $message }}@enderror</span>
    </div>
</div>

<script>
    document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('photo').click();
    });
</script>

          </div>

            <div class="col-md-4">

              <div class="mb-6">
                <label class="form-label" for="basic-default-fullname">Product Name</label>
                <input type="text" class="form-control @error('product_name') @enderror" name="product_name"
                  placeholder="Enter Name" value="{{old('product_name')}}" required>
                <span class='text-danger'>@error('product_name'){{ $message }}@enderror</span>
              </div>

              <div class="mb-6">
                <label class="form-label" for="basic-default-fullname">Product Short Description</label>
                <input type="text" class="form-control @error('product_short_des') @enderror" name="product_short_des"
                  placeholder="Enter Name" value="{{old('product_short_des')}}" required>
                <span class='text-danger'>@error('product_short_des'){{ $message }}@enderror</span>
              </div>

              <div class="mb-6">
                <label class="form-label" for="basic-default-fullname">Product Description</label>
                <input type="text" class="form-control @error('product_des') @enderror" name="product_des"
                  placeholder="Enter Name" value="{{old('product_des')}}" required>
                <span class='text-danger'>@error('product_des'){{ $message }}@enderror</span>
              </div>

              <div class="mb-6">
                <label class="form-label" for="basic-default-fullname">Product Price</label>
                <input type="text" class="form-control @error('product_price') @enderror" name="product_price"
                  placeholder="Enter Name" value="{{old('product_price')}}" required>
                <span class='text-danger'>@error('product_price'){{ $message }}@enderror</span>
              </div>
             

            </div>
            <div class="col-md-4">
              
              <div class="mb-6">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
                <div class="col-sm-10">
                  <select name="category" id="category" class="form-select" aria-label="Default select example">
                    <option selected> Select Category</option>
                    <option value='1'> Rice</option>
                    <option value='1'> SoftDrink</option>
                  </select>
                </div>
              </div>
              
              <div class="mb-6">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Sub Category</label>
                <div class="col-sm-10">
                  <select name="subCategory" id="subCategory" class="form-select" aria-label="Default select example">
                    <option selected> Select Sub Category</option>
                    <option value='1'> Rice</option>
                    <option value='1'> SoftDrink</option>
                  </select>
                </div>
              </div>

              <div class="mb-6">
                <label class="form-label" for="basic-default-fullname">Product Description</label>
                <input type="text" class="form-control @error('product_des') @enderror" name="product_des"
                  placeholder="Enter Name" value="{{old('product_des')}}" required>
                <span class='text-danger'>@error('product_des'){{ $message }}@enderror</span>
              </div>


              <div class="mb-6">
                <label class="form-label" for="basic-default-message">Message</label>
                <textarea id="basic-default-message" class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
              </div>

            </div>
          </div>
          <button type="submit" center class="btn btn-primary text-center">Send</button>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection