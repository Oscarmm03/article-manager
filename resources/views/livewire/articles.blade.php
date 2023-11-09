<div class="p-2 lg:p-8 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl font-medium text-gray-900">
        Articulos
    </div>

    <div class="mt-3">
        <div class="flex justify-between">
            <div>
                <div>
                    <input wire:model.live="filter" type="search" placeholder="Buscar" class="shadow appearance-none border rouded w-full py-2 px-3
                     text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-blue-400" name="" id="" />
                </div>
                <div class="mr-2">
                    <input type="checkbox" class="mr-2 leading-tight" name="" wire:model.live="active"/>ver solo activos <!-- boton para ver solo los activos -->
                </div>
            </div>
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr><!-- Cabecera -->
                    <th class="px-4 py-2">
                        <div class="flex items-center">Id</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Descripcción</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Precio</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Cantidad</div>
                    </th>
                    <th class="px-4 py-2">
                        Status
                    </th>
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
                    <td class="rounded border px-4 py-2">{{$article->status ? 'Activo':'Inactivo'}}</td>
                    <td class="rounded border px-4 py-2">Editar / Eliminar</td>

                </tr>
                @endforeach
             </tbody>
        </table>

        {{ $articles->links() }}
    </div>

</div>
