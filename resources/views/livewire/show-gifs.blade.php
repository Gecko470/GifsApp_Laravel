<div class="flex flex-row mt-8">
    <div class="basis-24 md:basis-60 bg-gray-900 text-center mr-6 pt-4 min-h-screen">
        <h2 class="text-xl md:text-5xl text-yellow-500 mb-6"><strong>Gifs App</strong></h2>
        <hr class="text-yellow-500">
        @foreach ($historial as $item)
        <div class="cursor-pointer w-16 md:w-40 text-gray-900 text-l md:text-2xl bg-yellow-500 rounded-lg text-center inline-block align-middle border border-2 border-gray-900 my-2"
            wire:click="search('{{ $item }}')"><strong>{{ $item }}</strong></div>
        <br>
        @endforeach
    </div>
    <div class="flex-1 mr-4">
        <div class="my-10 flex items-center">
            <div class="flex-1 mr-4">
                <input class="w-full h-6 md:h-10 pl-2 border border-yellow-500" type="text" wire:model.lazy="termino"
                    placeholder="Busca..">
            </div>
            <div class="cursor-pointer w-16 md:w-40 text-gray-900 text-l md:text-2xl bg-yellow-500 rounded-lg text-center inline-block align-middle border border-2 border-gray-900"
                wire:click="buscar"><strong>Buscar</strong></div>
        </div>
        <div>
            <div wire:loading wire:target="buscar"
                class="bg-yellow-300 border border-l-8 border-yellow-500 text-yellow-700 p-4 w-full my-2" role="alert">
                Cargando...
            </div>
            @if ($res == "1")
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3" wire:init="loadGifs">
                @for ($i = 0; $i < 45; $i++) <div class="rounded">
                    @php
                    $img = $datos["data"][$i]["images"]["downsized_medium"]["url"];
                    @endphp
                    <img src="{{ $img }}">
            </div>
            @endfor
            @elseif($res == "0")
            <div class="bg-yellow-300 border border-l-8 border-yellow-500 text-yellow-700 p-4" role="alert">
                No se han encontrado resultados con ese término..
            </div>
            @endif
        </div>
    </div>
</div>
</div>