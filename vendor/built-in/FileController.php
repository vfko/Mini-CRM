<?php

abstract class FileController {

    /**
     * @param string $directory          The directory that will be scanned.
     * @param bool $sort_ascending       true for ascending, false for descending
     * @return array|false               array with content names, false on failure
     */
    static function getDirectoryContent(string $directory, bool $sort_ascending=true): array|false {
        return scandir($directory, $sort_ascending);
    }

    static function moveFile(string $path, $file, $new_file_name=null) {
        if ($new_file_name != null) {
            return rename($file, $path.$new_file_name);
        }
        $parsed_file_path = explode('/', $file);
        $file_name = $parsed_file_path[(count($parsed_file_path) - 1)];
        rename($file, $path.$file_name);
    }

    static function renameFile(string $path_to_file, string $new_file_name): bool {
        return rename($path_to_file, $new_file_name);
    }

    static function deleteFile(string $file): bool {
        return unlink($file);
    }

    static function deleteDirectory(string $directory): bool {
        return rmdir($directory);
    }

    static function createFile(string $new_file): bool {
        $file = fopen($new_file, 'w');
        fclose($file);
        return file_exists($new_file);
    }

    static function getFileContent(string $file): string|false {
        return file_get_contents($file);
    }

    static function writeToFile(string $file, mixed $content, bool $rewrite=false): bool {
        if ($rewrite) {
            return file_put_contents($file, $content);
        }
        return file_put_contents($file, $content, FILE_APPEND);
    }
}