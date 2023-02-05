<div class="relative overflow-x-auto p-4">
    <div class="flex justify-between items-center">
        <div class="flex gap-x-2">
            <div>
                <label for="outcome">Faktury kosztowe</label>
                <input wire:model="isIncome" type="radio" value="0" class="" name="is_income" id="outcome" />
            </div>
            <div>
                <label for="income">Faktury przychodowe</label>
                <input wire:model="isIncome" type="radio" value="1" class="" name="is_income"
                    id="income" />
            </div>
        </div>
        <div class="flex gap-x-2">
            <div>
                <select wire:model="searchMonth"
                    class="form-select form-select-lg mb-3
                        appearance-none
                        block
                        w-full
                        px-4
                        py-2
                        text-xl
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="year">
                    <option value="">Wybierz miesiąc</option>
                    @foreach ($months as $month)
                        <option value="{{ $month->id }}">
                            {{ __($month->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <select wire:model="searchYear"
                    class="form-select form-select-lg mb-3
                        appearance-none
                        block
                        w-full
                        px-4
                        py-2
                        text-xl
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="year">
                    <option value="">Wybierz rok</option>
                    @foreach ($years as $year)
                        <option value="{{ $year->id }}">
                            {{ $year->value }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ route('invoices.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Dodaj fakturę
        </a>
    </div>
    <div wire:loading.delay class="bg-stone-100 w-full">
        <div class=" flex justify-center items-center">
            Ładowanie danych...
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Numer faktury
                </th>
                <th scope="col" class="px-6 py-3">
                    Cena netto
                </th>
                <th scope="col" class="px-6 py-3">
                    Cena brutto
                </th>
                <th scope="col" class="px-6 py-3">
                    Data wystawienia
                </th>
                <th scope="col" class="px-6 py-3">
                    Data sprzedaży
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcje
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $invoice->number }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $invoice->price_netto }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $invoice->price_brutto }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $invoice->invoice_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $invoice->sell_date }}
                    </td>
                    <td class="px-6 py-4 flex gap-x-2">
                        <a href="{{ route('invoices.edit', $invoice) }}"
                            class="bg-sky-200 hover:bg-sky-400 font-bold py-2 px-4 rounded">Edytuj</a>
                        <button
                            onclick="return confirm('Czy na pewno chcesz usunąć tę fakturę?') || event.stopImmediatePropagation()"
                            wire:click="deleteInvoice('{{ $invoice->id }}')" type="button"
                            class="bg-red-200 hover:bg-red-400 font-bold py-2 px-4 rounded">Usuń</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end">
        {{ $invoices->links() }}
    </div>
</div>
