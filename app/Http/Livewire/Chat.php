<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Chat extends Component
{
     public function render()
     {
          $d = Product::get();
          return view('livewire.chat', ['products' => $d]);
     }
}
