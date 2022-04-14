<div>
    {{-- <nav class="navbar navbar-expand fixed-bottom navbar-dark bg-primary shadow-lg">
        <div class="container-fluid d-flex justify-content-evenly">
            <ul class="navbar-nav m-auto d-flex justify-content-evenly flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('beranda'))
                        active
                    @endif" href="{{ url('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('broker'))
                        active
                    @endif" href="{{ url('broker') }}">Broker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('perusahaan'))
                        active
                    @endif" href="{{ url('perusahaan') }}">Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('akun'))
                        active
                    @endif" href="{{ url('akun') }}">Akun</a>
                </li>

            </ul>
        </div>
    </nav> --}}

    <ul class="nav  py-1 justify-content-evenly fixed-bottom bg-primary flex-nowrap">
        <li class="nav-item">
            <a class="nav-link  fw-light text-white  @if (request()->is('beranda'))
                fw-bolder
            @endif" href="#" style="font-size: 15px">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-light text-white @if (request()->is('broker'))
                fw-bolder
            @endif" href="#" style="font-size: 15px">Broker</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-light text-white @if (request()->is('perusahaan'))
                    fw-bolder
            @endif" href="#" style="font-size: 15px">Perusahaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-light text-white @if (request()->is('akun'))
                    fw-bolder
            @endif" href="#" style="font-size: 15px">Akun</a>
        </li>

    </ul>


</div>
