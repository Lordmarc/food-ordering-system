<div class="flex-1 ">

    <div class="flex flex-col gap-2 text-slate-500 font-semibold">
      <div id="profile-btn" class="cursor-pointer hover:text-amber-500">My Account</div>
      <div id="profile-toggle" class=" flex flex-col ml-3 gap-2 hidden">
        <a href="{{ route('customer.profile') }}" class="cursor-pointer hover:text-amber-500">Profile</a>
        <a href="{{ route('customer.address') }}" class="cursor-pointer hover:text-amber-500">Address</a>
        <a href="{{ route('customer.verify') }}" class="cursor-pointer hover:text-amber-500">Change Password</a>
      </div>

    <a href="{{ route('customer.orders') }}" class="cursor-pointer hover:text-amber-500">My Order</a>
    </div>
</div>