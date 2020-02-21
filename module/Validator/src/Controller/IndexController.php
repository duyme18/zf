<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Validator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Validator\StringLength;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $validator = new StringLength([
            'min' => 6,
            'max' => 10
        ]);
        // $validator->setMessages([
        //     StringLength::INVALID=>"Kieu du lieu khong duoc phep",
        //     StringLength::TOO_SHORT=>"Qua ngan",
        //     StringLength::TOO_LONG=>"Qua Dai"
        // ]);
        $var = "Hoàng Đức Duy 12121212";
        if ($validator->isValid($var)) {
            echo $var;
        } else {
            $massages = $validator->getMessages();
            foreach ($massages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // number
    public function numberAction()
    {
        $validator = new \Zend\Validator\Between([
            'min' => 5,
            'max' => 10,
            'inclusive' => true
        ]);
        $var = 10;
        if ($validator->isValid($var)) {
            echo $var;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // date
    public function dateAction()
    {
        $validator = new \Zend\Validator\Date([
            'format' => 'd-m-Y'
        ]);

        $var = "30-04-1996";
        if ($validator->isValid($var)) {
            echo $var;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // email
    public function emailAction()
    {
        $validator = new \Zend\Validator\EmailAddress();
        $email = "duyme18@gmail.com";
        if ($validator->isValid($email)) {
            echo "Email hop le " . $email;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // digits
    public function digitsAction()
    {
        $validator = new \Zend\Validator\Digits();
        $num = "a";
        if ($validator->isValid($num)) {
            echo $num;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // greaterThan
    public function greaterThanAction()
    {
        $validator = new \Zend\Validator\GreaterThan([
            'min' => 10,
            'inclusive' => true
        ]);
        $num = 11;
        if ($validator->isValid($num)) {
            echo $num;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // lessThan
    public function lessThanAction()
    {
        $validator = new \Zend\Validator\LessThan([
            'max' => 10,
            'inclusive' => true
        ]);
        $num = 11;
        if ($validator->isValid($num)) {
            echo $num;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // inArray
    public function inArrayAction()
    {
        $validator = new \Zend\Validator\InArray([
            'haystack' => [
                'value1',
                'value2',
                100
            ],
            'strict' => InArray::COMPARE_NOT_STRICT_AND_PREVENT_STR_TO_INT_VULNERABILITY

        ]);
        $value = "100";
        if ($validator->isValid($value)) {
            echo $value;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // notEmpty
    public function notEmptyAction()
    {
        $validator = new \Zend\Validator\NotEmpty(NotEmpty::INTEGER);
        $value = 0;
        if ($validator->isValid($value)) {
            echo $value;
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    // regex
    public function regexAction()
    {
        $validator = new \Zend\Validator\Regex([
            'pattern' => '/^Zend/'
        ]);
        // $pattern ="/^[\d]{5}$/";
        // $validator->setPattern($pattern);
        // $value =12345;

        $pattern = "/^[a-zA-Z ]*$/";
        $validator->setPattern($pattern);
        $value = "hoang duc duy";
        // $value = "zend Framework 3";
        if ($validator->isValid($value)) {
            print_r($value);
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error;
            }
        }
        return false;
    }

    // file Exists
    public function fileExistsAction()
    {
        $validator = new \Zend\Validator\File\Exists();
        // $file = APPLICATION_PATH."/public/files/check.jpg";
        $file = APPLICATION_PATH . "/public/files/checkfile.txt";
        if ($validator->isValid($file)) {
            echo "file ton tai";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error;
            }
        }
        return false;
    }

    // file not Exists
    public function fileNotExistsAction()
    {
        $validator = new \Zend\Validator\File\NotExists();
        // $file = APPLICATION_PATH."/public/files/check.jpg";
        $file = APPLICATION_PATH . "/public/files/checkfile.txt";
        if ($validator->isValid($file)) {
            echo "file khong ton tai";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error;
            }
        }
        return false;
    }

    // check file extension
    public function fileExtensionAction()
    {
        $validator = new \Zend\Validator\File\Extension([
            'extension' => [
                'php',
                'png',
                'txt'
            ],
            'case' => false
        ]);
        $file = APPLICATION_PATH . "/public/files/check2.PNG";
        if ($validator->isValid($file)) {
            echo "file ok";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error;
            }
        }
        return false;
    }

    // filesize
    public function fileSizeAction()
    {
        $validator = new \Zend\Validator\File\Size([
            'min' => 1024,
            'max' => 100 * 1024
        ]);
        $file = APPLICATION_PATH . "/public/files/check.txt";
        if ($validator->isValid($file)) {
            echo " file ok ";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    //image size
    public function imageSizeAction()
    {
        $validator = new \Zend\Validator\File\ImageSize([
            'minwidth' => 100,
            'maxwidth' => 500,
            'minheight' => 200,
            'maxheight' => 500
        ]);
        $file = APPLICATION_PATH . "/public/files/check.txt";
        if ($validator->isValid($file)) {
            echo " file ok ";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }

    //is image
    public function isImageAction()
    {
        $validator = new \Zend\Validator\File\IsImage();
        $file = APPLICATION_PATH . "/public/files/Untitled.png";
        if ($validator->isValid($file)) {
            echo "File ok";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
    }

    // is file compressed
    public function isCompressedAction()
    {
        $validator = new \Zend\Validator\File\IsCompressed();
        $file = APPLICATION_PATH . "/public/files/test.rar";
        if ($validator->isValid($file)) {
            echo "FILE COMPRESSED";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
    }

    //count word in file
    public function wordCountAction()
    {
        $wordcount = new \Zend\Validator\File\WordCount([
            'min' => 5,
            'max' => 600
        ]);
        $file = APPLICATION_PATH . "/public/files/checkfile.txt";
        if ($wordcount->isValid($file)) {
            echo "FILE COMPRESSED";
        } else {
            $messages = $wordcount->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
    }

    //password strength
    public function passwordStrengthAction()
    {
        $validator = new \Zend\Validator\PasswordStrength();
        $password = 'Duy12345a@';
        if ($validator->isValid($password)) {
            echo $password."password ok";
        } else {
            $messages = $validator->getMessages();
            foreach ($messages as $error) {
                echo $error . '<br>';
            }
        }
        return false;
    }
}
