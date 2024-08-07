<x-layout>
    <x-slot:title>User Menu</x-slot:title>
    <x-slot:heading>Dashboard</x-slot:heading>
    <div style="padding: 25px">
    <h1>WELCOME  : {{ Auth::user()->name }} </h1>
    </div>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">Your Id</th>
                <th class="py-2 px-4 text-left">Your Balance</th>
            </tr>
        </thead>
        <tbody>
                <td class="py-2 px-4">{{ Auth::user()->email}}</td>
                <td class="py-2 px-4">{{ $account->balance }}-INR</td>
        </tbody>
    </table>
</x-layout>
