<?php

namespace User;

use Config\Config;

class Amount
{
    public function amount_gen($amount)
    {
        $percent = 8.25;
        $str_t_main_a = $amount+($percent*$amount/100);
        $explode = explode(".",$str_t_main_a);
        $end_amnt = end($explode);
        $main_bala = $explode[0];
        $dot_amnt = substr($end_amnt,0,2);
        return  $main_bala.'.'.$dot_amnt;
    }

    public function amount_gen_a($aaa, $ccc)
    {
        $config = new Config();
        $selecta = $config->query("select * from products where id='$aaa'");
        $arraya = mysqli_fetch_array($selecta);
        return $arraya['amount']*$ccc;
    }
}
