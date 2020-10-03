@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Редактирование сотрудника</h1>

            <form action="{{ route('workers.update', $worker) }}" method="post">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name"
                           name="name" value="{{ old('name', $worker->name) }}">
                    @if ($errors->has('name'))
                        <span
                            class="app-invalid-feedback invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone"
                           name="phone"
                           value="{{ old('phone', $worker->phone) }}">
                    @if ($errors->has('phone'))
                        <span
                            class="app-invalid-feedback invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date">Дата найма</label>
                    <input type="text" class="form-control" id="date"
                           name="employment_date" placeholder="yyyy-mm-dd"
                           value="{{ old('employment_date', $worker->employment_date) }}">
                    @if ($errors->has('employment_date'))
                        <span
                            class="app-invalid-feedback invalid-feedback"><strong>{{ $errors->first('employment_date') }}</strong></span>
                    @endif
                </div>
                @csrf
                <button type="submit" class="btn
                    btn-success">Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
