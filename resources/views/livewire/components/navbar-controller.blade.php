<div>
    <nav class="nav nav-pills flex-column fixed-bottom bg-white shadow">
        <ul class="nav d-flex justify-content-between mx-3">
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
    </nav>

</div>
