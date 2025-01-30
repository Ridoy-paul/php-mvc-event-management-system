<?php
declare(strict_types=1);

namespace App\Controllers;
use Exception;
use Urls;

class FileController  {

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

    public static function storeFile($file) {
        try {
            $uploadDir = 'uploads/';
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    
            if (!file_exists($uploadDir)) {
                if (!mkdir($uploadDir, 777, true)) {
                    throw new Exception("Error: Unable to create upload directory.");
                }
            }
    
            if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Error: " . self::getUploadErrorMessage($file['error']));
            }
            
            $img = $file['name'];
            $tmp = $file['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
            if (!in_array($ext, $valid_extensions)) {
                throw new Exception("Error: Invalid file type.");
            }
    
            $maxFileSize = 10 * 1024 * 1024; // 10MB limit
            if ($file['size'] > $maxFileSize) {
                throw new Exception("Error: File is too large. Max size is 10MB.");
            }
    
            $final_image = rand(11111111, 99999999) . '.' . $ext;
            $targetPath = $uploadDir . $final_image;
    
            if (!is_writable($uploadDir)) {
                throw new Exception("Error: Upload directory is not writable.");
            }
    
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return [
                    'status' => 1,
                    'file_name' => $final_image,
                ];
            }
            else {
                throw new Exception("Error: Could not move the uploaded file.");
            }
    
        } catch (Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }
    
    

}

