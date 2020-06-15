<?php
?>

<div class="panel panel-default">
    <div class="panel-heading">График гашения</div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <td>
                    Сумма кредита:
                </td>
                <td>
                    <?=$credit->amount?>
                </td>
            </tr>
            <tr>
                <td>
                    Срок кредита:
                </td>
                <td>
                    <?=$credit->months_count?> мес.
                </td>
            </tr>
            <tr>
                <td>
                    Годовая процентная ставка:
                </td>
                <td>
                    <?=$credit->percent?> %
                </td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>№ платежа</th>
                    <th>Дата платежа</th>
                    <th>Сумма платежа</th>
                    <th>Оплата процента</th>
                    <th>Основной долг</th>
                    <th>Кредитный остаток</th>
                </tr>
            </thead>
            <?php use yii\helpers\Url;

            foreach ($plan as $row):?>
                <tr>
                    <td><?=$row['pay_num']?></td>
                    <td><?=$row->getFormattedDate()?></td>
                    <td><?=$row['pay_sum']?></td>
                    <td><?=$row['perc_sum']?></td>
                    <td><?=$row['body_sum']?></td>
                    <td><?=$row['credit_balance']?></td>
                </tr>
            <?php endforeach;?>
        </table>

        <a class="btn btn-success" href="<?=Url::to(['calc/index'])?>">
            Назад
        </a>
    </div>
</div>
