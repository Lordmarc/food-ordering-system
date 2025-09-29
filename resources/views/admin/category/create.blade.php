<x-admin-layout>
  <div class="containe mx-auto p-6 bg-white h-full">
  <h2 class="text-gray-700 text-3xl mb-5">Category</h2>
  
    <form action="{{ route('admin.store.category') }}" method="POST" class="form">
  @csrf
  <div>
    <label for="name">Category Name</label>
    <input type="text" name="name" required>
  </div>
  
    
    <button>Save</button>
  </form>


  </div>



</x-admin-layout>