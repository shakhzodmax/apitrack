@extends('layouts.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-4">
            <li class="breadcrumb-item"><a href="/integration">Интеграция</a></li>
            <li class="breadcrumb-item active" aria-current="page">Журнал</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="card-title" style="margin-bottom: 0px;">Интеграция журнал</h6>
                        <div class="d-flex">
                            <a class="float-right" href="#">
                                <button type="button" class="btn btn-behance">Кўчириб олиш</button>
                            </a>
                        </div>
                    </div>
                    <ul class="timeline">
                        @foreach($integrations as $integration)
                            <li class="event" data-date="{{ $integration->update_date }}">
                                <div class="d-flex justify-content-start align-items-start">
                                    <h3 class="mr-2 text-muted">ID{{ $integration->id }}:</h3>
                                    <h3 class="mr-2">{{ $integration->name }}</h3>
                                    <div class="d-flex">
                                        @if($integration->astate > 0 && $integration->update_date == $integration->create_date)
                                            <div class="badge badge-success ">Яратилди</div>
                                        @elseif($integration->astate == 0)
                                            <div class="badge badge-danger ">Ўчирилди</div>
                                        @else
                                            <div class="badge badge-warning ">Ўзгартирилди</div>
                                        @endif
                                        @if($integration->int01 == 1)
                                            <div class="badge badge-outlinesecondary ml-1">GET</div>
                                        @else
                                            <div class="badge badge-outlinesecondary ml-1">POST</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start align-items-start">
                                    <p class="mr-2 text-muted">Ходим:</p>
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
