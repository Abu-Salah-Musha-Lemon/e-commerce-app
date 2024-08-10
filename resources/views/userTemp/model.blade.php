<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{route('shoppingAddress')}}" method="get">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Present Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Display the current product details -->
            <div class="col-lg-12 col-sm-4">

              <div class="form-control">
                <label for="">Phone Number</label>
                <input type="tel" name="phoneNumber" id="" class="form-control" placeholder="Enter your Phone Number">

                <label for="">Present Address ( City/ Village)</label>
                <input type="text" name="presentAddress" id="" class="form-control"
                  placeholder="Enter your Present Address">

                <label for="">Postal Code</label>
                <input type="text" name="postalCode" id="" class="form-control" placeholder="Enter your Postal Code">

              </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </form>
  </div>
</div>