<x-layout>
    <x-slot:title>Deposit</x-slot:title>
    <x-slot:heading>Deposit</x-slot:heading>
    <form method="POST" action="/transfer">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="amount" type="numeric" placeholder="Email id to transfer" required />
                            <x-form-error name="email" />
                        </div>
                        @if ($errors->has('noUser'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="amount">Amount</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="amount" id="amount" type="numeric" placeholder="Amount to deposit" required />
                            <x-form-error name="amount" />
                        </div>
                        @if ($errors->has('noBalance'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </x-form-field>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Transfer</x-form-button>
            </div>
    </form>

</x-layout>

