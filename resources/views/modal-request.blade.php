<div class="modal fade modal-fullscreen" id="modalRequest" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

               <div class="modal-header">
                    <h5 class="modal-title">I'm requesting for</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeRequest()"
                         aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>

               <div class="modal-body">
                    <div class="row">
                         <div class="col">
                              <button class="btn btn-option" onclick="addRequest()"><i class="fa fa-person"></i>
                                   Condiments</button>
                              <button class="btn btn-option" onclick="addRequest()"><i class="fa fa-utensil-spoon"></i>
                                   Spoon & Fork</button>
                              <button class="btn btn-option" onclick="addRequest()"><i class="fa fa-receipt"></i>
                                   Catsup</button>
                              <button class="btn btn-option" onclick="addRequest()"><i class="fa fa-receipt"></i>
                                   Soup</button>
                              <button class="btn btn-option" onclick="addRequest()"><i class="fa fa-receipt"></i>
                                   Table Cleaning</button>

                              <p>Other Request:</p>
                              <textarea class="form-control" id="" cols="30" rows="3"
                                   placeholder="Enter your request..."></textarea>
                              <button class="btn btn-option" onclick="addRequest()">Submit</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>