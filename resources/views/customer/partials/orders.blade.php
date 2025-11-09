
<div id="order-list" data-orders-url="{{ route('customer.fetch.orders') }}"></div>
<div class="table-layout h-full w-full flex flex-col gap-2">
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
