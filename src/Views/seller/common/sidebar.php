<aside class="w-64 bg-white shadow-sm border-r border-indigo-200 flex flex-col">
  <div class="p-6 bg-indigo-100 border-b border-indigo-200">
    <div class="flex items-center">
      <div>
        <?php render('common/brand', ['font_size' => 4, 'logo_size' => 30]) ?>
      </div>
    </div>
  </div>

  <nav id="sidebarNav" class="flex-1 p-4 overflow-y-auto">
    <div class="mb-8">
      <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 px-2">Navigation</h3>
      <ul class="space-y-1">
        <li>
          <a href="/seller/dashboard"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="/seller/orders"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-clipboard-list mr-3"></i>
            Orders
          </a>
        </li>
        <li>
          <a href="/seller/products"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-box-open mr-3"></i>
            Products
          </a>
        </li>
        <li>
          <a href="/seller/customers"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-users mr-3"></i>
            Customers
          </a>
        </li>
        <li>
          <a href="/seller/reports"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
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
          <a href="/seller/account"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-cog mr-3"></i>
            Account Settings
          </a>
        </li>
        <li>
          <a href="/seller/help"
            class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
            <i class="fas fa-question-circle mr-3"></i>
            Help Center
          </a>
        </li>
      </ul>
    </div>
  </nav>
</aside>