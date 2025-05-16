<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#6366F1',
                        accent: '#10B981',
                        danger: '#EF4444',
                        warning: '#F59E0B',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
                    boxShadow: {
                        card: '0 2px 8px rgba(0, 0, 0, 0.08)',
                        cardHover: '0 4px 12px rgba(0, 0, 0, 0.12)'
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            transform: translateX(2px);
        }
        .equal-height-container {
            min-height: 400px;
            height: 100%;
        }
        .order-status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-sm border-r border-indigo-200 flex flex-col">
            <div class="p-6 bg-indigo-100 border-b border-indigo-200">
                <div class="flex items-center">
                    <div>
                        <h1 class="text-xl font-bold text-black">Cheapy</h1>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1 p-4 overflow-y-auto">
                <div class="mb-8">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 px-2">Navigation</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/itcs489-admin/dashboard-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-primary-50 text-primary">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/orders-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-clipboard-list mr-3"></i>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/products-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-box-open mr-3"></i>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/customers-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-users mr-3"></i>
                                Customers
                            </a>
                        </li>
                           <li>
                            <a href="/itcs489-admin/suppliers-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-truck mr-3"></i>
                                Suppliers

                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/reports-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-file-invoice mr-3"></i>
                                Reports
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/authorization-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-lock mr-3"></i>
                                Authorization
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-auto border-t border-gray-200 pt-4">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 px-2">Settings</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/itcs489-admin/accoutSetting.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-cog mr-3"></i>
                                Account Settings
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-admin/helpCenter.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-question-circle mr-3"></i>
                                Help Center
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

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
                <select class="appearance-none pl-3 pr-8 py-2 border border-gray-300 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
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
                <div class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-medium">
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
                            <a href="/itcs489-supplier/customers.php" class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
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
                            <a href="/itcs489-supplier/orders.php" class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
                                View details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="bg-white hover:bg-yellow-50 rounded-xl shadow-card p-6 hover:shadow-cardHover transition-shadow">
                        <div class="flex justify-between items-start">
                            <div >
                                <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
                                <h3 class="text-2xl font-bold">BH 45,320</h3>
                            </div>
                            <div class="p-3 rounded-lg bg-yellow-100 text-yellow-500">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <a href="/itcs489-supplier/reports.php" class="ml-auto text-sm font-medium text-primary hover:text-secondary flex items-center">
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
                                <button id="monthlyBtn" class="text-xs px-3 py-1 rounded-full bg-primary text-white flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i> Monthly
                                </button>
                                <button id="yearlyBtn" class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 flex items-center">
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
                            <a href="orders-admin.php" class="text-sm font-medium text-primary hover:text-secondary flex items-center">
                                View all <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                        <div class="order-status-grid grid grid-cols-2 gap-4">
                            <!-- Processing -->
                            <div class="p-3 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <span class="text-sm font-medium">Processing</span>
                                <span class="text-xs text-gray-500 mt-1">24 orders</span>
                            </div>
                            
                            <!-- On Hold -->
                            <div class="p-3 rounded-lg bg-orange-50 hover:bg-orange-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="ri-error-warning-line"></i>
                                </div>
                                <span class="text-sm font-medium">On Hold</span>
                                <span class="text-xs text-gray-500 mt-1">8 orders</span>
                            </div>
                            
                            <!-- Shipped -->
                            <div class="p-3 rounded-lg bg-blue-50 hover:bg-blue-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="ri-truck-line"></i>
                                </div>
                                <span class="text-sm font-medium">Shipped</span>
                                <span class="text-xs text-gray-500 mt-1">42 orders</span>
                            </div>
                            
                            <!-- Delivered -->
                            <div class="p-3 rounded-lg bg-purple-50 hover:bg-purple-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="ri-check-double-line"></i>
                                </div>
                                <span class="text-sm font-medium">Delivered</span>
                                <span class="text-xs text-gray-500 mt-1">36 orders</span>
                            </div>
                            
                            <!-- Cancelled -->
                            <div class="p-3 rounded-lg bg-red-50 hover:bg-red-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="ri-prohibited-2-line"></i>
                                </div>
                                <span class="text-sm font-medium">Cancelled</span>
                                <span class="text-xs text-gray-500 mt-1">5 orders</span>
                            </div>
                            
                            <!-- Completed -->
                            <div class="p-3 rounded-lg bg-green-50 hover:bg-green-100 text-center transition-colors flex flex-col items-center justify-center">
                                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-2">
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
    </div>

    <script>
        // Initialize Chart.js when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
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
                                label: function(context) {
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
                                callback: function(value) {
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
            document.getElementById('monthlyBtn').addEventListener('click', function() {
                revenueChart.data = monthlyData;
                revenueChart.update();
                this.classList.remove('bg-gray-100', 'text-gray-600');
                this.classList.add('bg-primary', 'text-white');
                document.getElementById('yearlyBtn').classList.remove('bg-primary', 'text-white');
                document.getElementById('yearlyBtn').classList.add('bg-gray-100', 'text-gray-600');
            });

            document.getElementById('yearlyBtn').addEventListener('click', function() {
                revenueChart.data = yearlyData;
                revenueChart.update();
                this.classList.remove('bg-gray-100', 'text-gray-600');
                this.classList.add('bg-primary', 'text-white');
                document.getElementById('monthlyBtn').classList.remove('bg-primary', 'text-white');
                document.getElementById('monthlyBtn').classList.add('bg-gray-100', 'text-gray-600');
            });
        });
    </script>
</body>
</html>