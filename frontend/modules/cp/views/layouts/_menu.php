<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/'])?>" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Layouts</li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/codes'])?>" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Kodlar</span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/company'])?>" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Tashkilotlar</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/user'])?>" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Foydalanuvchilar</span>
                    </a>
                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
