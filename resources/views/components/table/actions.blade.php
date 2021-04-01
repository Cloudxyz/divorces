@php

$params = isset($params) && is_array($params) ? $params : [];
$showRoute = isset($showRoute) ? $showRoute : '';
$editRoute = isset($editRoute) ? $editRoute : '';
$deleteRoute = isset($deleteRoute) ? $deleteRoute : '';

$skipShow = isset($skipShow) ? (bool) $skipShow : false;
$skipEdit = isset($skipEdit) ? (bool) $skipEdit : false;
$skipDelete = isset($skipDelete) ? (bool) $skipDelete : false;

@endphp

@if ($skipShow)
    <a href="{{ route($showRoute, $params) }}" class="text-primary mr-2">
        <i class="bi bi-eye-fill"></i>
    </a>
@endif

@if ($skipEdit)
    <a href="{{ route($editRoute, $params) }}" class="text-success mr-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
@endif

@if ($skipDelete)
    <a href="{{ route($deleteRoute, $params) }}" class="text-danger mr-2">
        <i class="bi bi-trash"></i>
    </a>
@endif
