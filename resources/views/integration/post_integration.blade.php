@extends('layouts.app')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-4">
            <li class="breadcrumb-item"><a href="/dashboard">Бош сахифа</a></li>
            <li class="breadcrumb-item active" aria-current="page">Юкловчи қилувчи интеграциялар жадвали</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="margin-bottom: 0px !important;">
                    <h6 class="card-title text-muted" style="margin-bottom: 0px;">Юкловчи интеграциялар жадвали</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover border rounded">
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
                                    <td class="border-right">{{ $integration->id }}</td>
                                    <td>
                                        <a href="#" class="nav-link" style="padding:0px;">
                                            {{ $integration->name }}
                                        </a>
                                    </td>
                                    <td><span class="badge badge-success">Янгиланган</span></td>
                                    <td>{{ $integration->val01 }}</td>
                                    <td>{{ $integration->update_date }}</td>
                                    <td>{{ $integration->name_uz }}</td>
                                    <td class="border-left">
                                        <div class="d-flex justify-content-md-around">
                                            <button type="button" class="btn btn-primary btn-icon">
                                                <i data-feather="eye"></i>
                                            </button>
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
