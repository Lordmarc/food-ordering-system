document.addEventListener('DOMContentLoaded', () => {
    const updateStatusBtn = document.querySelectorAll(".update-status");
    console.log(updateStatusBtn);
    updateStatusBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            console.log('clicked!');
            const id = btn.dataset.id;
            const select = document.querySelector(`.status-select[data-id="${id}"]`);
            const status = select.value;

            fetch(`/orders/${id}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status })
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message)

              

                if (status === 'completed'){
                    const row = btn.closest('tr');
                    const completedTable = document.querySelector('#completed-orders tbody');
                    const actionCell = row.querySelector('td:last-child');
                    if (actionCell) actionCell.remove();
                    
                    completedTable.appendChild(row);
                }
            })
            .catch(err => console.error(err))
        });
    });

    const activeTab = document.getElementById('active-tab');
    const completedTab = document.getElementById('completed-tab');
    const activeOrders = document.getElementById('active-orders');
    const completedOrders = document.getElementById('completed-orders');

    activeTab.addEventListener('click', () => {
        activeOrders.classList.remove('hidden');
        completedOrders.classList.add('hidden');

        activeTab.classList.add('bg-blue-500', 'text-white');
        activeTab.classList.remove("bg-gray-300", "text-black");

        completedTab.classList.remove("bg-blue-500", "text-white");
        completedTab.classList.add("bg-gray-300", "text-black");
        
    });

    completedTab.addEventListener('click', () => {
        completedOrders.classList.remove('hidden');
        activeOrders.classList.add('hidden');

        
        activeTab.classList.remove("bg-blue-500", "text-white");
        activeTab.classList.add("bg-gray-300", "text-black");

        completedTab.classList.add("bg-blue-500", "text-white");
        completedTab.classList.remove("bg-gray-300", "text-black");
    });

    
})