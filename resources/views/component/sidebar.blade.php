<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ url('/') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item @if(Request::segment(1) == 'keranjang') active @endif">
                    <a href="{{ url('/keranjang') }}" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Keranjang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-title">Master Data</li>
                <li class="sidebar-item @if(Request::segment(1) == 'merek') active @endif ">
                    <a href="{{ url('/merek') }}" class='sidebar-link'>
                        <i class="bi bi-upc-scan"></i>
                        <span>Merek</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(1) == 'produk') active @endif">
                    <a href="{{url('/produk')}}" class='sidebar-link'>
                        <i class="bi bi-laptop-fill"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{url('/bank')}}" class='sidebar-link'>
                        <i class="bi bi-cash-stack"></i>
                        <span>Bank</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/pengiriman')}}" class='sidebar-link'>
                        <i class="bi bi-truck"></i>
                        <span>Pengiriman</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/banner/satu')}}" class='sidebar-link'>
                        <i class="bi bi-image-fill"></i>
                        <span>Banner</span>
                    </a>
                </li>
                <li class="sidebar-title">Account</li>
                <li class="sidebar-item">
                    <a href="{{url('/logout')}}" class='sidebar-link'>
                        <i class="fas fa-sign-out"></i>
                        <span>logout</span>
                    </a>
                </li>
                {{-- <li class="sidebar-title">Account</li>
                @if(Auth::user())
                <li class="sidebar-item">
                    <a href="{{url('/logout')}}" class='sidebar-link'>
                        <i class="fas fa-sign-out"></i>
                        <span>logout</span>
                    </a>
                </li>
                @endif dokumentasi untuk user --}}
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
