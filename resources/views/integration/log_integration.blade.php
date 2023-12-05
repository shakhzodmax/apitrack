@php use App\Models\Integration; @endphp
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="card-title" style="margin-bottom: 0px;">Integratsiya moduli jurnali</h6>
                        <div class="d-flex">
                            <a class="float-right" href="#">
                                <button type="button" class="btn btn-behance">Yuklab olish</button>
                            </a>
                        </div>
                    </div>
                    <ul class="timeline">
                        @foreach($integrations as $integration)
                            <li class="event" data-date="{{ Integration::formatDate($integration->update_date) }}">
                                <div class="d-flex justify-content-start align-items-start">
                                    <h3 class="mr-2 text-muted">ID{{ $integration->id }}:</h3>
                                    <h3 class="mr-2">{{ $integration->name }}</h3>
                                    <div class="d-flex">
                                        @if($integration->astate > 0 && $integration->update_date == $integration->create_date)
                                            <div class="badge badge-success text-uppercase">Yaratildi</div>
                                        @elseif($integration->astate == 0)
                                            <div class="badge badge-danger text-uppercase">O'chirildi</div>
                                        @else
                                            <div class="badge badge-warning text-uppercase">O'zgartirildi</div>
                                        @endif
                                        @if($integration->int01 == 1)
                                            <div class="badge badge-outlinesecondary ml-1 text-uppercase">GET</div>
                                        @else
                                            <div class="badge badge-outlinesecondary ml-1 text-uppercase">POST</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start align-items-start">
                                    <p class="mr-2 text-muted">Xodim:</p>
                                    <p class="mr-2">{{ $integration->val05 }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
