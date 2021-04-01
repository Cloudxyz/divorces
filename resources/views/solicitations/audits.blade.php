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
                    <th scope="col">Acción</th>
                    <th scope="col">Información Vieja</th>
                    <th scope="col">Información Nueva</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse ($audits as $audit)
                    @php
                        $metaData = $audit->getMetadata();
                        $action = $metaData['audit_event'];
                        $date = $audit->created_at;
                        $oldValues = $audit->old_values;
                        $newValues = $audit->new_values;
                    @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ ucwords($action) }}</td>
                        <td>
                            @foreach(getAuditClean($oldValues) as $value)
                                {!! $value !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach(getAuditClean($newValues) as $value)
                                {!! $value !!}
                            @endforeach
                        </td>
                        <td>{{ $date }}</td>
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
