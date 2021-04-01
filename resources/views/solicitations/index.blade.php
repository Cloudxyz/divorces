<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('solicitations.index') }}">{{ __('Solicitations') }}</a>
            - <a href="{{ route('solicitations.create') }}" class="btn btn-primary">Crear</a>
        </h2>
    </x-slot>
    <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Pareja</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estatus</th>
                    @can('solicitations show')
                        <th scope="col">Historial</th>
                    @endcan
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse ($solicitations as $solicitation)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $solicitation->name_client }}</td>
                        <td>{{ $solicitation->telephone_client }}</td>
                        <td>{{ $solicitation->name_couple }}</td>
                        <td>{{ getSubString($solicitation->description, 20) }}</td>
                        <td>
                            {!! getStatusSolicitation($solicitation->status) !!}
                        </td>
                        @can('solicitations show')
                            <td>
                                <a href="{{ route('solicitations.historial', [$solicitation->id]) }}">Ver <i
                                        class="bi bi-folder-symlink-fill"></i></a>
                            </td>
                        @endcan
                        <td>
                            @include('components.table.actions', [
                            'params' => [$solicitation->id],
                            'showRoute' => 'solicitations.show',
                            'editRoute' => 'solicitations.edit',
                            'deleteRoute' => 'solicitations.destroy',
                            'skipShow' => current_user()->can('solicitations show'),
                            'skipEdit' => current_user()->can('solicitations edit'),
                            'skipDelete' => current_user()->can('solicitations delete')
                            ])
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            No se encontraron registros
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
