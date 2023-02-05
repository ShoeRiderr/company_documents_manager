<div class="container space-y-2 p-4">
    <div>
        <label for="{{ $side }}-name">{{ $side === 'seller' ? 'Sprzedawca' : 'Nabywca' }}</label>
        <input wire:model='invoice.{{ $side }}.name'
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-name" name="invoice.{{ $side }}.name" />
    </div>
    <div>
        <label for="{{ $side }}-NIP">NIP</label>
        <input wire:model='invoice.{{ $side }}.NIP'
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-NIP" name="invoice.{{ $side }}.NIP" />
    </div>
    <div>
        <label for="{{ $side }}-street">Ulica</label>
        <input wire:model='invoice.{{ $side }}.street'
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-street" name="invoice.{{ $side }}.street" />
    </div>
    <div>
        <label for="{{ $side }}-city">Miasto</label>
        <input wire:model='invoice.{{ $side }}.city'
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-city" name="invoice.{{ $side }}.city" />
    </div>
</div>
