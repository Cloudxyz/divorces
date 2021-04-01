<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Solicitation') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="mb-3">
            {!! getStatusSolicitation($solicitation->status) !!}
        </div>
        <div class="mb-3">
            <label for="divorce_id" class="form-label">Tipo de Divorcio</label>
            <div class="form-control">{{ $typeDivorces->name }}</div>
        </div>
        <div class="mb-3">
            <label for="name_client" class="form-label">Tu Nombre</label>
            <div class="form-control">{{ $solicitation->name_client }}</div>
        </div>
        <div class="mb-3">
            <label for="telephone_client" class="form-label">Tu Teléfono</label>
            <div class="form-control">{{ $solicitation->telephone_client }}</div>
        </div>
        <div class="mb-3">
            <label for="name_couple" class="form-label">Nombre de la Expareja</label>
            <div class="form-control">{{ $solicitation->name_couple }}</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <div class="form-control">{{ $solicitation->description }}</div>
        </div>
        @can('solicitations edit')
            <a href="{{ route('solicitations.edit', [$solicitation->id]) }}" class="btn btn-primary">Editar</a>
        @endcan
    </div>
</x-app-layout>
