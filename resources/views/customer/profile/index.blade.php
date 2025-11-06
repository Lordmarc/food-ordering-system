<x-layout>

<div class="container mx-auto flex flex-row gap-3 h-full">

<div class="flex-1 ">

    <div class="flex flex-col gap-2 text-slate-500 font-semibold">
      <a href="{{ route('customer.profile') }}" id="profile-btn" class="cursor-pointer hover:text-amber-500">My Account</a>
      <div id="profile-toggle" class=" flex flex-col ml-3 gap-2 hidden">
        <a href="" class="cursor-pointer hover:text-amber-500">Profile</a>
        <a href="" class="cursor-pointer hover:text-amber-500">Address</a>
        <a href="" class="cursor-pointer hover:text-amber-500">Change Password</a>
      </div>

    <a href="{{ route('customer.order') }}" class="cursor-pointer hover:text-amber-500">My Order</a>
    </div>
</div>
  <div id="content" class="w-3/4 p-2 h-full bg-white">
    <div>
      <h3>My Profile</h3>
    </div>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
  </div>



</div>
</x-layout>