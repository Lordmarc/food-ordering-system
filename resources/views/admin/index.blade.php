<x-admin-layout>
  <div class="container mx-auto p-6 bg-white h-full">
    {{-- total widgets --}}
    <div class="grid grid-cols-4 gap-2">
       <x-card-component title="Total Revenue" amount="P 1,2000" />
 
       <x-card-component title="Total Orders" amount="100" />
      
       <x-card-component title="Total Menu Items" amount="500" />
       
       <x-card-component title="Total Customers" amount="150" />
        
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
