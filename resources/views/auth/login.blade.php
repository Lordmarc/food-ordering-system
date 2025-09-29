<x-layout>
<h1>Sign In</h1>
<form action="{{ route('login') }}" method="POST">
  @csrf

  <label for="email">Email Address</label>
  <input type="email" name="email" required>

  <label for="password">Password</label>
  <input type="password" name="password">

  <button>Sign In</button>
  <div>
  <p>Don't have an account?</p>
  <a href="{{ route('show.signup') }}">Signup</a>
  </div>
</form>
</x-layout>