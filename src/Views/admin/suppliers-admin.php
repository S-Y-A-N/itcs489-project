<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        .vendor-row:hover {
            background-color: #f9fafb;
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
                            <a href="/itcs489-admin/suppliers-admin.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-primary-50 text-primary">
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
            <header class="bg-indigo-100 shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-8 py-5">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold">Suppliers</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-medium">
                                AD
                            </div>
                            <span class="text-sm font-medium">Admin</span>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Vendors Content -->
            <div class="p-8">
                <!-- Vendors Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold">Registered Suppliers</h2>
                        <p class="text-gray-600">Manage all supplier accounts</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Supplier
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <!-- Search -->
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                placeholder="Search vendors by name, email, store, etc..." 
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                        </div>
                        
                        <!-- Location Filter -->
                        <div class="w-full md:w-48">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>All Locations</option>
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>Canada</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        
                        <!-- Sort -->
                        <div class="w-full md:w-48">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>Sort By</option>
                                <option>Newest First</option>
                                <option>Oldest First</option>
                                <option>Most Products</option>
                                <option>Highest Rated</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Vendors Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Store/Company</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Vendor 1 -->
                                <tr class="vendor-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-medium">
                                                    JS
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Smith</div>
                                                <div class="text-sm text-gray-500">ID: VND001</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Smith's Electronics</div>
                                        <div class="text-sm text-gray-500">New York, USA</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">john@smiths.com</div>
                                        <div class="text-sm text-gray-500">+1 (555) 123-4567</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">42</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                        <span class="text-gray-400">|</span>
                                        <a href="#" class="text-gray-600 hover:text-gray-900 ml-3">Edit</a>
                                    </td>
                                </tr>
                                
                                <!-- Vendor 2 -->
                                <tr class="vendor-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 font-medium">
                                                    MS
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Maria Sanchez</div>
                                                <div class="text-sm text-gray-500">ID: VND002</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Sanchez Fashion</div>
                                        <div class="text-sm text-gray-500">Madrid, Spain</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">maria@sanchez.com</div>
                                        <div class="text-sm text-gray-500">+34 123 456 789</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">0</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                        <span class="text-gray-400">|</span>
                                        <a href="#" class="text-gray-600 hover:text-gray-900 ml-3">Edit</a>
                                    </td>
                                </tr>
                                
                                <!-- Vendor 3 -->
                                <tr class="vendor-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-medium">
                                                    TL
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Thomas Lee</div>
                                                <div class="text-sm text-gray-500">ID: VND003</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Lee's Hardware</div>
                                        <div class="text-sm text-gray-500">London, UK</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">thomas@lees.com</div>
                                        <div class="text-sm text-gray-500">+44 1234 567890</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">18</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                        <span class="text-gray-400">|</span>
                                        <a href="#" class="text-gray-600 hover:text-gray-900 ml-3">Edit</a>
                                    </td>
                                </tr>
                                
                                <!-- Vendor 4 -->
                                <tr class="vendor-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-medium">
                                                    AK
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Aisha Khan</div>
                                                <div class="text-sm text-gray-500">ID: VND004</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Khan's Kitchen</div>
                                        <div class="text-sm text-gray-500">Dubai, UAE</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">aisha@khans.com</div>
                                        <div class="text-sm text-gray-500">+971 50 123 4567</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">7</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                        <span class="text-gray-400">|</span>
                                        <a href="#" class="text-gray-600 hover:text-gray-900 ml-3">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">24</span> suppliers
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        1
                                    </a>
                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        2
                                    </a>
                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        3
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>