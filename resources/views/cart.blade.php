<div class="modal fade modal-fullscreen" id="modalCart" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeCart()" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">

                    <div class="row requests">
                         <div class="col">
                              <div id="category-pork">
                                   <?php for ($i = 1; $i <= 5; $i++) { ?>
                                   <div class="row product" onclick="selectProduct()">
                                        <div class="col-4 no-padding">
                                             <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvUGdoOGJqODRwTDRiZXJGNzY2aUM5LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6ODAwLCJoZWlnaHQiOjgwMCwiZml0IjoiY292ZXIifX19"
                                                  alt="" class="img-fluid product-image">
                                        </div>
                                        <div class="col-8">
                                             <div class="name">Pork Product {{ $i }}</div>
                                             <div class="description">Half Slab Rib and 1/4 Roasted or OMG Unfried Fried
                                                  Chicken...
                                             </div>
                                             <span class="price">₱265.00</span>
                                             <span class="quantity">Quantity: 1</span>
                                        </div>
                                   </div>
                                   <?php } ?>
                              </div>
                              <div class="divider"></div>
                              <p>Subtotal: ₱2.065.00</p>
                         </div>
                    </div>

                    <div class="row">
                         <div class="col">
                              <button class="btn btn-option" onclick="submitOrder()" data-dismiss="modal"><i
                                        class="fa fa-receipt"></i>
                                   Submit Order</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>