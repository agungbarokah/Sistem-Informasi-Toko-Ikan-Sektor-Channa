<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?php echo base_url().'admin'; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="<?php echo base_url().'admin/pembeli'; ?>">
                        <div class="sb-nav-link-icon"><i class="bi bi-person"></i></div>
                        Data Pembeli
                    </a>
                    <a class="nav-link" href="<?php echo base_url().'admin/ikan'; ?>">
                        <div class="sb-nav-link-icon"><i class="bi bi-folder2"></i></div>
                        Data Ikan
                    </a>
                    <a class="nav-link" href="<?php echo base_url().'admin/barang'; ?>">
                        <div class="sb-nav-link-icon"><i class="bi bi-folder2"></i></div>
                        Data Barang
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="bi bi-currency-dollar"></i></div>
                        Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url().'admin/transaksi'; ?>"><i class="bi bi-currency-dollar"> Data Transaksi</i></a>
                            <a class="nav-link" href="<?php echo base_url().'admin/laporan'; ?>"><i class="bi bi-file-earmark">  Laporan Transaksi </i></a>
                        </nav>
                    </div>
                  
                </div>
            </nav>
        </div>