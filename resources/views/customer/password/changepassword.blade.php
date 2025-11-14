<x-layout>
<div class="container mx-auto flex flex-row gap-3 h-full">
<x-sidebar-link/>
<div class="flex-2 bg-white p-2 rounded">
  <h3>Change Password</h3>
  <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
  
  <div class="w-full">
    <form action="" class="max-w-sm">
    <div class="relative">
        <input class="new-password" type="password" name="newpassword" placeholder="New Password" required>
        <div class="eye-container absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer">
              <i class="fa-solid fa-eye"></i>
        </div>
    
    </div>
    <div class="relative">
      <input class="new-password" type="password" name="confirmpassword" placeholder="Confirm Password" required>
       <div class="eye-container absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer">
              <i class="fa-solid fa-eye"></i>
        </div>
    </div>
      <button type="submit" class="change-password">Change Password</button>
    </form>
  </div>
</div>


</x-layout>