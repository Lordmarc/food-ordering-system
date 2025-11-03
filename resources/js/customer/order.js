document.addEventListener('DOMContentLoaded', () => {

  // 🔸 BUTTONS (filter tabs)
  const allOrdersBtn = document.getElementById('all-orders');
  const pendingOrdersBtn = document.getElementById('pending-orders');
  const preparingOrdersBtn = document.getElementById('preparing-orders');
  const readyOrdersBtn = document.getElementById('ready-orders');
  const completedOrdersBtn = document.getElementById('completed-orders');

  // 🔸 ELEMENTS
  const ordersList = document.getElementById('order-list');
  const ordersContainer = document.getElementById('orders-container');

  // ✅ stop script if HTML elements are missing
  if (!ordersList || !ordersContainer) return;

  // 🔸 get data URL from HTML attribute
  const ordersUrl = ordersList.dataset.ordersUrl;

  // 🔸 track current active status (default: all)
  let currentStatus = 'all';

  // 🧩 FETCH FUNCTION
  function fetchOrdersList(status = 'all') {
    console.log(`Fetching ${status} orders...`);

    fetch(ordersUrl)
      .then(res => res.json())
      .then(data => {
        console.log("Orders Data Received:", data);

        // choose which orders to display based on filter
        let orderToShow = data.orders;
        if (status === 'pending') orderToShow = data.pendingOrders;
        if (status === 'preparing') orderToShow = data.preparingOrders;
        if (status === 'ready') orderToShow = data.readyOrders;
        if (status === 'completed') orderToShow = data.completedOrders;

        renderOrders(orderToShow);
      })
      .catch(err => console.error("Error fetching orders:", err));
  }

  // 🧩 RENDER FUNCTION
  function renderOrders(orders) {
    ordersContainer.innerHTML = '';

    if (!orders.length) {
      ordersContainer.innerHTML = `
        <p class="text-center text-gray-500 py-4">
          No orders found for this category.
        </p>
      `;
      return;
    }

    orders.forEach(order => {
      // display each order's items
      let itemsHtml = order.items.map(item => `
        <div class="flex justify-between border-b border-gray-200 py-2">
          <div class="flex gap-3">
            <img src="/storage/${item.menu_item.image}" 
                 alt="${item.menu_item.name}" 
                 class="h-20 w-24 object-cover rounded-md">
            <div class="flex flex-col justify-around">
              <span class="font-medium">${item.menu_item.name}</span>
              <span class="text-slate-500 text-sm">x${item.quantity}</span>
            </div>
          </div>
          <div class="text-right">
            <span class="px-2 py-1 text-sm rounded-md 
              ${order.status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ''}
              ${order.status === 'preparing' ? 'bg-blue-100 text-blue-700' : ''}
              ${order.status === 'ready' ? 'bg-green-100 text-green-700' : ''}
              ${order.status === 'completed' ? 'bg-gray-200 text-gray-600' : ''}
            ">
              ${order.status.toUpperCase()}
            </span>
          </div>
        </div>
      `).join('');

      ordersContainer.innerHTML += `
        <div class="bg-white p-4 shadow-sm rounded-md mb-3">
          ${itemsHtml}
          <div class="mt-2 text-right font-semibold text-slate-700">
            Total: ₱${order.total}
          </div>
        </div>
      `;
    });
  }

  // 🧩 HIGHLIGHT ACTIVE BUTTON
  function highlightActive(activeBtn) {
    const allBtns = [
      allOrdersBtn,
      pendingOrdersBtn,
      preparingOrdersBtn,
      readyOrdersBtn,
      completedOrdersBtn
    ];

    allBtns.forEach(btn => {
      btn.classList.remove('bg-amber-500');
      btn.classList.add('hover:bg-gray-200');
    });

    activeBtn.classList.add('bg-amber-500');
    activeBtn.classList.remove('hover:bg-gray-200');
  }

  // 🧩 FILTER BUTTON EVENTS
  allOrdersBtn.addEventListener('click', () => {
    highlightActive(allOrdersBtn);
    currentStatus = 'all';
    fetchOrdersList(currentStatus);
  });

  pendingOrdersBtn.addEventListener('click', () => {
    highlightActive(pendingOrdersBtn);
    currentStatus = 'pending';
    fetchOrdersList(currentStatus);
  });

  preparingOrdersBtn.addEventListener('click', () => {
    highlightActive(preparingOrdersBtn);
    currentStatus = 'preparing';
    fetchOrdersList(currentStatus);
  });

  readyOrdersBtn.addEventListener('click', () => {
    highlightActive(readyOrdersBtn);
    currentStatus = 'ready';
    fetchOrdersList(currentStatus);
  });

  completedOrdersBtn.addEventListener('click', () => {
    highlightActive(completedOrdersBtn);
    currentStatus = 'completed';
    fetchOrdersList(currentStatus);
  });

  // 🔄 AUTO-REFRESH every 10 seconds (keeps current filter)
  setInterval(() => fetchOrdersList(currentStatus), 10000);

  // 🔹 INITIAL LOAD
  fetchOrdersList('all');
});
