<?php
/**
 * @var $card1 array
 */
?>
<div class="card mt-3 card-table card-1">
    <div class="card-header bg-primary text-white">
        1. Маҳалла фуқаролар йиғинлари ҳақида умумий маълумотлар
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <?php foreach ($card1 as $title => $value): ?>
                <tr>
                    <td><?= $title ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
