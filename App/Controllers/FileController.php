<?php
declare(strict_types=1);

namespace App\Controllers;

class FileController {

    public static function getUploadErrorMessage(int $errorCode): string {
        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE:
                return 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            case UPLOAD_ERR_FORM_SIZE:
                return 'The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form.';
            case UPLOAD_ERR_NO_FILE:
                return 'No file was uploaded.';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing a temporary folder.';
            default:
                return 'Unknown upload error.';
        }
    }

    public static function storeFile($file): ?string {
        $uploadDir = 'public/uploads/';

        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($file['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $fileName;
            } else {
                echo "Error: Could not move the uploaded file.";
                return null;
            }
        } else {
            echo "Error: " . self::getUploadErrorMessage($file['error']);
            return null;
        }
    }
    

}

