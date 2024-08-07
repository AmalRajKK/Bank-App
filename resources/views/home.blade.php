<x-layout>
    <x-slot:title>Home</x-slot:title>
    <x-slot:heading>Home</x-slot:heading>
    <x-slot:title>Welcome to ABC Bank</x-slot:title>
    <x-slot:heading>Welcome to ABC Bank</x-slot:heading>

    <main class="container mx-auto px-4 py-8">
        <section class="text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">ABC Bank</h1>
            <p class="text-lg text-gray-700 mb-6">Your trusted partner in financial services.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Register</a>
                <a href="{{ route('login') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">Login</a>
            </div>
        </section>

        <section class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Personal Banking</h3>
                    <p class="text-gray-700">Manage your personal accounts, loans, and savings with ease.</p>
                </div>
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Business Banking</h3>
                    <p class="text-gray-700">Solutions designed to help your business grow and succeed.</p>
                </div>
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Investment Services</h3>
                    <p class="text-gray-700">Invest in your future with our expert financial advice and services.</p>
                </div>
            </div>
        </section>
    </main>
</x-layout>

