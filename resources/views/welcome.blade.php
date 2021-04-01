<x-app-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <a href="{{ route('solicitations.create') }}">Crear Solicitación</a>
    </div>
</x-app-public-layout>
