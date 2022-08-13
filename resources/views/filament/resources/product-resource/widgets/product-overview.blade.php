<x-filament::widget>
    <x-filament::card>

     <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
     
     <div x-data="{ count: 0 }">
          <h1 x-text="count"></h1>
          <button x-on:click="count++">Increment</button>
     </div>
    </x-filament::card>
</x-filament::widget>
