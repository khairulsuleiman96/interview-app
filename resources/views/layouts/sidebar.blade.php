<aside class="sidebar fixed left-0 top-0 z-9999 h-screen w-[290px] hidden lg:block flex-col overflow-y-hidden border-r border-gray-200 bg-gray-800 px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="/products">
                <img class="size-8"
                    src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="My Company">
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                <div class="flex flex-col gap-2 mb-6">
                    <router-link to="/products" 
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" 
                    active-class="bg-gray-900">Products</router-link>
                    <router-link to="/categories"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" 
                    active-class="bg-gray-900">Categories</router-link>
                </div>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>