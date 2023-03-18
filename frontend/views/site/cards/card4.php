<?php
/**
 * @var $card4 array
 */
?>
<div class="card mt-3 card-table card-4 visually-hidden">
    <div class="card-header bg-primary text-white">
        4. Аҳолининг бандлиги
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card4 as $title => $value): ?>
                <tr>
                    <td><?= $title ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
