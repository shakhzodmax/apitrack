@php use App\Models\Integration; @endphp
@extends('layouts.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-4">
            <li class="breadcrumb-item"><a href="/dashboard">Bosh sahifa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Qabul qiluvchi integratsiyalar jadvali</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: 0px !important;">
                    <h6 class="card-title text-muted" style="margin-bottom: 0px;">Qabul qiluvchi integratsiyalar</h6>
                    <a href="{{ route('send-statuses') }}" class="btn btn-sm btn-dark py-1 px-2"><i style="width: 15px;" data-feather="send"></i> Telegram botga yuborish</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered table-hover border rounded">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tashkilot nomi</th>
                                <th>Ma'lumot turi</th>
                                <th>Yangilanish davri</th>
                                <th>Oxirgi yangilanish sanasi</th>
                                <th>Holati</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($integrations as $integration)
                                <tr>
                                    <td class="border-right">{{ $integration->id }}</td>
                                    <td>
                                        <a href="#" class="nav-link" style="padding:0px;">
                                            {{ $integration->name }}
                                        </a>
                                    </td>
                                    <td>{{ $integration->val01 }}</td>
                                    <td>{{ $integration->name_uz }}</td>
                                    <td>{{ Integration::formatDate(Integration::getLastUpdateDate($integration->int02)) }}</td>
                                    <td class="text-center">@if(Integration::checkStatusForTable($integration->int02)) <span class="badge badge-success w-65 text-uppercase">Yangilangan</span> @else <span class="badge badge-danger w-65 text-uppercase">Yangilanmagan</span> @endif</td>
                                    <td class="border-left">
                                        <div class="d-flex justify-content-md-around">
                                            <a href="{{'/integration/'.$integration->id.'/edit'}}">
                                                <button type="button" class="btn btn-facebook btn-icon">
                                                    <i data-feather="edit"></i>
                                                </button>
                                            </a>
                                            <form action="/integration/{{ $integration->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-dribbble btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">Ma'lumot mavjud emas</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
