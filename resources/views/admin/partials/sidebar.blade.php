<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('category.index') }}"
                    class="nav-link {{ request()->segment(1) == 'category' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.index') }}"
                    class="nav-link {{ request()->segment(1) == 'product' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Products
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('compare.index') }}"
                    class="nav-link {{ request()->segment(1) == 'compare' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>
                        Comparison
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('product') }}" class="nav-link">
                    <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Products (json)
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('api.users') }}" class="nav-link">
                    <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        API Users (json)
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('swapping') }}"
                    class="nav-link {{ request()->segment(1) == 'swapping' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>
                        Swapping Variable
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('numbered') }}"
                    class="nav-link {{ request()->segment(1) == 'number-to-word' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Numbered
                    </p>
                </a>
            </li> --}}
            <!-- Authentication -->
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="nav-link nav-item">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick=" event.preventDefault(); this.closest('form').submit();">
                        <i class="nav-icon fas fa-loging"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>