document.addEventListener("DOMContentLoaded", () => {
    const content = document.getElementById("content");

    function initOrderScript() {
        const allOrdersBtn = document.getElementById("all-orders");
        const pendingOrdersBtn = document.getElementById("pending-orders");
        const preparingOrdersBtn = document.getElementById("preparing-orders");
        const readyOrdersBtn = document.getElementById("ready-orders");
        const completedOrdersBtn = document.getElementById("completed-orders");

        const ordersList = document.getElementById("order-list");
        const ordersContainer = document.getElementById("orders-container");

        if (!ordersList || !ordersContainer) return; // stop if no orders section

        const ordersUrl = ordersList.dataset.ordersUrl;
        let currentStatus = "all";

        function fetchOrdersList(status = "all") {
            fetch(ordersUrl)
                .then((res) => res.json())
                .then((data) => {
                    let orderToShow = data.orders;
                    if (status === "pending") orderToShow = data.pendingOrders;
                    if (status === "preparing")
                        orderToShow = data.preparingOrders;
                    if (status === "ready") orderToShow = data.readyOrders;
                    if (status === "completed")
                        orderToShow = data.completedOrders;
                    renderOrders(orderToShow);
                })
                .catch((err) => console.error(err));
        }

        function renderOrders(orders) {
            ordersContainer.innerHTML = "";
            if (!orders.length) {
                ordersContainer.innerHTML = `<div class="bg-white h-80 flex justify-center items-center">
        <p class="text-center text-gray-500 py-4">No orders found.</p>
        </div>`;
                return;
            }
            orders.forEach((order) => {
                const itemsHtml = order.items
                    .map(
                        (item) => `
          <div class="flex justify-between border-b border-gray-200 py-2">
            <div class="flex gap-3">
              <img src="/storage/${
                  item.menu_item.image
              }" class="h-20 w-24 object-cover rounded-md">
              <div class="flex flex-col justify-around">
                <span>${item.menu_item.name}</span>
                <span class="text-slate-500 text-sm">x${item.quantity}</span>
              </div>
            </div>
            <div class="text-right">${order.status.toUpperCase()}</div>
          </div>
        `
                    )
                    .join("");

                ordersContainer.innerHTML += `
          <div class="bg-white p-4 shadow-sm rounded-md mb-3">
            ${itemsHtml}
            <div class="mt-2 text-right font-semibold text-slate-700">Total: ₱${order.total}</div>
          </div>
        `;
            });
        }

        function highlightActive(activeBtn) {
            [
                allOrdersBtn,
                pendingOrdersBtn,
                preparingOrdersBtn,
                readyOrdersBtn,
                completedOrdersBtn,
            ].forEach((btn) => btn?.classList.remove("bg-amber-500"));
            activeBtn?.classList.add("bg-amber-500");
        }

        // Event listeners
        allOrdersBtn?.addEventListener("click", () => {
            highlightActive(allOrdersBtn);
            currentStatus = "all";
            fetchOrdersList(currentStatus);
        });
        pendingOrdersBtn?.addEventListener("click", () => {
            highlightActive(pendingOrdersBtn);
            currentStatus = "pending";
            fetchOrdersList(currentStatus);
        });
        preparingOrdersBtn?.addEventListener("click", () => {
            highlightActive(preparingOrdersBtn);
            currentStatus = "preparing";
            fetchOrdersList(currentStatus);
        });
        readyOrdersBtn?.addEventListener("click", () => {
            highlightActive(readyOrdersBtn);
            currentStatus = "ready";
            fetchOrdersList(currentStatus);
        });
        completedOrdersBtn?.addEventListener("click", () => {
            highlightActive(completedOrdersBtn);
            currentStatus = "completed";
            fetchOrdersList(currentStatus);
        });

        // Auto refresh
        setInterval(() => fetchOrdersList(currentStatus), 10000);

        // Initial load
        fetchOrdersList(currentStatus);
    }

    // Sidebar AJAX navigation
    document.querySelectorAll(".sidebar-link").forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const url = this.getAttribute("href");
            fetch(url)
                .then((res) => res.text())
                .then((html) => {
                    content.innerHTML = html;
                    initOrderScript(); // 🔹 Reinitialize buttons in new partial
                })
                .catch((err) => console.error(err));
        });
    });

    // Initial load for page
    initOrderScript();
});
