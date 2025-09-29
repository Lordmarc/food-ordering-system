<x-layout>
<h1>Sign Up</h1>
<form action="{{ route('register') }}" method="POST">
  @csrf

  <label for="name">Name</label>
  <input type="text" name="name" required>

  <label for="email">Email Address</label>
  <input type="email" name="email" required>

  <label for="password">Password</label>
  <input type="password" name="password" required>

  <label for="password_confirmation">Confirm Password</label>
  <input type="password" name="password_confirmation" required>

  <button>Sign Up</button>
</form>

</x-layout>