<nav class="bg-gray-800 lg:hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8"
                        src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="lg:hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <router-link to="/products" 
                          class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" 
                          active-class="bg-gray-900">Products</router-link>
                        <router-link to="/categories"
                          class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" 
                          active-class="bg-gray-900">Categories</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>