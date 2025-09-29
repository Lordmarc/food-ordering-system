<x-admin-layout>
  <div class="container w-full mx-auto p-6 bg-white h-full">
    <h2>Menu Item</h2>

    <form action="{{ route('admin.update.item', $menuItem) }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
      <div>
        <label for="name">Name</label>
        <input type="text" name="name" required value="{{ $menuItem->name }}">
      </div>

      <div>
        <label for="price">Price</label>
        <input type="number" name="price" required step="0.01" value="{{ $menuItem->price }}">
      </div>
      <div>
      <label for="category">Category</label>
     
        <select name="category_id" id="category">
        <option value="" disabled selected>Select Category</option>
         @foreach($categories as $category)
            <option value="{{ $category->id }}" 
              {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
      
      <div>
        <label for="image">Upload Image</label>
        <input type="file" name="image" id="image" accept="image/*" value="{{ $menuItem->image }}">
      </div>
      
      <button>Update</button>
    </form>
  </div>
</x-admin-layout>