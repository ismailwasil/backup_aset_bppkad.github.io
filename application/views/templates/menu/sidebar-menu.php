<!-- Slide Bar -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="<?= base_url(); ?>" class="animate-charcter"><img src="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" alt="Logo" height="200">aset</a>
                    </div>
                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUERY MENU DARI DATABASE -->
        <?php
        $id_role = $this->session->userdata('id_role');
        $queryMenu = "SELECT menu.id, menu.menu 
                        FROM menu JOIN access_menu 
                        ON menu.id = access_menu.id_menu 
                        WHERE access_menu.id_role=$id_role
                        ORDER BY access_menu.id_menu ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();
        // var_dump($menu);
        // die;
        ?>
        <!-- /QUERY MENU DARI DATABASE -->

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title text-muted">
                        <?= $m['menu'] ?>
                    </li>


                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT * ,sub_menu.id AS id_sub_menu
                            FROM sub_menu JOIN menu 
                            ON sub_menu.id_menu = menu.id
                            WHERE sub_menu.id_menu=$menuId
                            AND sub_menu.is_active=1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($sm['has_sub'] == 0) : ?>
                            <?php if ($title == $sm['title']) : ?>
                                <li class="sidebar-item active">
                                <?php else : ?>
                                <li class="sidebar-item">
                                <?php endif; ?>
                                <?php if ($id_role == 1) : ?>
                                    <a href="<?= base_url() ?>admin/<?= $sm['url']; ?>" class='sidebar-link'>
                                    <?php elseif ($id_role == 2) : ?>
                                        <a href="<?= base_url() ?>user/<?= $sm['url']; ?>" class='sidebar-link'>
                                        <?php elseif ($id_role == 3) : ?>
                                            <a href="<?= base_url() ?>umum/<?= $sm['url']; ?>" class='sidebar-link'>
                                            <?php elseif ($id_role == 4) : ?>
                                                <a href="<?= base_url() ?>developer/<?= $sm['url']; ?>" class='sidebar-link'>
                                                <?php endif; ?>
                                                <i class="<?= $sm['icon']; ?>"></i>
                                                <span><?= $sm['title']; ?></span>
                                                </a>
                                </li>
                            <?php elseif ($sm['has_sub'] == 1) : ?>
                                <?php if ($title == $sm['title']) : ?>
                                    <li class="sidebar-item active has-sub">
                                    <?php else : ?>
                                    <li class="sidebar-item has-sub">
                                    <?php endif; ?>
                                    <a href="#" class='sidebar-link'>
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span><?= $sm['title']; ?></span>
                                    </a>
                                    <?php
                                    $id_sub_menu = $sm['id_sub_menu'];
                                    $queryHasSub = "SELECT * FROM has_sub_menu
                                                    WHERE id_sub_menu=$id_sub_menu
                                                ";
                                    $HasSub = $this->db->query($queryHasSub)->result_array();
                                    ?>
                                    <?php if ($title == $sm['title']) : ?>
                                        <ul class="submenu active">
                                        <?php else : ?>
                                            <ul class="submenu">
                                            <?php endif; ?>
                                            <?php foreach ($HasSub as $hs) : ?>
                                                <li class="submenu-item">
                                                    <?php if ($id_role == 1) : ?>
                                                        <a href="<?= base_url() ?>admin/<?= $hs['url_has_sub']; ?>">
                                                        <?php elseif ($id_role == 2) : ?>
                                                            <a href="<?= base_url() ?>user/<?= $hs['url_has_sub']; ?>">
                                                            <?php elseif ($id_role == 3) : ?>
                                                                <a href="<?= base_url() ?>umum/<?= $hs['url_has_sub']; ?>">
                                                                <?php elseif ($id_role == 4) : ?>
                                                                    <a href="<?= base_url() ?>developer/<?= $hs['url_has_sub']; ?>">
                                                                    <?php endif; ?>
                                                                    <i class="<?= $hs['icon_has_sub']; ?>"></i>
                                                                    <span><?= $hs['title_has_sub']; ?></span>
                                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach ?>
                </ul>
            </div>
        <?php endforeach; ?>
        <!-- /LOOPING MENU -->
        <br>
        <div style="display: flex;justify-content: center;">
            <a href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset&type=phone_number&app_absent=0" class="btn btn-edit-ismail btn-sm shadow-lg mt-5" target="_blank">
                <i class="fa fa-fw fa-code"></i> Hubungi Developer
            </a>
        </div>
        <br>
    </div>
</div>
<!-- /Slide Bar -->