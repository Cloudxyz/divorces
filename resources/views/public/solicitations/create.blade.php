<x-app-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Solicitation') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <form action="{{ route('solicitations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="divorce_id" class="form-label">Tipo de Divorcio</label>
                <select class="form-select" id="divorce_id" name="divorce_id">
                    <option selected>Select Type of Divorce</option>
                    @foreach ($typesDivorces as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name_client" class="form-label">Tu Nombre</label>
                <input type="text" class="form-control" id="name_client" name="name_client">
            </div>
            <div class="mb-3">
                <label for="telephone_client" class="form-label">Tu Teléfono</label>
                <input type="text" class="form-control" id="telephone_client" name="telephone_client">
            </div>
            <div class="mb-3">
                <label for="name_couple" class="form-label">Nombre de la Expareja</label>
                <input type="text" class="form-control" id="name_couple" name="name_couple">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" placeholder="Descripción" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</x-app-public-layout>
