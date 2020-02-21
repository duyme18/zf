<?php

namespace Form\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\UploadFile;
use Zend\File\Transfer\Adapter\Http;
use Zend\Filter\File\Rename;

class UploadFileController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new UploadFile();
        $request = $this->getRequest();
        $message = "Uploaded";
        if ($request->isPost()) {
            $file = $request->getFiles();

            // $fileUpload = new Http();
            // $fileInfo = $fileUpload->getFileInfo();
            // echo $fileUpload->getFileSize();
            // echo '<br>';
            // echo $fileUpload->getFileName();

            // $fileUpload->setDestination(FILES_PATH . 'upload');
            // $fileUpload->receive();
            // echo $message;
            // echo "<script type='text/javascript'>alert('$message');</script>";

            $fileFilter = new Rename([
                'target' => FILES_PATH . 'upload/' . $file['file-upload']['name'],
                'randomize' => true
            ]);
            $fileFilter->filter($file['file-upload']);
        }
        $view = new ViewModel(['form' => $form]);
        $view->setTemplate('form/upload-file/index');
        return $view;
    }
}
