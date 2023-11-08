@extends('layouts.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-4">
            <li class="breadcrumb-item"><a href="#">Бош сахифа</a></li>
            <li class="breadcrumb-item active" aria-current="page">Интеграциялар жадвали</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pb-4 align-items-center justify-content-between">
                        <h6 class="card-title" style="margin-bottom: 0px;">Интеграция қўшиш</h6>
                        <a class="float-right" href="/integration/create">
                            <button type="button" class="btn btn-secondary">Қўшиш</button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ташкилот номи</th>
                                <th>Холати</th>
                                <th>Маълумот тури</th>
                                <th>Охирги янгиланиш санаси</th>
                                <th>Янгиланиш даври</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($integrations as $integration)
                                    <tr>
                                        <td>{{ $integration->ID }}</td>
                                        <td>
                                            <a href="#" class="nav-link" style="padding:0px;">
                                                {{ $integration->NAME_UZ }}
                                            </a>
                                        </td>
                                        <td><span class="badge badge-success">Янгиланган</span></td>
                                        <td>{{ $integration->VAL02 }}</td>
                                        <td>{{ $integration->CREATE_DATE }}</td>
                                        <td>{{ $integration->INT01 }}</td>
                                        <td>
                                            <div class="d-flex justify-content-md-around">
                                                <button type="button" class="btn btn-primary btn-icon">
                                                    <i data-feather="eye"></i>
                                                </button>
                                                <a href="{{'/integration/'.$integration->ID.'/edit'}}">
                                                    <button type="button" class="btn btn-facebook btn-icon">
                                                        <i data-feather="edit"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                        <td>Маълумот мавжуд эмас</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
