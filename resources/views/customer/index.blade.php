<x-layout>
<div class="container flex flex-col gap-5 w-full h-full bg-white p-6 mx-auto">
  <div class="flex gap-3 items-center  w-full overflow-x-auto scrollbar-hide">
    <div class="categories">
      All
    </div>
    @foreach($categories as $category)
      <div class="categories">{{ $category->name }}</div>
    @endforeach


  </div>
      <div class="menu-items">
      @foreach($menuItems as $item)
      <div class="relative px-2 py-5">
          <div class=" w-full shadow-lg h-72 rounded-md overflow-hidden hover:scale-105 duration-75 transition ease-in-out ">
            <div class="h-40">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-full w-full">
            </div>
            <div class="p-2 flex-col  h-24 flex text-center">
                <h3>{{ $item->name }}</h3>
                <div class=" text-gray-500">
                <i class="fa-solid fa-peso-sign"></i><span>{{ $item->price }}</span>
                </div>
            </div>
        </div>
          <button class="add-to-cart "
          data-id="{{ $item->id }}"
          data-name="{{ $item->name }}"
          data-price="{{ $item->price }}"
          data-image="{{ asset('storage/'. $item->image) }}">
          <i class="fa-solid fa-cart-arrow-down">
          </i></button>
      </div>
    
      @endforeach
    </div>
</div>

</x-layout>