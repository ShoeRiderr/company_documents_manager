<div class="container space-y-2 p-4">
    <div>
        <label for="{{ $side }}-name">{{ $side === 'seller' ? 'Sprzedawca' : 'Nabywca' }}</label>
        <input wire:model='{{ $side }}.name'
            class="{{ $errors->has($side . '.name') ? 'border-rose-600' : '' }}
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-name" name="{{ $side }}_name" />
        @if ($errors->has($side . '.name'))
            <span class="text-xs text-rose-600">{{ $errors->first($side . '.name') }}</span>
        @endif
    </div>
    <div>
        <label for="{{ $side }}-NIP">NIP</label>
        <input wire:model='{{ $side }}.NIP'
            class="{{ $errors->has($side . '.NIP') ? 'border-rose-600' : '' }}
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-NIP" name="{{ $side }}_NIP" />
        @if ($errors->has($side . '.NIP'))
            <span class="text-xs text-rose-600">{{ $errors->first($side . '.NIP') }}</span>
        @endif
    </div>
    <div>
        <label for="{{ $side }}-street">Ulica</label>
        <input wire:model='{{ $side }}.street'
            class="{{ $errors->has($side . '.street') ? 'border-rose-600' : '' }}
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-street" name="{{ $side }}_street" />
        @if ($errors->has($side . '.street'))
            <span class="text-xs text-rose-600">{{ $errors->first($side . '.street') }}</span>
        @endif
    </div>
    <div class="flex gap-x-2">
        <div>
        <label for="{{ $side }}-build_num">Numer budynku</label>
            <input wire:model='{{ $side }}.build_num'
                class="{{ $errors->has($side . '.build_num') ? 'border-rose-600' : '' }}
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="{{ $side }}-build_num" name="{{ $side }}_street" />
            @if ($errors->has($side . '.build_num'))
                <span class="text-xs text-rose-600">{{ $errors->first($side . '.build_num') }}</span>
            @endif
        </div>
        <div>
        <label for="{{ $side }}-apart_num">Numer mieszkania (opcjonalnie)</label>
            <input wire:model='{{ $side }}.apart_num'
                class="{{ $errors->has($side . '.apart_num') ? 'border-rose-600' : '' }}
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="{{ $side }}-apart_num" name="{{ $side }}_street" />
            @if ($errors->has($side . '.apart_num'))
                <span class="text-xs text-rose-600">{{ $errors->first($side . '.apart_num') }}</span>
            @endif
        </div>
        <div>
        <label for="{{ $side }}-post_code">Kod pocztowy</label>
            <input wire:model='{{ $side }}.post_code'
                class="{{ $errors->has($side . '.post_code') ? 'border-rose-600' : '' }}
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="{{ $side }}-post_code" name="{{ $side }}_street" />
            @if ($errors->has($side . '.post_code'))
                <span class="text-xs text-rose-600">{{ $errors->first($side . '.post_code') }}</span>
            @endif
        </div>
    </div>
    <div>
        <label for="{{ $side }}-city">Miasto</label>
        <input wire:model='{{ $side }}.city'
            class="{{ $errors->has($side . '.city') ? 'border-rose-600' : '' }}
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" id="{{ $side }}-city" name="{{ $side }}_city" />
        @if ($errors->has($side . '.city'))
            <span class="text-xs text-rose-600">{{ $errors->first($side . '.city') }}</span>
        @endif
    </div>
</div>
