<?php
/**
 * @var $card array
 * @var $mahalla \common\models\Soato
 */
?>
<div class="card mt-3 card-table card-mahalla">
    <div class="card-header bg-primary text-white">
        <?=$mahalla->name_cyr?> - Маҳалла фуқаролар йиғини ходимлари тўғрисида маълумот
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card as $title => $value): ?>
                <tr>
                    <td><?= $title ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
