<x-partial-layout>
<div class="w-full flex justify-between p-2 items-center">
  <h3 class="text-xl text-black font-semibold">My Address</h3>
  <button id="add-address-btn" class="p-2 bg-amber-500 text-white cursor-pointer">Add New Address</button>
</div>

<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
<table>
  <thead>
    <tr>
      <th class="text-gray-500">Address</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>
<!-- Overlay -->

</x-partial-layout>
<div id="overlay"
     class="hidden fixed inset-0 bg-gray-500/40 backdrop-blur-sm z-40 pointer-events-none"></div>


<div id="address-form" class="hidden w-96 p-3 rounded fixed top-1/2 left-1/2 z-50 transform -translate-y-1/2 -translate-x-1/2 bg-white">
  <h2 class="text-2xl mb-2">New Address</h2>
  <form action="" class="flex flex-col gap-2 w-full">
    <input type="text" name="region" placeholder="Region" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" name="province" placeholder="Province" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" name="city" placeholder="City" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" name="barangay" placeholder="Barangay" class="text-gray-500 border rounded p-2 border-gray-300">

    <input class="border rounded p-2 border-gray-300 text-gray-500" type="text" name="postal_code" placeholder="Postal Code">
    <input type="text" name="address_name" placeholder="Street Name, Building, House No." class="text-gray-500 border rounded p-2 border-gray-300">

    <button type="submit" class="bg-amber-500 text-white p-2">Save</button>
  </form>
</div>

