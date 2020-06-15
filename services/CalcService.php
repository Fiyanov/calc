<?php

namespace app\services;

use app\models\Credits;
use app\models\Plans;

class CalcService
{
    public function calc(array $data)
    {
        $credit = new Credits();

        $credit->load($data);

        $credit = $this->setEndDate($credit);

        $credit->save();

        $payment_sum = $this->getMonthPayment($credit);
        $all_payments_sum = 0;

        for ($i = 1; $i <= $credit->months_count; $i++) {
            $payment = new Plans();

            $all_payments_sum += $payment_sum;

            $payment->credit_id = $credit->id;
            $payment->pay_date =  $this->getPayDate($credit->date_start, $i);
            $payment->pay_num = $i;
            $payment->pay_sum = ceil($payment_sum);
            $payment->credit_balance = ceil($credit->amount - $all_payments_sum);
            $payment->perc_sum = ceil($this->getPercentSum($payment->credit_balance, $this->getMonthPercent($credit->percent)));
            $payment->body_sum = ceil($this->getBodySum(ceil($payment_sum), $payment->perc_sum));
            $payment->save();
        }

        return $credit->id;
    }

    private function setEndDate(Credits $credit)
    {
        $credit->date_end = (new \DateTime($credit->date_start))
            ->modify('+' . ($credit->months_count + 1) . ' month')
            ->format('Y-m-d');

        return $credit;
    }

    private function getPayDate($start, $month)
    {
        return (new \DateTime($start))
            ->modify('+' . ($month) . ' month')
            ->format('Y-m-d');
    }

    private function getMonthPayment(Credits $credit)
    {
        $S = $credit->amount;
        $P = $credit->percent;
        $T = $credit->months_count;

        $month = $this->getMonthPercent($P); //round($P / 12 / 100 , 3);
        $k = ($month * pow((1+$month), $T))/(pow((1+$month), $T) - 1);
        return $k * $S;
    }

    private function getMonthPercent($percent)
    {
        return round($percent / 12 / 100 , 3);
    }


    private function getBodySum($payment_sum, $percent_sum)
    {
        return $payment_sum - $percent_sum;
    }

    private function getPercentSum($credit_balance, $month)
    {
        $percent = $credit_balance * $month;
        return $percent > 0 ? $percent : 0;
    }
}
