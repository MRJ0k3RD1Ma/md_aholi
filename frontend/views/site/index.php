<?php

/** @var yii\web\View $this */
/**
 * @var $card1 array
 * @var $card2 array
 * @var $card3 array
 * @var $card4 array
 * @var $card5 array
 * @var $card6 array
 * @var $card7 array
 * @var $regions array
 */

$this->title = 'Маҳалла бошқарувига кўмаклашувчи тизим';
?>
    <div class="site-index">
    <div class="p-5 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Маҳалла бошқарувига
                кўмаклашувчи тизим</h1>
        </div>
    </div>

    <div class="body-content">
        <div class="card-group">
            <div class="card m-lg-2 bg-primary" data-card="card-1">
                <a href="#card1" class="stretched-link">
                    <img src="/images/mahalla-logo2.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-white">1. Маҳалла фуқаролар йиғинлари ҳақида умумий маълумотлар</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-2">
                <a href="#card2" class="stretched-link">
                    <img src="/images/demografiya.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">2. Демографик кўрсаткичлар</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-3">
                <a href="#card3" class="stretched-link">
                    <img src="/images/ijtimoiy_holat.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">3. Аҳолининг ижтимоий ҳолати</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-4">
                <a href="#card4" class="stretched-link">
                    <img src="/images/bandlik.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">4. Аҳолининг бандлиги</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-5">
                <a href="#card5" class="stretched-link">
                    <img src="/images/ijtimoiy_muhit.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">5. Ижтимоий-маънавий муҳит, жиноятчилик билан боғлиқ кўрсаткичлар</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-6">
                <a href="#card6" class="stretched-link">
                    <img src="/images/obyektlar.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">6. Ҳудуддаги ташкилот ва объектлар тўғрисида маълумот</h5>
                </div>
            </div>
            <div class="card m-lg-2" data-card="card-7">
                <a href="#card7" class="stretched-link">
                    <img src="/images/talim.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">7. Таълим муассасалари ва холати тўғрисида маълумотлар</h5>
                </div>
            </div>
        </div>

        <?= $this->render('cards/card1', ['card1' => $card1]) ?>
        <?= $this->render('cards/card2', ['card2' => $card2]) ?>
        <?= $this->render('cards/card3', ['card3' => $card3]) ?>
        <?= $this->render('cards/card4', ['card4' => $card4]) ?>
        <?= $this->render('cards/card5', ['card5' => $card5]) ?>
        <?= $this->render('cards/card6', ['card6' => $card6]) ?>
        <?= $this->render('cards/card7', ['card7' => $card7]) ?>

        <form class="row g-3 mb-5" id="form">
            <div class="col-4">
                <select class="form-select" aria-label="Default select example" id="region">
                    <option selected>Viloyatni tanlang</option>
                    <?php foreach ($regions as $region):?>
                        <option value="<?=$region->region_id?>"><?=$region->name_lot?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-4">
                <select class="form-select" aria-label="Disabled select example" disabled id="district">
                    <option selected>Tumanni tanlang</option>
                </select>
            </div>
            <div class="col-4">

                <select class="form-select" aria-label="Disabled select example" disabled id="mahalla">
                    <option selected>Mahallani tanlang</option>
                </select>
            </div>
        </form>

        <div class="visually-hidden" id="card-mahalla">
        </div>

    </div>


<?php
$js = <<<JS
$('.card-group .card').click(function (){
    $('.card').removeClass('bg-primary')
    $('.card h5.text-white').removeClass('text-white')
    $(this).addClass('bg-primary')
    $(this).find('h5').addClass('text-white')
    $('.card.card-table').addClass('visually-hidden')
    const card = $(this).data('card')
    $("." + card).removeClass('visually-hidden')
})

$('#region').on('change', function (){
    $('#card-mahalla').addClass('visually-hidden')
    $('#form').addClass('mb-5')
    $('#mahalla').attr('disabled', true);
    $('#mahalla')
            .empty()
            .append($("<option>Mahallani tanlang</option>"));
    $.ajax('/site/districts?region_id=' + $(this).val(), {
    }).done(function (districts){
        $('#district')
            .empty()
            .append($("<option>Tumanni tanlang</option>")); 
        $.each(districts, function(index, district) {   
            $('#district')
            .append($("<option></option>")
                    .attr("value", district.district_id)
                    .text(district.name_lot)); 
        });
        $('#district').removeAttr('disabled');
    })
})

$('#district').on('change', function (){
    $('#card-mahalla').addClass('visually-hidden')
    $('#form').addClass('mb-5')
    $.ajax('/site/mahallas?region_id=' + $('#region').val() + '&district_id=' + $(this).val(), {
    }).done(function (mahallas){
        $('#mahalla')
            .empty()
            .append($("<option>Mahallani tanlang</option>"));
        $.each(mahallas, function(index, mahalla) {   
            $('#mahalla')
            .append($("<option></option>")
                    .attr("value", mahalla.id)
                    .text(mahalla.name_lot)); 
        });
        $('#mahalla').removeAttr('disabled');
    })
})
$('#mahalla').on('change', function (){
    $.ajax('/site/mahalla?soato_id=' + $('#mahalla').val(), {
    }).done(function (mahalla){
        $('#card-mahalla').html(mahalla)
        $('#card-mahalla').removeClass('visually-hidden')
        $('#form').removeClass('mb-5')
        window.scrollTo(0, $('#form').offset().top)
        new Zooming().listen('img');
    })
})
JS;
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/zooming/2.1.1/zooming.min.js');
$this->registerJs($js);
$this->registerCss('tr:last-child td {border: 1;}');
?>