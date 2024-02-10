@include('layout.header')

<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- nav-bar -->
        @include('layout.nav-bar')

        <section class="flex w-full h-full">
            <!-- Sidebar -->
            @include('layout.side-bar')

            <!-- container -->
            <main class="h-screen w-full overflow-auto">
                @yield('content')
            </main>

        </section>

    </div>
</div>
@include('layout.footer')
