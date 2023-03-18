<?php
/**
 * @var $card3 array
 */
?>
<div class="card mt-3 card-table card-3 visually-hidden">
    <div class="card-header bg-primary text-white">
        3. Аҳолининг ижтимоий ҳолати
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card3 as $title => $value): ?>
                <tr>
                    <td><?= $title ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
