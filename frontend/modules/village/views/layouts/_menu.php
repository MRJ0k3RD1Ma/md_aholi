<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/village/'])?>" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Kodlar</li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/village/default/change'])?>" class="waves-effect">
                        <span>Ma`lumotlarni yangilash</span>
                    </a>
                </li>
                <?php if(false){ $code = \common\models\ViewCode1::find()->all();
                    foreach ($code as $item):
                ?>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/village/default/view','code'=>$item->code])?>" class="waves-effect">
                                <span><?= $item->name ?></span>
                            </a>
                        </li>
                <?php endforeach; }?>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
