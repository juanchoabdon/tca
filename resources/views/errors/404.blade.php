@extends("app")

@section('head_title', 'Page not found! | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero bg-white">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="py-30 text-center">
                        <div class="display-3 text-danger">
                            <i class="fa fa-warning"></i> 404
                        </div>
                        <h1 class="h2 font-w700 mt-30 mb-10">Oops...</h1>
                        <h2 class="h3 font-w400 text-muted mb-50">No encontramos lo que estabas buscando...</h2>
                        <a class="btn btn-hero btn-rounded btn-alt-secondary" href="/">
                            <i class="fa fa-arrow-left mr-10"></i> Volver al incio
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>

@endsection
