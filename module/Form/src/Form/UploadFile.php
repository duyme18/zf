<?php

namespace Form\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class UploadFile extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->add([
            'name' => 'file-upload',
            'attributes' => [
                'type' => 'file'
            ],
            'options' => [
                'label' => 'Chose File'
            ]
        ]);

        $this->add([
            'name' => 'btnSubmit',
            'type' => 'submit',
            'attributes' => [
                'class' => 'btn btn-primary',
                'value' => 'Upload'
            ]
        ]);
    }
}
