<x-partial-layout>

<h3>My Profile</h3>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<div class="w-full ">
  <form action="{{ route('customer.profile.update') }}" class="max-w-lg mx-auto p-2" method="POST">
  @csrf

    <div class="profile-input-container">
      <label for="name">Name</label>
      <input class="profile-input" type="text" name="name" id="name" value="{{$user->name}}">

    </div>

    <div class="profile-input-container">
      <label for="email">Email</label>
      <span>{{ $mask }}</span>
    </div>

    <div class="gender-btn">
      <p>Gender</p>
      <div class="radio-btn">
        
        <input type="radio" name="gender" id="male" value="Male" {{ $user->gender === "Male" ? 'checked' : '' }}>
        <label for="male" >Male</label>
      </div>

      <div class="radio-btn">

        <input type="radio" name="gender" id="female" value="Female" {{ $user->gender === "Female" ? 'checked' : '' }}>
        

        <label for="female">Female</label>
      </div>

    </div>

    <button type="submit" class="bg-amber-500 p-2 w-26 rounded-sm cursor-pointer text-white">Save</button>
  </form>
</div>


</x-partial-layout>