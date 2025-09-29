<x-admin-layout>
<div class="container w-full h-full bg-white p-6 mx-auto">
<div class="flex flex-col gap-5 p-2 flex-wrap justify-center h-full items-center">
  {{-- menu categories --}}
  <div class="flex gap-5">
  <div class="px-3 py-2 bg-slate-200 rounded-md cursor-pointer">All</div>

  @foreach($categories as $category)
    <div class="px-3 py-2 bg-slate-200 rounded-md cursor-pointer">{{ $category->name }}</div>
  @endforeach
</div>

  {{-- menu item --}}
  <div class="overflow-y-auto mx-auto w-full flex-1 grid grid-cols-5 gap-5 p-2">
  @foreach($menuItems as $item)
  <x-item-component :item="$item" name="{{$item->name}}" price="{{ $item->price }}" image="{{ asset('storage/' . $item->image) }}"/>
  @endforeach
 
  </div>
</div>


</div>
</x-admin-layout>