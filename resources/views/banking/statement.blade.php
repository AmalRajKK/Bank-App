<x-layout>
    <x-slot:title>Account Statement</x-slot:title>
    <x-slot:heading>Account Statement</x-slot:heading>
<div class="container mx-auto px-4 py-6">
    @if (session('success'))
        <div class="alert alert-success mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($transactions->isEmpty())
        <p class="text-gray-600">No transactions found.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left">Type</th>
                        <th class="py-2 px-4 text-left">Details</th>
                        <th class="py-2 px-4 text-left">Amount</th>
                        <th class="py-2 px-4 text-left">Balance</th>
                        <th class="py-2 px-4 text-left">Recipient</th>
                        <th class="py-2 px-4 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="py-2 px-4">{{ ucfirst($transaction->type) }}</td>
                        <td class="py-2 px-4">{{ $transaction->details }}</td>
                        <td class="py-2 px-4">{{ number_format($transaction->amount, 2) }}</td>
                        <td class="py-2 px-4">{{ $transaction->balance }}</td>
                        <td class="py-2 px-4">
                            @if($transaction->type == 'debit' || $transaction->type == 'credit')
                                {{ $transaction->recipient ? $transaction->recipient->email : 'N/A' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</x-layout>
