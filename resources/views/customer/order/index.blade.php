<x-layout>
<div id="order-list" data-orders-url="{{ route('customer.fetch.orders') }}"></div>

<div class="container mx-auto flex gap-3
">

<div class="flex-1 ">
    <div class="flex flex-col gap-2 text-slate-500 font-semibold">
      <a href="{{ route('customer.profile') }}" id="profile-btn" class="sidebar-link cursor-pointer hover:text-amber-500">My Account</a>
      <div id="profile-toggle" class=" flex flex-col ml-3 gap-2 hidden">
        <a href="{{ route('customer.profile') }}" class="sidebar-link cursor-pointer hover:text-amber-500">Profile</a>
        <a href="" class="sidebar-link cursor-pointer hover:text-amber-500">Address</a>
        <a href="" class="sidebar-link cursor-pointer hover:text-amber-500">Change Password</a>
      </div>

    <a href="{{ route('customer.order') }}" class="cursor-pointer hover:text-amber-500">My Order</a>
    </div>
</div>

<div id="content" class="order-status flex-3 p-2 h-full">
  <div class="table-layout w-full flex flex-col gap-2">
    <div class="heading bg-white flex text-center shadow-sm rounded-sm">
      <div class="flex-1"><button class="order-status-button bg-amber-500 hover:bg-none" id="all-orders">All</button></div>
      <div class="flex-1"><button class="order-status-button hover:bg-gray-200" id="pending-orders">Pending</button></div>
      <div class="flex-1"><button class="order-status-button hover:bg-gray-200" id="preparing-orders">Preparing</button></div>
      <div class="flex-1"><button class="order-status-button hover:bg-gray-200" id="ready-orders">Ready</button></div>
      <div class="flex-1"><button class="order-status-button hover:bg-gray-200" id="completed-orders">Completed</button></div>
    </div>

    <div id="orders-container" class="all-item flex flex-col gap-2">
      @foreach($orders as $order)
        <div class="bg-white p-4">
          @foreach($order->items as $item)
            <div class="flex justify-between">
              <div class="flex gap-2">
                <img src="{{ asset('storage/' . $item->menuItem->image) }}" alt="" class="h-26 w-40">
                <div class="flex flex-col justify-around">
                  <span >{{ $item->menuItem->name }}</span>
                  <span class="text-slate-500">x{{ $item->quantity }}</span>
                </div>
                
              </div>
              <div>{{ ucfirst($order->status) }}</div>
            </div>
          @endforeach
          <div class="total">
          </div>

        </div>
      @endforeach
    </div>
  </div>
</div>
</div>

</x-layout>