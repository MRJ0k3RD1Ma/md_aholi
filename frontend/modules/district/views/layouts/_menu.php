<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/district/'])?>" class="waves-effect">
                        <span><?=   Yii::$app->user->identity->soato->name_cyr ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/district/default/slugg'])?>" class="waves-effect">
                        <span>Takliflarni ko`rish</span>
                    </a>
                </li>





            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
