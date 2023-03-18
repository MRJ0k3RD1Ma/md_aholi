<?php
/**
 * @var $card5 array
 */
?>
<div class="card mt-3 card-table card-6 visually-hidden">
    <div class="card-header bg-primary text-white">
        6. Ҳудуддаги ташкилот ва объектлар сони тўғрисида маълумот
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card6 as list($item1, $item2)): ?>
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