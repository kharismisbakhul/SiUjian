<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Alerts -->
                <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2 || $this->session->userdata('user_profile_kode') == 5) : ?>
                <li class="nav-item dropdown no-arrow mx-1 icon-notif">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <?php if ($counter == 0) { ?>
                        <span class="badge badge-danger badge-counter counter"></span>
                        <?php } else { ?>
                        <span class="badge badge-danger badge-counter counter"><?= $counter; ?></span>
                        <?php } ?>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="notifications">
                        <h6 class="dropdown-header">
                            Pemberitahuan
                        </h6>
                        <div class="table-responsive notifications" style="max-height: 200px;">
                        </div>
                    </div>
                </li>
                <?php endif; ?>

                <div class="topbar-divider d-none d-sm-block mr-0 ml-0"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small username-topbar" id="username-topbar" value="<?= $user['user_profile_kode'] ?>"><?= $username; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <?php $role_id = $this->session->userdata('user_profile_kode'); ?>
                        <a class="dropdown-item" href="<?= base_url(link_profil($role_id)) ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="#">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->