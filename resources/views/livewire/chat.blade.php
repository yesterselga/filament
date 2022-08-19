<div>
     <ul>
          @foreach ($products as $item)
          <li>{{$item->name}}</li>
          @endforeach
     </ul>
</div>