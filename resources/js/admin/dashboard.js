document.addEventListener('DOMContentLoaded', () => {
    const dashboardEl = document.getElementById('dashboard');
    if (!dashboardEl) return; // safety check

    const statsUrl = dashboardEl.dataset.statsUrl;

    function fetchDashboardStats() {
        console.log('🔄 Fetching dashboard data...'); // ✅ para makita kung nagre-refresh

        fetch(statsUrl)
            .then(res => res.json())
            .then(data => {
                console.log('✅ Data received:', data); // ✅ log the response data

                document.getElementById('revenue-card').querySelector('.amount').textContent = `P ${data.totalRevenues}`;
                document.getElementById('orders-card').querySelector('.amount').textContent = data.totalOrders;
                document.getElementById('menu-card').querySelector('.amount').textContent = data.totalMenuItems;
                document.getElementById('customers-card').querySelector('.amount').textContent = data.totalCustomers;
            })
            .catch(err => console.error('❌ Error fetching dashboard data:', err));
    }

    // Fetch once when page loads
    fetchDashboardStats();

    // Auto-refresh every 2 seconds
    setInterval(fetchDashboardStats, 2000);
});
  