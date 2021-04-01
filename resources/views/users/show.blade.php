<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Perfil de Usuario') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <label for="firstname" class="form-label">Nombre</label>
                <div class="form-control">{{ $user->profile->firstname }}</div>
            </div>
            <div class="col">
                <label for="lastname" class="form-label">Apellido</label>
                <div class="form-control">{{ $user->profile->lastname }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="phone" class="form-label">Teléfono</label>
                <div class="form-control">{{ $user->profile->phone }}</div>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <div class="form-control">{{ $user->email }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="country" class="form-label">País</label>
                <div class="form-control">{{ $user->profile->country }}</div>
            </div>
            <div class="col">
                <label for="state" class="form-label">Estado</label>
                <div class="form-control">{{ $user->profile->state }}</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="city" class="form-label">Ciudad</label>
                <div class="form-control">{{ $user->profile->city }}</div>
            </div>
            <div class="col">
                <label for="street" class="form-label">Calle</label>
                <div class="form-control">{{ $user->profile->street }}</div>
            </div>
            <div class="col">
                <label for="zip" class="form-label">C.P.</label>
                <div class="form-control">{{ $user->profile->zip }}</div>
            </div>
        </div>
        @if (current_user()->hasRole('admin'))
            <div class="mb-3">
                <label for="roles" class="form-label">Permisos</label>
                <br />
                {!! generateColumnsPermissions($user->permissions, 4, $user, true) !!}
            </div>
        @endif
        <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-primary">Editar</a>
    </div>
</x-app-layout>
