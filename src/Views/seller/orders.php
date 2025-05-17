<!-- Main Content -->
<main class="flex-1 overflow-auto">
    <!-- Header -->
    <header class="bg-indigo-100 shadow-sm border-b border-indigo-200">
        <div class="flex items-center justify-between p-6 bg-indigo-100 border-b border-indigo-200">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">Orders Dashboard</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <div
                        class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white font-medium">
                        SN
                    </div>
                    <span class="text-sm font-medium">Vendor Name</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                </div>
            </div>
        </div>
    </header>


    <!-- Orders Content -->
    <div class="p-8 space-y-6">
        <!-- Filters -->
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
            <div class="flex space-y-4 ">
                <!-- Search Bar -->
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" placeholder="Search orders..."
                        class="search-bar w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 outline-none transition-all duration-200">
                </div>
            </div>
            <!-- Filter Controls -->
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex flex-col md:flex-row md:items-between space-y-3 md:space-y-0 md:space-x-4">
                    <!-- Date Picker -->
                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-600 whitespace-nowrap">Date range:</label>
                        <div class="relative">
                            <input type="date"
                                class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-100">
                        </div>
                        <span class="text-gray-400">to</span>
                        <div class="relative">
                            <input type="date"
                                class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-100">
                        </div>
                    </div>

                    <!-- Status Dropdown -->
                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-600 whitespace-nowrap">Status:</label>
                        <select
                            class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-100 appearance-none bg-white pr-8">
                            <option>All Statuses</option>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                            <option>Cancelled</option>
                            <option>Completed</option>
                        </select>
                    </div>

                    <!-- Sort Dropdown -->
                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-600 whitespace-nowrap">Sort by:</label>
                        <select
                            class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-100 appearance-none bg-white pr-8">
                            <option>Newest First</option>
                            <option>Oldest First</option>
                            <option>Amount (High-Low)</option>
                            <option>Amount (Low-High)</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2 md:ml-auto">
                        <button
                            class="px-4 py-1.5 bg-indigo-500 text-white text-sm rounded-lg hover:bg-indigo-600 transition-colors">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Orders Table -->
        <div class="bg-white rounded-xl shadow-card border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Items</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($orders as $o): ?>
                            <!-- Sample row 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #<?= $o['order_id'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">BHD
                                    <?= number_format($o['order_revenue'], 2) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $o['timestamp'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800"><?= ucfirst($o['status']) ?></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $o['customer_name'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $o['quantity'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3">View</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium"><?= count($orders) ?></span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" aria-current="page"
                                class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                1
                            </a>
                            <a href="#"
                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                2
                            </a>
                            <a href="#"
                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                3
                            </a>
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>