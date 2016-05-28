<?php

App::uses('AppHelper', 'View/Helper');

class CodeHelper extends AppHelper {

     public function confirmationCode($length=8)
    {
    $final_rand='';

    for($i=0;$i< $length;$i++)
    {
        $final_rand .= rand(0,9);

    }

    return $final_rand;
    }

}

?>