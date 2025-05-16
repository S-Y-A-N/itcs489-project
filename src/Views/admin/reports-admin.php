<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Add Chart.js CDN -->
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
        .chart-container {
            height: 300px;
        }
        .report-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
                            <a href="/itcs489-admin/dashboard-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
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
                            <a href="/itcs489-admin/reports-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-primary-50 text-primary">
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
                        <h1 class="text-xl font-bold">Analytics Reports</h1>
                    </div>
                    <div class="flex items-center space-x-4">
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

            <!-- Reports Content -->
            <div class="p-8">
                <!-- Reports Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold">Business Analytics</h2>
        <p class="text-gray-600">Key metrics and performance reports</p>
    </div>
    <div class="mt-4 md:mt-0 flex space-x-3">
        <!-- Time Period Filter -->
        <div class="relative">
            <select class="appearance-none pl-3 pr-8 py-2 border border-gray-300 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option>Last 7 Days</option>
                <option>Last 30 Days</option>
                <option>Last Quarter</option>
                <option>Last Year</option>
                <option>Custom Range</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <i class="fas fa-chevron-down text-xs"></i>
            </div>
        </div>

        <!-- Supplier Filter -->
        <div class="relative">
            <select class="appearance-none pl-3 pr-8 py-2 border border-gray-300 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option>All Suppliers</option>
                <option>TechGadgets Inc.</option>
                <option>FashionHub Ltd.</option>
                <option>HomeEssentials Co.</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <i class="fas fa-chevron-down text-xs"></i>
            </div>
        </div>

        <!-- Export Button -->
        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition-colors flex items-center">
            <i class="fas fa-download mr-2"></i> Export
        </button>
    </div>
</div>


                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <!-- Total Revenue -->
                    <div class="report-card bg-white hover:bg-pink-50 rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                                <h3 class="text-2xl font-bold mt-1">$24,780</h3>
                                <p class="text-sm text-green-600 mt-1 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12.5% from last period
                                </p>
                            </div>
                            <div class="h-12 w-12 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Orders -->
                    <div class="report-card bg-white hover:bg-green-50 rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Orders</p>
                                <h3 class="text-2xl font-bold mt-1">342</h3>
                                <p class="text-sm text-green-600 mt-1 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 8.2% from last period
                                </p>
                            </div>
                            <div class="h-12 w-12 rounded-lg bg-green-100 text-green-600 flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- New Customers -->
                    <div class="report-card bg-white hover:bg-purple-50 rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">New Customers</p>
                                <h3 class="text-2xl font-bold mt-1">124</h3>
                                <p class="text-sm text-red-600 mt-1 flex items-center">
                                    <i class="fas fa-arrow-down mr-1"></i> 3.4% from last period
                                </p>
                            </div>
                            <div class="h-12 w-12 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Conversion Rate -->
                    <div class="report-card bg-white hover:bg-yellow-50 rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Conversion Rate</p>
                                <h3 class="text-2xl font-bold mt-1">3.42%</h3>
                                <p class="text-sm text-green-600 mt-1 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 1.1% from last period
                                </p>
                            </div>
                            <div class="h-12 w-12 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center">
                                <i class="fas fa-percentage text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Revenue Chart -->
                    <div class="report-card bg-white rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold">Revenue Overview</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-blue-50 text-blue-600 rounded-full">Monthly</button>
                                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Yearly</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <!-- Bar Chart for Revenue -->
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Orders Chart -->
                    <div class="report-card bg-white rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold">Order Trends</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-blue-50 text-blue-600 rounded-full">Volume</button>
                                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Value</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <!-- Line Chart for Order Trends -->
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Detailed Reports -->
                <div class="report-card bg-white rounded-xl shadow-card border border-gray-200 p-6 transition-all duration-300 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Detailed Reports</h3>
                        <button class="text-sm text-primary-600 hover:text-primary-800 flex items-center">
                            <i class="fas fa-plus mr-1"></i> Create Custom Report
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Period</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Generated</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Sales Performance Report -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Sales Performance</div>
                                                <div class="text-sm text-gray-500">Detailed sales analytics</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sales</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Monthly</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 15, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-primary-600 hover:text-primary-900 mr-3">View</button>
                                        <button class="text-gray-600 hover:text-gray-900">Download</button>
                                    </td>
                                </tr>
                                
                                <!-- Customer Acquisition Report -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Customer Acquisition</div>
                                                <div class="text-sm text-gray-500">New customer analytics</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Customers</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Quarterly</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 1, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-primary-600 hover:text-primary-900 mr-3">View</button>
                                        <button class="text-gray-600 hover:text-gray-900">Download</button>
                                    </td>
                                </tr>
                                
                                <!-- Product Performance Report -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-purple-50 rounded-lg flex items-center justify-center text-purple-600">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Product Performance</div>
                                                <div class="text-sm text-gray-500">Top selling products</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Products</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Weekly</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 12, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-primary-600 hover:text-primary-900 mr-3">View</button>
                                        <button class="text-gray-600 hover:text-gray-900">Download</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize charts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart (Bar Chart)
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Revenue ($)',
                        data: [3500, 4200, 3800, 5100, 4900, 6200, 5800],
                        backgroundColor: 'rgba(79, 70, 229, 0.7)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '$' + context.raw.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Orders Chart (Line Chart)
            const ordersCtx = document.getElementById('ordersChart').getContext('2d');
            const ordersChart = new Chart(ordersCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Number of Orders',
                        data: [45, 52, 48, 65, 62, 78, 72],
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true,
                        pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>