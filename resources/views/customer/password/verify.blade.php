<x-layout>
<div class="rounded h-full flex justify-center items-center">

  <div class="max-w-md w-full flex justify-center items-center bg-white border border-gray-300 shadow-md rounded-md relative p-4">
      <form action="{{ route('customer.verify.password') }}" method="POST" class="w-sm h-60 flex flex-col justify-around items-center ">
      @csrf
        <h2 class="text-2xl text-slate-600">Verify your Password</h2>
        @if(session('password'))
          <div class="flex items-center gap-1 p-1 border border-red-300 w-full rounded">
            <i class="fa-solid fa-circle-exclamation text-red-500"></i>
          
            <h2 class="text-red-500">{{ session('password') }}</h2>
          </div>
          
        @endif
        <div class="flex items-center w-full border border-gray-300">
        <input type="password" name="password" required class="verify-password block border-r border-r-gray-300  p-2 outline-amber-500 w-full flex-1 text-slate-500" placeholder="Enter your current password to verify">
        <div class="show-password cursor-pointer p-2">
        <i class="fa-solid fa-eye text-slate-500"></i>
        </div>
        </div>
        
        <button type="submit" class="bg-amber-500 text-white rounded w-full py-2 cursor-pointer hover:bg-amber-400">CONFIRM</button>
      </form>
      <i class="fa-solid fa-arrow-left-long absolute top-4 left-3 text-2xl text-amber-500 hover-bounce-x cursor-pointer"></i>
  </div>

</div>
</x-layout>