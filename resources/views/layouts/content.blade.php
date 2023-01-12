<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('page-header', 'Página inicial')</h1>
                </div>

                <div class="col-sm-6">
                    @yield('page-header-right')
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            @yield('page-content')
        </div>
    </div>

</div>
