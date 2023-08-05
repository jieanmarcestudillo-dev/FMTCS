
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="d-flex justify-content-end p-2">
        <button class="btn btn-light" data-bs-dismiss="modal" id="details_close_btn">
          <i class="bi bi-x" style="font-size:1.5rem"></i>
        </button>
      </div>
        <div class="modal-body">
            <div class="row p-2">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="d-flex justify-content-center">
                  <img id="details_img" class="card-img-top" alt="Card Image" style=" margin: 0 auto">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <p class="text-muted" id="details_category"></p>
                <input type="text" name="" id="details_id" hidden>
                <h2 class="card-text mt-0 fs-4 fw-bold" id="details_name">GEARS</h2>
                <h2 style="color:#0C25B6">Php <span id="details_price"></span></h2>
                <p class="text-muted">Items in Stock: <span id="details_stock"></span></p>
                <p style="text-align:justify;" id="details_description">
                </p>
                <div class="row">
                  <div class="col-5">
                    <div class="input-group mb-3">
                      <button class="btn btn-outline-secondary" type="button" onclick="minusCount()">-</button>
                      <input type="number" class="form-control text-center" value="0" disabled id="product_count">
                      <button class="btn btn-outline-secondary" type="button" onclick="addCount()">+</button>
                    </div>
                  </div>
                  <div class="col-7">
                    <button type="button" style="background-color:#0C25B6" class=" btn text-white rounded-0 form-control" onclick="addToCart()">ADD TO CART</button>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>