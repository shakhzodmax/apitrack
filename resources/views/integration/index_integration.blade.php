@extends('layouts.app')
@section('content')
{{--@forelse ($users as $user)--}}
{{--    <li>{{ $user->name }}</li>--}}
{{--@empty--}}
{{--    <p>No users</p>--}}
{{--@endforelse--}}

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Бош сахифа</a></li>
            <li class="breadcrumb-item active" aria-current="page">Интеграциялар жадвали</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Интеграциялар</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ташкилот номи</th>
                                <th>Холати</th>
                                <th>Маълумот тури</th>
                                <th>Охирги янгиланиш санаси</th>
                                <th>Кейинги янгиланиш санаси</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse ($integrations as $integration)
                                    <tr>
                                        <td>{{ $integration->Id }}</td>
                                        <td>
                                            <a href="#" class="nav-link" style="padding:0px;">
                                                {{ $integration->NAME }}
                                            </a>
                                        </td>
                                        <td><span class="badge badge-success">Янгиланган</span></td>
                                        <td>{{ $integration->TITLE }}</td>
                                        <td>{{ $integration->DATE01 }}</td>
                                        <td>{{ $integration->DATE02 }}</td>
                                        <td>
                                            <div class="d-flex justify-content-md-around">
                                                <button type="button" class="btn btn-primary btn-icon">
                                                    <i data-feather="eye"></i>
                                                </button>
                                                <a href="{{'/integration/'.$integration->Id.'/edit'}}">
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
                                    <p>No users</p>
                                @endforelse
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
