@include('inc.styles')
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                    <img src="../../../assets/images/404.svg" class="img-fluid mb-2" alt="404">
                    <h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">500</h1>
                    <h4 class="mb-2">Serverda xatolik</h4>
                    <h6 class="text-muted mb-3 text-center">Nomalum xatolik yuz berdi</h6>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Orqaga qaytish</a>
                </div>
            </div>

        </div>
    </div>
</div>
@include('inc.scripts')
