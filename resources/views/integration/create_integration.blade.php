@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title border-bottom pb-2">Integratsiya qo'shish</h6>
                <form class="forms-sample" method="POST" action="/integration">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="INT01">Integratsiya turi</label>
                            <select class="form-control @error('INT01') is-invalid @enderror" id="INT01" name="INT01">
                                <option selected="" disabled="" value="0">Integratsiya turini tanlang</option>
                                <option value="1">Qabul qiluvchi integratsiya</option>
                                <option value="2">Yuboruvchi integratsiya</option>
                            </select>
                            @error('INT01')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="INT02">TYPE_ID</label>
                            <input type="text" class="form-control @error('INT02') is-invalid @enderror" id="INT02" name="INT02" autocomplete="off" value="{{ old('INT02') }}" maxlength="5">
                            @error('INT02')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="NAME">Tashkilot nomi</label>
                            <input type="text" class="form-control @error('NAME') is-invalid @enderror" id="NAME" name="NAME" autocomplete="off" value="{{ old('NAME') }}">
                            @error('NAME')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="VAL01">Ma'lumot turi</label>
                            <input type="text" class="form-control @error('VAL01') is-invalid @enderror" id="VAL01" name="VAL01" autocomplete="off" value="{{ old('VAL01') }}">
                            @error('VAL01')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="INT03">Yangilanish davri</label>
                            <select class="form-control @error('INT03') is-invalid @enderror" id="INT03" name="INT03">
                                <option selected="" disabled="" value="0">Yangilanish davrini tanlang</option>
                                @foreach($periods as $period)
                                <option value="{{ $period->int01 }}">{{ $period->name_uz }}</option>
                                @endforeach
                            </select>
                            @error('INT03')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="VAL02">Ulanish nuqtasi</label>
                            <input type="text" class="form-control @error('VAL02') is-invalid @enderror" id="VAL02" name="VAL02" autocomplete="off" value="{{ old('VAL02') }}">
                            @error('VAL02')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LONG01">Joylashuv joyi</label>
                                <textarea class="form-control @error('LONG01') is-invalid @enderror" id="LONG01" name="LONG01" rows="5">{{ old('LONG01') }}</textarea>
                                @error('LONG01')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LONG02">Izoh</label>
                                <textarea class="form-control @error('LONG02') is-invalid @enderror" id="LONG02" name="LONG02" rows="5">{{ old('LONG02') }}</textarea>
                                @error('LONG02')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Qo'shish</button>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Orqaga qaytish</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
