<x-layout>
<div class="container mx-auto flex flex-row gap-3 h-full">

<x-sidebar-link/>
<div class="flex-2 bg-white rounded p-4">
  <div class="flex justify-between p-2 items-center">
    <h3 class="text-xl text-black font-semibold">My Address</h3>
    <button id="address-btn" type="button" class="cursor-pointer p-2 bg-amber-500 text-white rounded transform transition-all ease-in-out duration-75 hover:bg-amber-600"><i class="fa-solid fa-plus mr-1"></i>Add New Address</button>
  </div>
  <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
  <div class="text-gray-700 font-semibold text-xl mb-2">Address</div>
  <table class="w-full">
    <tbody>
      @foreach($addresses as $address)
        <tr class="border-b border-b-gray-200">
          <td class="flex flex-col p-2">
          <p class="text-black text-[20px]">{{ $user->name }}</p>
          <p><span>{{ $address->address_name }},</span> <span>{{ $address->barangay }}</span> <span>{{ $address->city }}</span></p>
          
         
      
          </td>
          <td>
            <button>Edit</button>
            <button>Delete</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div id="overlay"
     class="hidden fixed inset-0 bg-gray-500/40 backdrop-blur-sm z-40"></div>


<div id="address-form" class="hidden w-96 p-3 rounded fixed top-1/2 left-1/2 z-50 transform -translate-y-1/2 -translate-x-1/2 bg-white">
  <h2 class="text-2xl mb-2">New Address</h2>
  <form action="{{ route('customer.store.address') }}" method="POST" class="flex flex-col gap-2 w-full">
  @csrf
    <input type="text" id="region" name="region" placeholder="Region" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" id="province" name="province" placeholder="Province" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" id="city" name="city" placeholder="City" class="text-gray-500 border rounded p-2 border-gray-300">
    <input type="text" id="barangay" name="barangay" placeholder="Barangay" class="text-gray-500 border rounded p-2 border-gray-300">

    <input class="border rounded p-2 border-gray-300 text-gray-500" type="text" id="postal_code" name="postal_code" placeholder="Postal Code">
    <input type="text" id="address_name" name="address_name" placeholder="Street Name, Building, House No." class="text-gray-500 border rounded p-2 border-gray-300">

    <button type="submit" class="bg-amber-500 text-white p-2">Save</button>
  </form>
</div>
</x-layout>