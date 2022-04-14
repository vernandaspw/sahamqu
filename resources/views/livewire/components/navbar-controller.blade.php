<div>

    <ul class="nav d-flex justify-content-around mx-1 fixed-bottom bg-white shadow-lg">
        <li class="nav-item">
            <a class="nav-link @if (request()->is('beranda'))
                    text-primary
                    @else
                    text-dark
                @endif" aria-current="page" href="{{ url('beranda') }}">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  @if (request()->is('broker'))
                    text-primary
                    @else
                    text-dark
                @endif" href="{{ url('broker') }}">Broker</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  @if (request()->is('perusahaan'))
                    text-primary
                    @else
                    text-dark
                @endif" href="{{ url('perusahaan') }}">Perusahaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  @if (request()->is('akun'))
                    text-primary
                    @else
                    text-dark
                @endif" href="{{ url('akun') }}">Akun</a>
        </li>
    </ul>


</div>
