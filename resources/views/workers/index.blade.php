@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Нанято в год</h2>
            @include('workers.blocks.chart')

            <h2>Список сотрудников</h2>
            <a href="{{ route('workers.create') }}"
               class="btn btn-success mb-3">Создать</a>

            @include('workers.blocks.list')
        </div>
    </div>
@endsection
