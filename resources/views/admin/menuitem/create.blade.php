<x-admin-layout>
  <div class="container w-full mx-auto p-6 bg-white h-full">
    <h2>Menu Item</h2>

    <form action="{{ route('admin.store.item') }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
      <div>
        <label for="name">Name</label>
        <input type="text" name="name" required>
      </div>

      <div>
        <label for="price">Price</label>
        <input type="number" name="price" required step="0.01">
      </div>
      <div>
      <label for="category">Category</label>
     
        <select name="category_id" id="category">
        <option value="" disabled selected>Select Category</option>
         @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      
      <div>
        <label for="image">Upload Image</label>
        <input type="file" name="image" id="image" accept="image/*">
      </div>
      
      <button>Save</button>
    </form>
  </div>
</x-admin-layout>