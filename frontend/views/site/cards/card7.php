<?php
/**
 * @var $card5 array
 */
?>
<div class="card mt-3 card-table card-7 visually-hidden">
    <div class="card-header bg-primary text-white">
        7. Таълим муассасалари ва холати тўғрисида
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card7 as list($item1, $item2)): ?>
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