<?php

namespace Form\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->loginForm(); // định nghĩa form login
        $this->loginInputFilter(); // định nghĩa cho filter + validate
    }

    // create textfield
    private function loginForm()
    {
        //email
        $email = new Element\Email('email');
        $email->setLabel('Email: ')
            ->setLabelAttributes([
                'for' => 'email',
                'class' => 'col-sm-3 control-label'
            ]);
        $email->setAttributes([
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'example@domain.com'
        ]);

        $this->add($email);

        $password = new Element\Password('password');
        $password->setLabel('Password: ')
            ->setLabelAttributes([
                'for' => 'password',
                'class' => 'col-sm-3 control-label'
            ]);
        $password->setAttributes([
            'id' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Enter your password'
        ]);

        $this->add($password);

        //remember
        $remember_me = new Element\Checkbox('remember');
        $remember_me->setLabel('Remember me: ')
            ->setLabelAttributes([
                'for' => 'remember'
            ]);
        $remember_me->setAttributes([
            'id' => 'remember',
            'value' => 1,
            'required' => false
        ]);

        $this->add($remember_me);

        //btn submit
        $submit = new Element\Submit('btnSubmit');
        $submit->setAttributes([
            'value' => 'Login',
            'class' => 'btn btn-success',
        ]);
        $this->add($submit);
    }


    // create inputFilter

    private function loginInputFilter()
    {
        $intputFilter = new InputFilter\InputFilter();
        $this->setInputFilter($intputFilter);
        $intputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                //trim/newline/tolower/toupper
                ['name' => 'StringToLower'],
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'messages' => [
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email không đúng định dạng',
                            \Zend\Validator\EmailAddress::INVALID_HOSTNAME => 'Hostname không đúng',
                        ]
                    ]
                ]
            ]
        ]);
        $intputFilter->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                //trim/newline/tolower/toupper
                ['name' => 'StringToLower'],
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 6,
                        'max' => 20,
                        'messages' => [
                            \Zend\Validator\StringLength::TOO_SHORT => 'Mật khẩu ít nhất %min% ký tự',
                            \Zend\Validator\StringLength::TOO_LONG => 'Mật khẩu không quá %max% ký tự',
                        ]
                    ]
                ],
                [
                    'name' => 'Regex',
                    'options' => [
                        'pattern' => '/[a-zA-Z0-9_-]/',
                        'messages' => [
                            \Zend\Validator\Regex::INVALID => "Pattern %pattern% không chính xác",
                            \Zend\Validator\Regex::NOT_MATCH => "Mật khẩu phải chứa các tý sau %pattern%",
                            \Zend\Validator\Regex::ERROROUS => "Có lỗi nội bộ đối với pattern %pattern%",
                        ]
                    ]
                ],
                [
                    'name' => 'Regex',
                    'options' => [
                        'pattern' => '/[!@#$%%^&*()]/',
                        'messages' => [
                            \Zend\Validator\Regex::INVALID => "Pattern %pattern% không chính xác",
                            \Zend\Validator\Regex::NOT_MATCH => "Mật khẩu phải chứa các tý sau %pattern%", 
                            \Zend\Validator\Regex::ERROROUS => "Có lỗi nội bộ đối với pattern %pattern%",
                        ]
                    ]
                ]
            ]
        ]);
    }
}
