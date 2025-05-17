<!-- Main Content -->
<main class="flex-1 overflow-auto">
    <!-- Header -->
    <header class="bg-indigo-100 shadow-sm border-b border-indigo-200">
        <div class="flex items-center justify-between p-6 bg-indigo-100 border-b border-indigo-200">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">Products Management</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <div
                        class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-medium">
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
                <button
                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition-colors flex items-center">
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
                    <input type="text" placeholder="Search products..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <!-- Category Filter -->
                <div class="w-full md:w-48">
                    <select
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                        <option>All Categories</option>
                        <option>Electronics</option>
                        <option>Clothing</option>
                        <option>Home & Garden</option>
                        <option>Beauty</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="w-full md:w-48">
                    <select
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                        <option>All Statuses</option>
                        <option>Active</option>
                        <option>Draft</option>
                        <option>Out of Stock</option>
                    </select>
                </div>

                <!-- Sort -->
                <div class="w-full md:w-48">
                    <select
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
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
            <div
                class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                <div class="relative pb-[70%] bg-gray-100">
                    <div class="absolute top-2 right-2">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">In
                            Stock</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1 truncate">Premium Wireless Headphones</h3>

                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg">$199.99</span>
                        <span class="text-gray-500 text-sm">24 sold</span>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button
                            class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <button
                            class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div
                class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                <div class="relative pb-[70%] bg-gray-100">
                    <div class="absolute top-2 right-2">
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Low
                            Stock</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1 truncate">Smart Fitness Watch</h3>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg">$149.99</span>
                        <span class="text-gray-500 text-sm">56 sold</span>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button
                            class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <button
                            class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div
                class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                <div class="relative pb-[70%] bg-gray-100">
                    <div class="absolute top-2 right-2">
                        <span
                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Draft</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1 truncate">Organic Cotton T-Shirt</h3>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg">$29.99</span>
                        <span class="text-gray-500 text-sm">0 sold</span>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button
                            class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <button
                            class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div
                class="product-card bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden transition-all duration-300">
                <div class="relative pb-[70%] bg-gray-100">
                    <div class="absolute top-2 right-2">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">On
                            Sale</span>
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
                        <button
                            class="flex-1 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-sm font-medium">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <button
                            class="flex-1 py-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="inline-flex rounded-md shadow">
                <a href="#"
                    class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#"
                    class="px-4 py-2 border-t border-b border-indigo-300 bg-indigo-50 text-indigo-800 font-medium hover:bg-indigo-100">
                    1
                </a>
                <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    3
                </a>
                <a href="#"
                    class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>
</main>