<x-admin-layout>
<div id="dashboard" data-stats-url="{{ route('admin.dashboard.stats') }}"></div>

  <div class="container mx-auto p-6 bg-white h-full">
    {{-- total widgets --}}
    <div class="grid grid-cols-4 gap-2">
       <x-card-component title="Total Revenue" amount="P {{ $totalRevenues }}" id="revenue-card" />
 
       <x-card-component title="Total Orders" amount="{{ $totalOrders }}" id="orders-card" />
      
       <x-card-component title="Total Menu Items" amount="{{ $totalMenuItems }}" id="menu-card" />
       
       <x-card-component title="Total Customers" amount="{{ $totalCustomers }}" id="customers-card" />
        
    </div>

    {{-- chart with best selling menu item --}}
    <div>
    <div>
      <h2>Best Selling</h2>
      <ul>
        <li>Burger</li>
        <li>Fries</li>
        <li>Coke</li>
      </ul>
    </div>

    <div>
    
    </div>
    
    </div>

  
  </div>
</x-admin-layout>

 