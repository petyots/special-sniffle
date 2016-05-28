<?php

App::uses('AppController','Controller');
App::uses('Security', 'Utility');

Class OperatorController extends AppController
{



 public function login()
 {

        if($this->_isLoggedIn() === true){

        $this->_flasher('You are already logged in !');
        $this->redirect(array('controller' => 'Dashboard','action' => 'index'));

        }

      if($this->request->is('post')){

        $data['username'] = $this->request->data['username'];

        $data['password'] = $this->request->data['password'];

        $data['pincode'] = $this->request->data['pincode'] ;

        $hashed =  $this->_hasher($data);

        $user = $this->Operator->findByUsername($data['username']);

        if(!$user){

            $this->_flasher('Wrong Credentials !','error');
            $this->redirect(array('action' => 'login'));

        }

        if($hashed['password'] !== $user['Operator']['password'] || $hashed['pincode'] !== $user['Operator']['pincode'] ){

            $this->_flasher('Wrong Credentials !','error');
            $this->redirect(array('action' => 'login'));

        }else{

        $this->Session->write('Operator.loggedIn',true);

        $this->Session->write('Operator.username',$data['username']);

        $this->_flasher('Hello, '.h($data['username']),'success');

        $this->redirect(array('controller' => 'Dashboard','action' => 'index'));


        }








      }
 }

 public function logout()
 {
            if($this->_isLoggedIn() === true){

            $this->Session->destroy('Operator');
            $this->_flasher('You closed your session.','success');
            $this->redirect(array('action' => 'login'));

            }else{

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('action' => 'login'));

            }
 }

 public function _isLoggedIn()
 {
    if($this->Session->read('Operator.loggedIn') === true){
        return true;
    }else{
        return false;
    }

    return false;
 }

 public function gendata()
 {                ;
    $data['pass'] = Security::hash('11223344aA','sha256',true);
    $data['pincode'] = Security::hash('1111','sha256',true);

    return var_dump($data);
 }

 public function _hasher($data)
 {
                  ;
    $data['password'] = Security::hash('11223344aA','sha256',true);
    $data['pincode'] = Security::hash('1111','sha256',true);

   return $data;


 }

}