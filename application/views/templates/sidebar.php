<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-siujian sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-rocket"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Si-Ujian</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if ($title == "Dashboard") : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <?php $role_id = $this->session->userdata('user_profile_kode'); ?>
        <a class="nav-link mt-0 pt-0" href="<?= base_url(link_dashboard($role_id)); ?> ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('user_profile_kode');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`user_profil_kode` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading <?= $m['id'] ?>">
            <?php if (($role_id == 1 || $role_id == 4 || $role_id == 2) && ($m['id'] == 5)) : ?>
            <?php else : ?>
                <?= $m['menu']; ?>
            <?php endif; ?>
        </div>

        <!-- SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                            FROM `user_sub_menu` JOIN `user_menu` 
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id`= $menuId
                        AND `user_sub_menu`.`is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['judul']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                    <?php if (($role_id == 1 || $role_id == 4 || $role_id == 2) && ($sm['menu_id'] == 5)) : ?>
                    <?php else : ?>
                    <li class="nav-item <?= $sm['menu_id'] ?>">
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (($role_id == 1 || $role_id == 4 || $role_id == 2) && ($sm['menu_id'] == 5)) : ?>
                <?php else : ?>
                    <a class="nav-link pb-0" href="<?= base_url($sm['url'])  ?>">
                        <i class="<?= $sm['ikon']; ?>"></i>
                        <span><?= $sm['judul'];  ?></span></a>
                <?php endif; ?>
            </li>

        <?php endforeach; ?>

        <!-- Divider -->
        <?php if (($role_id == 1 || $role_id == 4 || $role_id == 2) && ($sm['menu_id'] == 5)) : ?>
        <?php else : ?>
            <hr class="sidebar-divider mt-3 <?= $m['id'] ?>">
        <?php endif; ?>
    <?php endforeach; ?>



    <li class="nav-item">
        <a class="nav-link logout" href="#">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->