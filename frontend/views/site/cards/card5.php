<?php
/**
 * @var $card5 array
 */
?>
<div class="card mt-3 card-table card-5 visually-hidden">
    <div class="card-header bg-primary text-white">
        5. Ижтимоий-маънавий муҳит, жиноятчилик билан боғлиқ кўрсаткичлар
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card5 as list($item1, $item2)): ?>
                <tr>
                    <td><?= $item1[0] ?></td>
                    <td><?= $item1[1] ?></td>
                    <td><?= $item2[0] ?></td>
                    <td><?= $item2[1] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>