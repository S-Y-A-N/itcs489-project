<!-- Main Content -->
<main class="flex-1 overflow-auto">
    <!-- Header -->
    <header class="bg-indigo-100 shadow-sm border-b border-indigo-200">
        <div class="flex items-center justify-between px-8 py-5">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">Orders Dashboard</h1>
            </div>
            <div class="flex items-center space-x-4">
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
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sample row 1 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$149.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 15, 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-primary-600 hover:text-primary-900 mr-3 view-btn">View</button>
                                <button class="text-accent hover:text-green-700 update-btn">Update</button>
                            </td>

                        </tr>
                        <!-- Sample row 2 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$89.50</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 14, 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sarah Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-primary-600 hover:text-primary-900 mr-3 view-btn">View</button>
                                <button class="text-accent hover:text-black-700 update-btn">Update</button>
                            </td>
                        </tr>
                        <!-- Sample row 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-003</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$245.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 13, 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Shipped</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Michael Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-primary-600 hover:text-primary-900 mr-3 view-btn">View</button>
                                <button class="text-accent hover:text-black-700 update-btn">Update</button>
                            </td>
                        </tr>
                        <!-- Sample row 4 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-004</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$75.25</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 12, 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emily Davis</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-primary-600 hover:text-primary-900 mr-3 view-btn">View</button>
                                <button class="text-accent hover:text-black-700 update-btn">Update</button>
                            </td>
                        </tr>
                        <!-- Sample row 5 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-005</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$199.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 11, 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">Pending</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Wilson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-primary-600 hover:text-primary-900 mr-3 view-btn">View</button>
                                <button class="text-accent hover:text-black-700 update-btn">Update</button>
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
                            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span
                                class="font-medium">24</span> results
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

<div id="updateModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-30 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-sm shadow-xl">
        <h2 class="text-lg font-semibold mb-4">Update Order</h2>
        <form id="updateForm" class="space-y-4">
            <input type="hidden" id="modalOrderId">
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select id="modalStatus" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option>Pending</option>
                    <option>Processing</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                    <option>Cancelled</option>
                    <option>Completed</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="cancelModal" class="px-4 py-2 bg-gray-200 rounded-lg">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("updateModal");
        const form = document.getElementById("updateForm");
        const orderIdInput = document.getElementById("modalOrderId");
        const statusSelect = document.getElementById("modalStatus");

        document.querySelectorAll(".update-btn").forEach(btn => {
            btn.addEventListener("click", e => {
                const row = e.target.closest("tr");
                const orderId = row.children[0].textContent.trim();
                const currentStatus = row.children[3].innerText.trim();

                orderIdInput.value = orderId;
                statusSelect.value = currentStatus;
                modal.classList.remove("hidden");
            });
        });

        form.addEventListener("submit", e => {
            e.preventDefault();
            const id = orderIdInput.value;
            const newStatus = statusSelect.value;
            const row = Array.from(document.querySelectorAll("tbody tr")).find(r => r.children[0].textContent.trim() === id);
            const statusCell = row.children[3];
            statusCell.innerHTML = `<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full'>${newStatus}</span>`;
            modal.classList.add("hidden");
        });

        document.getElementById("cancelModal").addEventListener("click", () => {
            modal.classList.add("hidden");
        });
    });
</script>