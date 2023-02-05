<div class="container space-y-4 p-4">
    <form action method="POST" wire:submit.prevent='"save'>
        @csrf
    </form>
    <div class="grid md:grod-cols-3 sm:grid-cols-2 grid-cols-1 sm:gap-x-4 gap-y-4">
        <div>
            <label for="number">Numer faktury</label>
            <input wire:model='invoice.number'
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="number" name="invoice.number" />
        </div>
        <div>
            <label for="city">Miejsce wystawienia</label>
            <input wire:model='invoice.city'
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="city" name="invoice.city_id" />
        </div>
        <div>
            <label for="invoice_date">Data wystawienia</label>
            <input wire:model='invoice.invoice_date'
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="date" id="invoice_date" name="invoice.invoice_date" />
        </div>
        <div>
            <label for="sell_date">Data sprzedaży</label>
            <input wire:model='invoice.sell_date'
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="date" id="sell_date" name="invoice.sell_date" />
        </div>
        <div>
            <p class="pb-2">Rodzaj faktury</p>
            <div class="flex gap-x-4">
                <div>
                    <label for="outcome">Faktura kosztowa</label>
                    <input wire:model='invoice.is_income' type="radio" value="0" name="invoice.is_income"
                        id="outcome" />
                </div>
                <div>
                    <label for="income">Faktura przychodowa</label>
                    <input wire:model='invoice.is_income' type="radio" value="1" name="invoice.is_income"
                        id="income" />
                </div>
            </div>
        </div>
        <div>
            <label for="payment_method">Metoda płatności</label>
            <div class="relative">
                <select wire:model='invoice.payment_method'
                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="invoice.payment_method" id="payment_method">
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}">
                            {{ $paymentMethod->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <h3 class="text-2xl">Strony</h3>
    <div class="flex sm:flex-row flex-col sm:gap-x-4 sm:gap-y-0 gap-y-4">
        @include('livewire.invoice.company', [
            'side' => 'seller',
        ])
        @include('livewire.invoice.company', [
            'side' => 'buyer',
        ])
    </div>
    @include('livewire.invoice.product-table')
</div>
