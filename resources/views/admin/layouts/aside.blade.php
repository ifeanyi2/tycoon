   <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a  class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{ route('all.category') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Categories
                            </a>
                            <a class="nav-link" href="{{ route('add.brand') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Brands
                            </a>
                            <a class="nav-link" href="{{ route('multi.image') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Brand Images
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>