<form method="POST" wire:submit.prevent='save'>
    @csrf
    @if ($invoice)
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="container space-y-4 p-4">

        <div class="flex justify-end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Zapisz
            </button>
        </div>
        <div class="grid md:grod-cols-3 sm:grid-cols-2 grid-cols-1 sm:gap-x-4 gap-y-4">
            <div>
                <label for="number">Numer faktury</label>
                <input wire:model='invoice.number'
                    class="{{ $errors->has('invoice.number') ? 'border-rose-600' : '' }}
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="number" name="invoice.number" />
                @error('invoice.number')
                    <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="city">Miejsce wystawienia</label>
                <input wire:model='invoice.city'
                    class="{{ $errors->has('invoice.city') ? 'border-rose-600' : '' }}
                        shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="city" name="invoice.city_id" />
                @error('invoice.city')
                    <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="invoice_date">Data wystawienia</label>
                <input wire:model='invoice.invoice_date'
                    class="{{ $errors->has('invoice.invoice_date') ? 'border-rose-600' : '' }}
                        shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="date" id="invoice_date" name="invoice.invoice_date" />
                @error('invoice.invoice_date')
                    <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="sell_date">Data sprzedaży</label>
                <input wire:model='invoice.sell_date'
                    class="{{ $errors->has('invoice.sell_date') ? 'border-rose-600' : '' }}
                        shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="date" id="sell_date" name="invoice.sell_date" />
                @error('invoice.sell_date')
                    <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <p class="pb-2">Rodzaj faktury</p>
                <div class="flex gap-x-4">
                    <div>
                        <label for="outcome">Faktura kosztowa</label>
                        <input wire:model='invoice.is_income'
                            class="{{ $errors->has('invoice.is_income') ? 'border-rose-600' : '' }}" type="radio"
                            value="0" name="invoice.is_income" id="outcome" />
                    </div>
                    <div>
                        <label for="income">Faktura przychodowa</label>
                        <input wire:model='invoice.is_income'
                            class="{{ $errors->has('invoice.is_income') ? 'border-rose-600' : '' }}" type="radio"
                            value="1" name="invoice.is_income" id="income" />
                    </div>
                </div>
                @error('invoice.is_income')
                    <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="payment_method_id">Metoda płatności</label>
                <div class="relative">
                    <select wire:model='invoice.payment_method_id'
                        class="{{ $errors->has('invoice.payment_method_id') ? 'border-rose-600' : '' }}
                            block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="invoice.payment_method_id" id="payment_method_id">
                        @foreach ($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod->id }}">
                                {{ $paymentMethod->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('invoice.payment_method_id')
                        <span class="text-xs text-rose-600">{{ $message }}</span>
                    @enderror
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
        @error('products.*')
            <span class="text-xs text-rose-600">{{ $message }}</span>
        @enderror
    </div>
</form>
