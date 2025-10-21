<div class="flex flex-col gap-2 bg-white h-full">

<a href="{{ route('admin.dashboard') }}" class="item-nav">Dashboard</a>
<div class="item-nav">
  <div class="flex items-center justify-between">
    <a href="">Categories</a>
    <button class="view-item text-2xl cursor-pointer">+</button>
  </div>
  
  <div class="menu-item hidden">
    <a href="{{ route('admin.category') }}">All Categories</a>
    <a href="{{ route('admin.show.category') }}">Add New Category</a>
  </div>
</div>

<div class="item-nav">
  <div class="flex items-center justify-between">
    <a href="">Menu Items</a>
    <button class="view-item text-2xl cursor-pointer">+</button>
  </div>
  
  <div class="menu-item hidden">
    <a href="{{ route('admin.menuitem') }}">All Items</a>
    <a href="{{ route('admin.show.item') }}">Add New Item</a>
  </div>
</div>
<div class="item-nav">
  <div class="flex items-center justify-between">
    <a href="">Customer</a>
    <button class="view-item text-2xl cursor-pointer">+</button>
  </div>
  
  <div class="menu-item hidden">
    <a href="">Customers</a>
  </div>
</div>
<div class="item-nav">
  <div class="flex items-center justify-between">
    <a href="">Staff</a>
    <button class="view-item text-2xl cursor-pointer">+</button>
  </div>
  
  <div class="menu-item hidden">
    <a href="">Staff</a>
    <a href="">Add New Staff</a>
  </div>
</div>

<a href="{{ route('admin.order') }}" class="item-nav">Orders</a>
</div>

</div>