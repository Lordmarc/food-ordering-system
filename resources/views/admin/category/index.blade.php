<x-admin-layout>
  <div class="container mx-auto p-6 bg-white h-full">
  <h2 class="text-gray-700 text-3xl mb-5">Categories</h2>
  <div class="overflow-y-auto">
  <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    Category name
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category )
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $category->name }}
                </th>
                <td class="text-blue-500 underline px-6 py-4">
                    <a href="">Edit</a>
                </td>
             
            </tr>
         @endforeach
        </tbody>
    </table>
  </div>
  
  </div>
</x-admin-layout>