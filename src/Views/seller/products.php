<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Dashboard | VendorPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
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
        .product-card:hover {
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
                            <a href="/itcs489-supplier/index.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-supplier/orders.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-clipboard-list mr-3"></i>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-supplier/products.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-primary-50 text-primary">
                                <i class="fas fa-box-open mr-3"></i>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-supplier/customers.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-users mr-3"></i>
                                Customers
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-supplier/reports.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-file-invoice mr-3"></i>
                                Reports
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-auto border-t border-gray-200 pt-4">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 px-2">Settings</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/itcs489-supplier/accountSetting.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-cog mr-3"></i>
                                Account Settings
                            </a>
                        </li>
                        <li>
                            <a href="/itcs489-supplier/helpCenter.php" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
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
                        <h1 class="text-xl font-bold">Products Management</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-medium">
                                SN
                            </div>
                            <span class="text-sm font-medium">Supplier Name</span>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Products Content -->
            <div class="p-8">
                <!-- Products Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold">Your Products</h2>
                        <p class="text-gray-600">Manage your product catalog</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add New Product
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-card border border-gray-200 p-5 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <!-- Search -->
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                placeholder="Search products..." 
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            >
                        </div>
                        
                        <!-- Category Filter -->
                        <div class="w-full md:w-48">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                                <option>All Categories</option>
                                <option>Electronics</option>
                                <option>Clothing</option>
                                <option>Home & Garden</option>
                                <option>Beauty</option>
                            </select>
                        </div>
                        
                        <!-- Status Filter -->
                        <div class="w-full md:w-48">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                                <option>All Statuses</option>
                                <option>Active</option>
                                <option>Draft</option>
                                <option>Out of Stock</option>
                            </select>
                        </div>
                        
                        <!-- Sort -->
                        <div class="w-full md:w-48">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                                <option>Newest First</option>
                                <option>Oldest First</option>
                                <option>Price: High to Low</option>
                                <option>Price: Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Product Card 1 -->
                    <div class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                        <div class="relative pb-[70%] bg-gray-100">
                            <div class="absolute top-2 right-2">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">In Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1 truncate">Premium Wireless Headphones</h3>
                            
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">$199.99</span>
                                <span class="text-gray-500 text-sm">24 sold</span>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                <button class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                                    <i class="fas fa-pen mr-1"></i> Edit
                                </button>
                                <button class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Card 2 -->
                    <div class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                        <div class="relative pb-[70%] bg-gray-100">
                            <div class="absolute top-2 right-2">
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Low Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1 truncate">Smart Fitness Watch</h3>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">$149.99</span>
                                <span class="text-gray-500 text-sm">56 sold</span>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                <button class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                                    <i class="fas fa-pen mr-1"></i> Edit
                                </button>
                                <button class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Card 3 -->
                    <div class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                        <div class="relative pb-[70%] bg-gray-100">
                            <div class="absolute top-2 right-2">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Draft</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1 truncate">Organic Cotton T-Shirt</h3>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">$29.99</span>
                                <span class="text-gray-500 text-sm">0 sold</span>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                <button class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                                    <i class="fas fa-pen mr-1"></i> Edit
                                </button>
                                <button class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Card 4 -->
                    <div class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                        <div class="relative pb-[70%] bg-gray-100">
                            <div class="absolute top-2 right-2">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">On Sale</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1 truncate">Stainless Steel Water Bottle</h3>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-bold text-lg text-primary">$24.99</span>
                                    <span class="text-gray-400 text-sm line-through ml-2">$34.99</span>
                                </div>
                                <span class="text-gray-500 text-sm">128 sold</span>
                            </div>
                            <div class="mt-4 flex space-x-2">
                                <button class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                                    <i class="fas fa-pen mr-1"></i> Edit
                                </button>
                                <button class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="inline-flex rounded-md shadow">
                        <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-4 py-2 border-t border-b border-indigo-300 bg-indigo-50 text-indigo-800 font-medium hover:bg-indigo-100">
                            1
                        </a>
                        <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            3
                        </a>
                        <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>
</html>