@auth
<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-green-600">
                        🌸 Admin Florist
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700">
                        Dashboard
                    </a>

                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700">
                        Produk
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-700">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700">
                Dashboard
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2 text-gray-700">
                Produk
            </a>
        </div>

        <div class="border-t border-gray-200 px-4 py-3">
            <div class="text-sm text-gray-700">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button class="text-red-600 text-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>
@endauth
