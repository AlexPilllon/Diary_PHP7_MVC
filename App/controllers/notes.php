<?php

use App\core\controller;
use App\Auth;

class Notes extends Controller {

    public function open ($id = ''){

        $note = $this->model('Note');
        $data = $note->findId($id);

        $this->view('notes/open', $data);
    }

    public function create(){

        Auth::checkLogin();
        $mesage = array();

        if(isset($_POST['register'])){

            if(empty($_POST['title'])){
                $mesage[] = "Please Fill In The Title Field!";
            }
            elseif(empty($_POST['text'])){
                $mesage[] = "Please Fill In The Text Field!";
            }
            else{

                //upload file


                    $storage = new \Upload\Storage\FileSystem('uploads');
                    $file = new \Upload\File('foo', $storage);

    // Optionally you can rename the file on upload
                    $new_filename = uniqid();
                    $file->setName($new_filename);

    // Validate file upload
    // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                    $file->addValidations(array(
                        // Ensure file is of type "image/png"
                        new \Upload\Validation\Mimetype('image/png'),

                        //You can also add multi mimetype validation
                        //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

                        // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                        new \Upload\Validation\Size('5M')
                    ));

    // Access data about the file that has been uploaded
                    $data = array(
                        'name' => $file->getNameWithExtension(),
                        'extension' => $file->getExtension(),
                        'mime' => $file->getMimetype(),
                        'size' => $file->getSize(),
                        'md5' => $file->getMd5(),
                        'dimensions' => $file->getDimensions()
                    );

    // Try to upload file
                    try {
                        // Success!
                        $file->upload();
                        $mesage[] = "Successful Upload!";

                        $note = $this->model('Note');
                        $note->title = $_POST['title'];
                        $note->text = $_POST['text'];
                        $note->image = $data['name'];
                        $mesage[]= $note->save();

                    } catch (\Exception $e) {
                        // Fail!
                        $errors = $file->getErrors();
                        $mesage[] = implode("<br>", $errors);
                    }
            }
        }
        $this->view('notes/create', $data = ['mesage'=>$mesage]);

    }

    public function update($id){
        Auth::checkLogin();
        $mesage = array();
        $note = $this->model('Note');

        if(isset($_POST['update'])) {

            if (empty($_POST['title'])) {
                $mesage[] = "Please Fill In The Title Field!";
            } elseif (empty($_POST['text'])) {
                $mesage[] = "Please Fill In The Text Field!";
            } else {

                $note->title = $_POST['title'];
                $note->text = $_POST['text'];

                $mesage[] = $note->update($id);
            }
        }

        if(isset($_POST['updateImage'])) {

            if (empty($_POST['title'])) {
                $mesage[] = "Please Fill In The Title Field!";
            } elseif (empty($_POST['text'])) {
                $mesage[] = "Please Fill In The Text Field!";
            } else {

                //upload file


                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);

                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    new \Upload\Validation\Mimetype('image/png'),

                    //You can also add multi mimetype validation
                    //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

                    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                    new \Upload\Validation\Size('5M')
                ));

                // Access data about the file that has been uploaded
                $data = array(
                    'name' => $file->getNameWithExtension(),
                    'extension' => $file->getExtension(),
                    'mime' => $file->getMimetype(),
                    'size' => $file->getSize(),
                    'md5' => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );

                // Try to upload file
                try {
                    // Success!
                    $file->upload();
                    $mesage[] = "Successful Upload!";

                    $note = $this->model('Note');
                    $note->title = $_POST['title'];
                    $note->text = $_POST['text'];
                    $note->image = $data['name'];
                    $mesage[]= $note->updateImage($id);

                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mesage[] = implode("<br>", $errors);
                }
            }
        }

            if(isset($_POST['deleteImage'])) {
                $image = $note->findId($id);
                unlink("uploads/" . $image['image']);
                $mesage[] = $note->deleteImage($id);
            }

        $data = $note->findId($id);
        $this->view('notes/update', $data = ['mesage'=>$mesage, 'register' => $data]);
    }

    public function delete($id = '') {
        Auth::checkLogin();
        $mesage = array();

        $note = $this->model('Note');

        $mesage[] = $note->delete($id);

        $data = $note->getAll();

        $this->view('home/index', $dados = ['register' => $data, 'mesage' => $mesage]);
    }

}
