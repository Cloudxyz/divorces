<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualizar Perfil de Usuario') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <form action="{{ route('users.update', [$user->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="firstname" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        value="{{ $user->profile->firstname }}">
                </div>
                <div class="col">
                    <label for="lastname" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        value="{{ $user->profile->lastname }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $user->profile->phone }}">
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="country" class="form-label">País</label>
                    <input type="text" class="form-control" id="country" name="country"
                        value="{{ $user->profile->country }}">
                </div>
                <div class="col">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="state" name="state"
                        value="{{ $user->profile->state }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $user->profile->city }}">
                </div>
                <div class="col">
                    <label for="street" class="form-label">Calle</label>
                    <input type="text" class="form-control" id="street" name="street"
                        value="{{ $user->profile->street }}">
                </div>
                <div class="col">
                    <label for="zip" class="form-label">C.P.</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="{{ $user->profile->zip }}">
                </div>
            </div>
            @if (current_user()->hasRole('admin'))
                <div class="mb-3">
                    <label for="roles" class="form-label">Permisos</label>
                    <br />
                    {!! generateColumnsPermissions($permissions, 4, $user) !!}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-app-layout>
