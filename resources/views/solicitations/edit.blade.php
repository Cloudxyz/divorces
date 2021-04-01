<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Solicitation') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <form action="{{ route('solicitations.update', [$solicitation->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="divorce_id" class="form-label">Tipo de Divorcio</label>
                <select class="form-select" id="divorce_id" name="divorce_id">
                    <option selected>Select Type of Divorce</option>
                    @foreach ($typesDivorces as $type)
                        <option value="{{ $type->id }}"
                            {{ $solicitation->divorce_id == $type->id ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name_client" class="form-label">Tu Nombre</label>
                <input type="text" class="form-control" id="name_client" name="name_client"
                    value="{{ $solicitation->name_client }}">
            </div>
            <div class="mb-3">
                <label for="telephone_client" class="form-label">Tu Teléfono</label>
                <input type="text" class="form-control" id="telephone_client" name="telephone_client"
                    value="{{ $solicitation->telephone_client }}">
            </div>
            <div class="mb-3">
                <label for="name_couple" class="form-label">Nombre de la Expareja</label>
                <input type="text" class="form-control" id="name_couple" name="name_couple"
                    value="{{ $solicitation->name_couple }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" placeholder="Descripción" id="description"
                    name="description">{{ $solicitation->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estatus</label>
                <select class="form-select" id="status" name="status">
                    <option selected>Select Type of Status</option>
                    @foreach ($statusSoliciations as $status)
                        <option value="{{ $status->id }}"
                            {{ $solicitation->status == $status->id ? 'selected' : '' }}>{{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-app-layout>
