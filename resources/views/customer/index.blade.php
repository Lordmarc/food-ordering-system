<x-layout>
<div class="container w-full h-full bg-white p-6 mx-auto">
  <div class="flex gap-2 items-center  w-full overflow-x-auto scrollbar-hide">
    <div class="categories">
      All
    </div>
    @foreach($categories as $category)
      <div class="categories">{{ $category->name }}</div>
    @endforeach


  </div>
      <div class="menu-items">
      @foreach($menuItems as $item)
        <div class=" w-full shadow-lg h-64 rounded-md overflow-hidden hover:scale-105 duration-75 transition ease-in-out relative">
        
          <div class="h-40">
              
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-full w-full">
          </div>
          <div class="p-2 flex flex-col justify-between h-24">
          
              <h3>{{ $item->name }}</h3>
              <div class="text-end text-gray-500">
              <i class="fa-solid fa-peso-sign"></i><span>{{ $item->price }}</span>
              </div>
              
          </div>
          
      </div>
      @endforeach
    
    </div>
</div>

</x-layout>