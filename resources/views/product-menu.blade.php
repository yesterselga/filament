<div data-bs-spy="scroll" data-bs-target="#navbar-category" data-bs-offset="0" class="scrollspy-example" tabindex="0">

     <div class="divider"></div>
     <div id="category-chicken">
          <h2 class="category-heading">Chicken</h2>
          <?php for ($i = 1; $i <= 10; $i++) { ?>
          <div class="row product" onclick="selectProduct()">
               <div class="col-4 no-padding">
                    <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvUGdoOGJqODRwTDRiZXJGNzY2aUM5LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6ODAwLCJoZWlnaHQiOjgwMCwiZml0IjoiY292ZXIifX19"
                         alt="" class="img-fluid product-image">
               </div>
               <div class="col-8">
                    <div class="name">Chicken Product {{ $i }}</div>
                    <div class="description">Half Slab Rib and 1/4 Roasted or OMG Unfried Fried Chicken...
                    </div>
                    <span class="price">₱265.00</span>
               </div>
          </div>
          <?php } ?>
     </div>

     <div class="divider"></div>
     <div id="category-pork">
          <h2 class="category-heading">Pork</h2>
          <?php for ($i = 1; $i <= 10; $i++) { ?>
          <div class="row product" onclick="selectProduct()">
               <div class="col-4 no-padding">
                    <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvUGdoOGJqODRwTDRiZXJGNzY2aUM5LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6ODAwLCJoZWlnaHQiOjgwMCwiZml0IjoiY292ZXIifX19"
                         alt="" class="img-fluid product-image">
               </div>
               <div class="col-8">
                    <div class="name">Pork Product {{ $i }}</div>
                    <div class="description">Half Slab Rib and 1/4 Roasted or OMG Unfried Fried Chicken...
                    </div>
                    <span class="price">₱265.00</span>
               </div>
          </div>
          <?php } ?>
     </div>


     <div class="divider"></div>
     <div id="category-beef">
          <h2 class="category-heading">Beef</h2>
          <?php for ($i = 1; $i <= 10; $i++) { ?>
          <div class="row product" onclick="selectProduct()">
               <div class="col-4 no-padding">
                    <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvUGdoOGJqODRwTDRiZXJGNzY2aUM5LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6ODAwLCJoZWlnaHQiOjgwMCwiZml0IjoiY292ZXIifX19"
                         alt="" class="img-fluid product-image">
               </div>
               <div class="col-8">
                    <div class="name">Beef Product {{ $i }}</div>
                    <div class="description">Half Slab Rib and 1/4 Roasted or OMG Unfried Fried Chicken...
                    </div>
                    <span class="price">₱265.00</span>
               </div>
          </div>
          <?php } ?>
     </div>


</div>