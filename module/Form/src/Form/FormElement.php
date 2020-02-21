<?php

namespace Form\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class FormElement extends Form
{
    public function __construct()
    {
        parent::__construct();
        $fullname = new Element('fullname');
        $fullname->setLabel('Fullname: ');
        $fullname->getLabelAttributes([
            'id' => 'fullname',
            'class' => 'control-label'
        ]);
        $fullname->setAttributes([
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'fullname',
            'placeholder' => "Nhập họ tên: "
        ]);

        $this->add($fullname);

        //hidden
        $hidden = new Element('hidden');
        $hidden->setAttributes([
            'type' => 'hidden',
            'value' => 'Zend Framework'
        ]);
        $this->add($hidden);

        //number
        $age = new Element\Number('number');
        $age->setLabel('Chọn tuổi: ');
        $age->setLabelAttributes([
            'id' => 'age',
            'class' => 'control-label'
        ]);
        $age->setAttributes([
            'min' => 10,
            'max' => 50,
            'id' => 'age',
            'class' => 'form-control',
            'value' => 20
        ]);

        $this->add($age);

        //email
        $email = new Element\Email('email');
        $email->setLabel('Nhập email: ')
            ->setLabelAttributes([
                'id' => 'email',
                'class' => 'control-label'
            ]);
        $email->setAttribute('class', 'form-control');
        $email->setAttributes([
            'placeholder' => "Nhập email:",
            'id' => 'email',
            'requỉred' => true
        ]);

        $this->add($email);

        //password
        $password = new Element\Password('password');
        $password->setLabel('Nhập password')
            ->setLabelAttributes([
                'id' => 'password',
                'class' => 'control-label'
            ]);
        $password->setAttributes([
            'class' => 'form-control',
            'id' => 'password',
            'placeholder' => "Nhập password: ",
            'minlength' => 6,
            'maxlength' => 20,
            'required' => true
        ]);

        $this->add($password);

        //radio
        $gender = new Element\Radio('gender');
        $gender->setLabel('Giới tính: ')
            ->setLabelAttributes([
                'id' => 'gender',
                'class' => 'control-label'
            ]);
        $gender->setAttributes([
            'id' => 'gender',
            'required' => true,
            'value' => 'nam',
            'style' => 'margin-left: 20px'
        ]);
        $gender->setValueOptions([
            'nam' => ' Nam',
            'nữ' => ' Nữ',
            'other' => ' Other'
        ]);

        $this->add($gender);

        //select
        $select = new Element\Select('select');
        $select->setLabel('Chọn môn học: ')
            ->setLabelAttributes([
                'id' => 'select',
                'class' => 'control-label'
            ])
            ->setAttributes([
                'id' => 'select',
                'class' => 'form-control'
            ]);
        $select->setValueOptions([
            'php' => 'PHP',
            'java' => 'JAVA',
            'nodejs' => 'NODE JS'
        ]);

        $this->add($select);

        //textarea
        $textarea = new Element\Textarea('message');
        $textarea->setLabel('Nhập nội dung: ');
        $textarea->setLabelAttributes([
            'id' => 'message',
            'class' => 'control-label'
        ])
            ->setAttributes([
                'rows' => 8,
                'id' => 'message',
                'class' => 'form-control',
                'style' => 'resize:none'
            ]);
        $this->add($textarea);

        //file
        $file = new Element\File('file');
        $file->setLabel('Chọn file: ')
            ->setLabelAttributes([
                'id' => 'file',
                'class' => 'control-label'
            ])
            ->setAttributes([
                'multiple' => true,
                'id' => 'file'
            ]);
        $this->add($file);

        //checkbox

        $checkbox = new Element\Checkbox('checkbox');
        $checkbox->setLabel('Remember me: ');
        $checkbox->setLabelAttributes([
            'id' => 'checkbox',
            'class' => 'control-label'
        ]);
        $checkbox->setAttributes([
            'id' => 'checkbox',
            'checked' => true
        ]);

        $this->add($checkbox);

        $multiCheckbox = new Element\MultiCheckbox('multiCheckbox');
        $multiCheckbox->setLabel('Chọn sở thích: ');
        $checkbox->setLabelAttributes([
            'id' => 'multiCheckbox',
            'class' => 'control-label'
        ]);
        $multiCheckbox->setAttributes([
            'id' => 'multiCheckbox',
            'value' => ['bóng đá', 'bóng chuyền'],
            'style' => 'margin-left: 20px'
        ]);
        $multiCheckbox->setValueOptions([
            'bóng đá' => "Bóng đá",
            'bóng chuyền' => "Bóng chuyền",
            'bơi lội' => "Bơi lội",
            'bóng rổ' => "Bóng rổ"
        ]);

        $this->add($multiCheckbox);

        //color
        $this->add([
            'name' => 'color',
            'type' => Element\Color::class,
            'options' => [
                'label' => "Chọn màu: ",
                'label_attributes' => [
                    'id' => 'color',
                    'class' => 'control-label'
                ]
            ],
            'attributes' => [
                'value' => "#ABCEA3"
            ]
        ]);

        //date

        $this->add([
            'name' => 'date',
            'type' => 'Date',
            'attributes' => [
                'class' => 'form-control',
                'id' => 'birthdate'
            ],
            'options' => [
                'label' => "Chọn ngày sinh: ",
                'label_attributes' => [
                    'id' => 'birthdate',
                    'class' => 'control-label'
                ]
            ]
        ]);

        //range
        $this->add([
            'name' => 'range',
            'type' => 'range',
            'attributes' => [
                'min' => 5,
                'max' => 50,
                'value' => 25,
                'class' => 'form-control',
                'id' => 'range'
            ],
            'options' => [
                'label' => "Chọn giá trị: ",
                'label_attributes' => [
                    'id' => 'my_range',
                    'class' => 'control_label'
                ]
            ]
        ]);

        //button reset
        $this->add([
            'name' => 'btnReset',
            'type' => 'button',
            'attributes' => [
                'class' => 'btn btn-primary',
                'type' => 'reset'
            ],
            'options' => [
                'label' => "Reset"
            ]
        ]);

        //button submit
        $this->add([
            'name' => 'btnSubmit',
            'type' => 'submit',
            'attributes' => [
                'class' => 'btn btn-success',
                'value' => 'Send'
            ]
        ]);

        //captcha image
        $this->add([
            'type' => 'captcha',
            'name' => 'captcha_image',
            'options' => [
                'label' => 'Nhập chuỗi bên dưới: ',
                'captcha' => [
                    'class' => 'Image',
                    'imgDir' => 'public/img/captcha',
                    'imgUrl' => 'img/captcha',
                    'suffix' => '.png',
                    'font' => APPLICATION_PATH . "/data/font/Merriweather-Regular.ttf",
                    'fsize' => 50,
                    'width' => 400,
                    'height' => 150,
                    'dotNoiseLevel' => 200,
                    'lineNoiseLevel' => 5,
                    'expiration' => 120 //2 mins
                ]
            ]
        ]);
    }
}
