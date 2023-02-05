<table class="w-full table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3"></th>
            <th scope="col" style="width:30%;" class="px-6 py-3">Nazwa towaru lub usługi</th>
            <th scope="col" class="px-6 py-3">Ilość</th>
            <th scope="col" class="px-6 py-3">Cena netto</th>
            <th scope="col" class="px-6 py-3">Wartość netto</th>
            <th scope="col" class="px-6 py-3">Stawka VAT</th>
            <th scope="col" class="px-6 py-3">Kwota VAT</th>
            <th scope="col" class="px-6 py-3">Wartość brutto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
            <tr>
                <td class="align-top px-6 py-4">
                    <button class="bg-red-200 hover:bg-red-400 py-2 px-4 rounded text-xs" type="button"
                        wire:click='removeProduct({{ $key }})'>Usuń element</button>
                </td>
                <td class="align-top px-6 py-4">
                    <textarea wire:model='products.{{ $key }}.name'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="products[{{ $key }}]['name']"></textarea>
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.amount'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="products[{{ $key }}]['amount']" />
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.price_netto'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="products['price_netto'][{{ $key }}]">
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.price_netto_value'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" disabled name="products[{{ $key }}]['price_netto_value']">
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.vat_percent'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="products[{{ $key }}]['vat_percent']">
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.vat_amount'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" disabled name="products[{{ $key }}]['vat_amount']">
                </td>
                <td class="align-top px-6 py-4">
                    <input wire:model='products.{{ $key }}.price_brutto'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="products[{{ $key }}]['price_brutto']">
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="align-top px-6 py-4">
                <button type="button" class="bg-stone-200 hover:bg-stone-400 font-bold py-2 px-4 rounded"
                    wire:click='addProduct'>Dodaj produkt</button>
                </th>
        </tr>
    </tbody>
</table>
