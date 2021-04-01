<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permisos</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $user->profile->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width: 50%">
                            @foreach ($user->getPermissionNames() as $permission)
                                {{ ucwords($permission) }},
                            @endforeach
                        </td>
                        <td>
                            @include('components.table.actions', [
                            'params' => [$user->id],
                            'showRoute' => 'users.show',
                            'editRoute' => 'users.edit',
                            'deleteRoute' => 'users.destroy',
                            'skipShow' => current_user()->can('users index'),
                            'skipEdit' => current_user()->can('users edit'),
                            'skipDelete' => current_user()->can('users delete')
                            ])
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
