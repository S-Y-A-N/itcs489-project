<!-- Main Content -->
<main class="flex-1 overflow-auto">
    <!-- Header -->
    <header class="bg-indigo-100 shadow-sm border-b border-indigo-200">
        <div class="flex items-center justify-between px-8 py-5">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <select
                        class="appearance-none pl-3 pr-8 py-2 border border-gray-300 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option>All Suppliers</option>
                        <option>TechGadgets Inc.</option>
                        <option>FashionHub Ltd.</option>
                        <option>HomeEssentials Co.</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <div
                        class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-medium">
                        AD
                    </div>
                    <span class="text-sm font-medium">Admin</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <div class="p-8">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 mb-8 text-white">
            <h2 class="text-xl font-bold mb-2">Welcome, Admin!</h2>
            <p class="opacity-90">Here's what's happening with the system today.</p>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Customers Card -->
            <div class="bg-white hover:bg-lime-50 rounded-xl shadow-card p-6 hover:shadow-cardHover transition-shadow">
                <div class="flex justify-between items-start">
                    <div data-metric="customers">
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Customers</p>
                        <h3 class="text-2xl font-bold">9,999</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-lime-100 text-lime-500">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4">
                    <a href="/itcs489-supplier/customers.php"
                        class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
                        View details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="bg-white hover:bg-pink-50 rounded-xl shadow-card p-6 hover:shadow-cardHover transition-shadow">
                <div class="flex justify-between items-start">
                    <div data-metric="customers">
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
                        <h3 class="text-2xl font-bold">9,999</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-pink-100 text-pink-500">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="flex items-start mt-4">
                    <a href="/itcs489-supplier/orders.php"
                        class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
                        View details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Revenue Card -->
            <div
                class="bg-white hover:bg-yellow-50 rounded-xl shadow-card p-6 hover:shadow-cardHover transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
                        <h3 class="text-2xl font-bold">BH 45,320</h3>
                    </div>
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-500">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="flex items-center mt-4">
                    <a href="/itcs489-supplier/reports.php"
                        class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
                        View details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Equal Height Containers -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Revenue Chart -->
            <div class="bg-white rounded-xl shadow-card p-6 equal-height-container">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-semibold">Revenue Performance</h2>
                        <p class="text-sm text-gray-500">Last 12 months</p>
                    </div>
                    <div class="flex space-x-2">
                        <button id="monthlyBtn"
                            class="text-xs px-3 py-1 rounded-full bg-primary text-white flex items-center">
                            <i class="fas fa-calendar-alt mr-1"></i> Monthly
                        </button>
                        <button id="yearlyBtn"
                            class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 flex items-center">
                            <i class="fas fa-chart-line mr-1"></i> Yearly
                        </button>
                    </div>
                </div>

                <!-- Chart Container -->
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Current Orders -->
            <div class="bg-white rounded-xl shadow-card p-6 equal-height-container">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold">Order Status</h2>
                    <a href="orders-admin.php"
                        class="text-sm font-medium text-primary hover:text-secondary flex items-center">
                        View all <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
                <div class="order-status-grid grid grid-cols-2 gap-4">
                    <!-- Processing -->
                    <div
                        class="p-3 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <span class="text-sm font-medium">Processing</span>
                        <span class="text-xs text-gray-500 mt-1">24 orders</span>
                    </div>

                    <!-- On Hold -->
                    <div
                        class="p-3 rounded-lg bg-orange-50 hover:bg-orange-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-error-warning-line"></i>
                        </div>
                        <span class="text-sm font-medium">On Hold</span>
                        <span class="text-xs text-gray-500 mt-1">8 orders</span>
                    </div>

                    <!-- Shipped -->
                    <div
                        class="p-3 rounded-lg bg-blue-50 hover:bg-blue-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-truck-line"></i>
                        </div>
                        <span class="text-sm font-medium">Shipped</span>
                        <span class="text-xs text-gray-500 mt-1">42 orders</span>
                    </div>

                    <!-- Delivered -->
                    <div
                        class="p-3 rounded-lg bg-purple-50 hover:bg-purple-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-check-double-line"></i>
                        </div>
                        <span class="text-sm font-medium">Delivered</span>
                        <span class="text-xs text-gray-500 mt-1">36 orders</span>
                    </div>

                    <!-- Cancelled -->
                    <div
                        class="p-3 rounded-lg bg-red-50 hover:bg-red-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-prohibited-2-line"></i>
                        </div>
                        <span class="text-sm font-medium">Cancelled</span>
                        <span class="text-xs text-gray-500 mt-1">5 orders</span>
                    </div>

                    <!-- Completed -->
                    <div
                        class="p-3 rounded-lg bg-green-50 hover:bg-green-100 text-center transition-colors flex flex-col items-center justify-center">
                        <div
                            class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-checkbox-circle-line"></i>
                        </div>
                        <span class="text-sm font-medium">Completed</span>
                        <span class="text-xs text-gray-500 mt-1">128 orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Initialize Chart.js when DOM is loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Chart data
        const monthlyData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue (BHD)',
                data: [4100, 3400, 4600, 3800, 4400, 3200, 3900, 4200, 3800, 4500, 4100, 4800],
                backgroundColor: '#4F46E5',
                borderColor: '#4F46E5',
                borderWidth: 1,
                borderRadius: 6,
                borderSkipped: false,
            }]
        };

        const yearlyData = {
            labels: ['2020', '2021', '2022', '2023'],
            datasets: [{
                label: 'Annual Revenue (BHD)',
                data: [32000, 38000, 42000, 48000],
                backgroundColor: '#4F46E5',
                borderColor: '#4F46E5',
                borderWidth: 1,
                borderRadius: 6,
                borderSkipped: false,
            }]
        };

        // Chart config
        const config = {
            type: 'bar',
            data: monthlyData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleFont: { size: 14 },
                        bodyFont: { size: 12 },
                        padding: 12,
                        displayColors: true,
                        usePointStyle: true,
                        callbacks: {
                            label: function (context) {
                                return 'BHD ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    y: {
                        grid: {
                            color: '#E5E7EB',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            callback: function (value) {
                                return 'BHD ' + value.toLocaleString();
                            }
                        },
                        beginAtZero: true
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        };

        // Create the chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, config);

        // Button event listeners
        document.getElementById('monthlyBtn').addEventListener('click', function () {
            revenueChart.data = monthlyData;
            revenueChart.update();
            this.classList.remove('bg-gray-100', 'text-gray-600');
            this.classList.add('bg-primary', 'text-white');
            document.getElementById('yearlyBtn').classList.remove('bg-primary', 'text-white');
            document.getElementById('yearlyBtn').classList.add('bg-gray-100', 'text-gray-600');
        });

        document.getElementById('yearlyBtn').addEventListener('click', function () {
            revenueChart.data = yearlyData;
            revenueChart.update();
            this.classList.remove('bg-gray-100', 'text-gray-600');
            this.classList.add('bg-primary', 'text-white');
            document.getElementById('monthlyBtn').classList.remove('bg-primary', 'text-white');
            document.getElementById('monthlyBtn').classList.add('bg-gray-100', 'text-gray-600');
        });
    });
</script>