@extends('layouts.app')
@section('content')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-4">
            <li class="breadcrumb-item"><a href="#">Интеграция</a></li>
            <li class="breadcrumb-item active" aria-current="page">Интеграция ўзратириш</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title border-bottom pb-2">Интеграция ўзгартириш <span class="text-muted">ID:{{ $integration->ID }}</span></h6>
                    <form class="forms-sample" method="POST" action="/integration/{{ $integration->ID }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="INT01">Интеграция тури</label>
                                <select class="form-control @error('INT01') is-invalid @enderror" id="INT01" name="INT01">
                                    <option disabled="">Интеграция турини танланг</option>
                                    <option value="1" {{ old('INT01') == 1 ? 'selected' : '' }}>Қабул килувчи интеграция</option>
                                    <option value="2" {{ old('INT01') == 1 ? 'selected' : '' }}>Юборувчи интеграция</option>
                                </select>
                                @error('INT01')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="INT02">TYPE_ID</label>
                                <input type="text" class="form-control @error('INT02') is-invalid @enderror" id="INT02" name="INT02" autocomplete="off" value="{{ $integration->TYPE_ID }}" maxlength="5">
                                @error('INT02')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="NAME">Ташкилот номи</label>
                                <input type="text" class="form-control @error('NAME') is-invalid @enderror" id="NAME" name="NAME" autocomplete="off" value="{{ $integration->NAME }}">
                                @error('NAME')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="VAL01">Маълумот тури</label>
                                <input type="text" class="form-control @error('VAL01') is-invalid @enderror" id="VAL01" name="VAL01" autocomplete="off" value="{{ $integration->VAL01 }}">
                                @error('VAL01')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="INT03">Янгиланиш даври</label>
                                <select class="form-control @error('INT03') is-invalid @enderror" id="INT03" name="INT03">
                                    <option disabled="">Янгиланиш даврини танланг</option>
                                    <option value="1" {{ old('INT03') == 1 ? 'selected' : '' }}>Кунлик</option>
                                    <option value="7" {{ old('INT03') == 1 ? 'selected' : '' }}>Ҳафталик</option>
                                    <option value="30" {{ old('INT03') == 1 ? 'selected' : '' }}>Ойлик</option>
                                    <option value="90" {{ old('INT03') == 1 ? 'selected' : '' }}>Чораклик</option>
                                    <option value="360" {{ old('INT03') == 1 ? 'selected' : '' }}>Йиллик</option>
                                    <option value="0" {{ old('INT03') == 1 ? 'selected' : '' }}>Онлайн(GET сўров асосида)</option>
                                </select>
                                @error('INT03')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="VAL02">Уланиш нуктаси</label>
                                <input type="text" class="form-control @error('VAL02') is-invalid @enderror" id="VAL02" name="VAL02" autocomplete="off" value="{{ $integration->VAL02 }}">
                                @error('VAL02')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="LONG01">Жойлашув жойи</label>
                                    <textarea class="form-control @error('LONG01') is-invalid @enderror" id="LONG01" name="LONG01" rows="5">{{ $integration->LONG01 }}</textarea>
                                    @error('LONG01')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="LONG02">Изоҳ</label>
                                    <textarea class="form-control @error('LONG02') is-invalid @enderror" id="LONG02" name="LONG02" rows="5">{{ $integration->LONG02 }}</textarea>
                                    @error('LONG02')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Кўшиш</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light">Орқага қайтиш</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
