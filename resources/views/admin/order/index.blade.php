<x-admin-layout>
  <div class="container w-full h-full bg-white p-6 mx-auto">
      <h2 class="text-gray-700 text-3xl mb-5">Orders</h2>
       <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    Order ID
                </th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
          
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order )
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 {{ $order->id }}
                </td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->total }}</td>
                <td>
                <select name="status" id="" class="status-select" data-id="{{ $order->id }}">
                  @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                      {{ ucfirst($status) }}
                    </option>
                  @endforeach
                </select>
                </td>
               
             
            </tr>
         @endforeach
        </tbody>
    </table>
  </div>
</x-admin-layout>