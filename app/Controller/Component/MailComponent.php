<?php

App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class MailComponent extends Component {

    public function rentConfirmation($data)
    {
        var_dump($data);

         $fixDate0 = new DateTime($data['next_date']['year'].$data['next_date']['month'].$data['next_date']['day']);

         $fixDate1 = new DateTime($data['date_of_payment']['year'].$data['next_date']['month'].$data['next_date']['day']);

         $nextDate = $fixDate0->format("d-m-Y");

         $dateOfPayment = $fixDate1->format("d-m-Y");

         $to = $data['email'];

         $tenantName = $data['tenant_name'];

         $amount = $data['amount'];

         $code = $data['code'];

         $subject = $tenantName. " Rent Payment Confirmed";

         $body = "Hello, On ".$dateOfPayment. " you paid <b>$amount Pounds </b> for your rent.<br/>
         Your next date of payment is <b>$nextDate.</b> Your confirmation code is: <b>$code</b> .<br>";

         $Email = new CakeEmail();

         $Email->from(array('me@example.com' => 'My Site'))
        ->to($to)
        ->emailFormat('html')
        ->subject($subject)
        ->send($body);

    }

}

?>