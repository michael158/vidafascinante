<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 24/04/2016
 * Time: 18:53
 */

namespace Modules\Admin\Entities;


class Upload
{


    public function upload($file, $name = null, $paste)
    {
        $destinationPath = "uploads/$paste/"; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = $name != null ? $name . '.' . $extension : $file->getClientOriginalName(); // renaming image

        $this->deleteFileExists($fileName, $destinationPath);

        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    /**
     * Verifica se um arquivo de mesmo nome já existe na pasta especificada
     *
     * @author    Michael Douglas <michael.dsa41@gmail.com>
     * @version    1.0.x
     * @since    1.0.x
     *
     * @return    boolean
     * @param    string $fileName nome do arquivo string $destinationPath Caminho a verificar
     */
    protected function deleteFileExists($fileName, $destinationPath)
    {
        $exists = false;
        if (is_dir($destinationPath)) {
            if ($dh = opendir($destinationPath)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file == $fileName) {
                       unlink($destinationPath . $fileName);
                    }
                }
                closedir($dh);
            }
        }

        return $exists;
    }


}