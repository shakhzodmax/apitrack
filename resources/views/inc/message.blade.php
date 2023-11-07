{{--@if($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

@if(session('success'))
    <div class="alert alert-icon-success" role="alert">
        <i class="link-icon" data-feather="check-circle"></i>
        {{ session('success') }}
    </div>
@endif


