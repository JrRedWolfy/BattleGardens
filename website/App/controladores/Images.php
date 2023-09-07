<?php

class Images extends Controlador {

    private $uploader;

    public function __construct() {
        $this->uploader = new Uploader();
    }

    public function index($extra = []) {
        $data = array_merge([], $extra);

        $this->vista('landing_page',$this->datos);
    }

    public function upload() {
        $data = [];

        // Get the test name.
        $testName = $_POST['test_name'] ?? '';

        // Validate the test name.
        if (empty($testName)) {
            $errors['test_name'] = 'Please enter student name';
        }

        // Check the files list.
        try {
            if (!$_FILES) {
                throw new UnexpectedValueException(
                'Here was a problem with the upload. Please try again.'
                );
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            exit();
        }

        // If no errors, then upload the files.
        if (empty($errors)) {
            $uploadResult = $this->uploader->upload($_FILES['files'], $testName);

            if ($uploadResult !== TRUE) {
                $errors['files'] = $uploadResult;
            }
        }

        $data['test_name'] = $testName;
        $data['errors'] = $errors ?? [];

        // Flash some success message using the flash() function if no errors occurred...

        $this->vistaApi($data);
    }

}