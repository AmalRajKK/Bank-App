<x-layout>
    <x-slot:title>About</x-slot:title>
    <x-slot:heading>About</x-slot:heading>
    <x-slot:title>About ABC Bank</x-slot:title>
    <x-slot:heading>About ABC Bank</x-slot:heading>

    <main class="container mx-auto px-4 py-8">
        <section class="text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">About Us</h1>
            <p class="text-lg text-gray-700 mb-6">
                ABC Bank has been serving the community since 1901. Our mission is to provide reliable and efficient banking services to all our customers.
            </p>
        </section>

        <section class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Integrity</h3>
                    <p class="text-gray-700">We adhere to the highest standards of honesty and ethical behavior.</p>
                </div>
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Customer Service</h3>
                    <p class="text-gray-700">We prioritize our customers' needs and strive to exceed their expectations.</p>
                </div>
                <div class="border border-gray-200 p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Innovation</h3>
                    <p class="text-gray-700">We embrace new technologies to provide better services and solutions.</p>
                </div>
            </div>
        </section>
    </main>
</x-layout>
