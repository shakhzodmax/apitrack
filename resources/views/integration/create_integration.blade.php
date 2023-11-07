@extends('layouts.app')
@section('content')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Интеграциялар</a></li>
                <li class="breadcrumb-item active" aria-current="page">Интеграция кушиш</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Интеграция кушиш</h6>
                        <form class="forms-sample" method="POST" action="/integration">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="NAME">Ташкилот номи</label>
                                    <input type="text" class="form-control @error('NAME') is-invalid @enderror" id="NAME" name="NAME" autocomplete="off" value="{{ old('NAME') }}">
                                    @error('NAME')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="TITLE">Маълумот тури</label>
                                    <input type="text" class="form-control @error('TITLE') is-invalid @enderror" id="TITLE" name="TITLE" autocomplete="off" value="{{ old('TITLE') }}">
                                    @error('TITLE')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="DATE01">Охирги янгиланган сана</label>
                                    <div class="input-group date datepicker" id="datePickerExample">
                                        <input value="{{ old('DATE01') }}" name="DATE01" id="DATE01" type="text" class="form-control @error('DATE01') is-invalid @enderror"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                    </div>
                                    @error('DATE01')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DATE02">Охирги янгиланган сана</label>
                                    <div class="input-group date datepicker" id="datePickerExample2">
                                        <input value="{{ old('DATE02') }}" name="DATE02" id="DATE02" type="text" class="form-control @error('DATE02') is-invalid @enderror"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                    </div>
                                    @error('DATE02')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="INT01">Янгиланиш даври</label>
                                    <input type="text" class="form-control @error('INT01') is-invalid @enderror" id="INT01" name="INT01" autocomplete="off" value="{{ old('INT01') }}">
                                    @error('INT01')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="VAL01">Уланиш нуктаси</label>
                                    <input type="text" class="form-control @error('VAL01') is-invalid @enderror" id="VAL01" name="VAL01" autocomplete="off" value="{{ old('VAL01') }}">
                                    @error('VAL01')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="LONG01">Изох</label>
                                        <textarea class="form-control" id="LONG01" name="LONG01" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Кушиш</button>
                            <button class="btn btn-light">Бекор килиш</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
