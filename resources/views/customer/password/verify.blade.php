<x-layout>
<div class="bg-white h-full rounded p-2 flex justify-center items-center">
@if(session('password'))
  <h2>{{ session('password') }}</h2>
@endif
  <form action="{{ route('customer.verify.password') }}" method="POST">
  @csrf
    <label for="password">Verify Password</label>
    <input type="password" name="password" required class="block border border-gray-300 outline-amber-500">
    <button type="submit">CONFIRM</button>
  </form>
</div>
</x-layout>