<?php

namespace Validator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Validator\ValidatorChain;
use Zend\Validator\StringLength;
use Zend\Validator\Regex;


class ValidatorChainController extends AbstractActionController
{
    public function indexAction()
    {
        $validatorChain = new ValidatorChain();
        $validatorChain->attach(new StringLength([
            'min' => 6,
            'max' => 20
        ]),true,1);
        
        //true break nếu gặp lỗi, 1;2;3 mức độ ưu tiên của validator

        $validatorChain->attach(new Regex('/[a-zA-Z0-9]/'),true,2);
        $validatorChain->attach(new Regex('/[!@#$%^&*.:;]/'),false,3);
        $var = "12345";
        if ($validatorChain->isValid($var)) {
            echo $var . " ok";
        } else {
            $message = $validatorChain->getMessages();
            foreach ($message as $error) {
                echo $error . '<br>';
            }
        }
    }
}
