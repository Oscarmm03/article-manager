<div class="p-2 lg:p-8 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl font-medium text-gray-900">
        Articulos
    </div>

    <div class="mt-3">
        <div class="flex justify-between">
            <div>
                <div>
                    <input wire:model.live="filter" type="search" placeholder="Buscar" class="shadow appearance-none border rounded w-full py-2 px-3
                     text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-blue-400" name="" id="" />
                </div>
                <div class="mr-2">
                    <input type="checkbox" class="mr-2 leading-tight" name="" wire:model.live="active" />ver solo activos <!-- boton para ver solo los activos -->
                </div>
            </div>
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr><!-- Cabecera -->
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('id')">Id</button>

                        @if( $sortBy == 'id')
                            @if(!$sortAsc)
                                <span w-4 h-4 ml-2>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                </span>
                            @endif
                                @if($sortAsc)
                                    <span w-4 h-4 ml-2>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                    </svg>  
                                    </span>
                                @endif
                        @endif

                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('name')">Descripcción</button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('price')">Precio</button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('quantity')">Cantidad</button>
                        </div>
                    </th>
                    @if(!$active)
                    <th class="px-4 py-2">
                        Status
                    </th>
                    @endif
                    <th class="px-4 py-2">
                        Acción
                    </th>
                </tr>
            </thead><!-- mostrar datos de la tabla -->
             <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td class="rounded border px-4 py-2">{{$article->id}}</td>
                    <td class="rounded border px-4 py-2">{{$article->name}}</td>
                    <td class="rounded border px-4 py-2">{{number_format($article->price, 2)}}</td>
                    <td class="rounded border px-4 py-2">{{$article->quantity}}</td>
                    @if (!$active)
                    <td class="rounded border px-4 py-2">{{$article->status ? 'Activo':'Inactivo'}}</td>     
                    @endif
                    <td class="rounded border px-4 py-2">Editar / Eliminar</td>

                </tr>
                @endforeach
             </tbody>
        </table>

        {{ $articles->links() }}
    </div>

</div>
