<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url('assets/') ?>images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['name']; ?></div>
                <div class="email"><?= $user['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>

                        <li><a href="<?= base_url('auth/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->

        <!-- Menu -->
        <li class="menu">
            <ul class="list">

                <?php if ($title == 'Dashboard') : ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif ?>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php
                $role_id = $this->session->userdata('role_id');

                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC ";

                $menu = $this->db->query($queryMenu)->result_array();

                ?>
                <?php foreach ($menu as $m) :  ?>
                    <!-- admin, asprak atau praktikan -->
                    <li class="header"><?= $m['menu']; ?></li>

                    <?php
                    $menuID = $m['id'];
                    $querySubMeu = "SELECT *
                          FROM `user_sub_menu` JOIN `user_menu`
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                         WHERE `user_sub_menu`.`menu_id` = $menuID
                           AND `user_sub_menu`.`is_active` = 1
                    ";
                    $subMenu = $this->db->query($querySubMeu)->result_array();
                    // menampilkan semua isi dari tabel submenu sesuai id tabel menu
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>

                        <?php if ($title == $sm['title']) : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif ?>

                            <?php if ($sm['title'] == "Input nilai") : ?>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">widgets</i>
                                    <span>Widgets</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Cards</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/widgets/cards/basic.html">Basic</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/cards/colored.html">Colored</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/cards/no-header.html">No Header</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Infobox</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                            </li>
                                            <li>
                                                <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                            </li>
                                        </ul>
                                    <?php else : ?>




                                        <a href="<?= base_url($sm['url']); ?>">
                                            <i class="material-icons"><?= $sm['icon']; ?></i>
                                            <span><?= $sm['title']; ?></span>
                                        </a>

                                    <?php endif; ?>

                                </li>

                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </ul>
                </li>
                <!-- #Menu -->


                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; <?= date('Y'); ?> Website
                    </div>
                    <div class="version">
                        <b>Version: </b> 0.1.0
                    </div>
                </div>
                <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>