<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 31/05/2016
 * Time: 22:36
 */

namespace App\My;


use League\Flysystem\Exception;

class Resume
{

    protected $find = ['</div>', '<br>', '</p>'];
    protected $removes = ['<p>&nbsp;</p>', '<div>', '<h1>&nbsp;</h1>', '<h2>&nbsp;</h2>', '<h3>&nbsp;</h3>', '<h4>&nbsp;</h4>', '<h5>&nbsp;</h5>', '<h6>&nbsp;</h6>'];

    public function intelligentResume($string, $stripTags = false)
    {
        $this->removeTags($string);
        $closeIndex = $this->getCloseIndex($string);
        if (!empty($closeIndex)) {
            $resume = substr($string, 0, $closeIndex);
            if ($stripTags)
                $resume = strip_tags($resume);
        } else {
            $resume = $string;
        }

        return $resume;
    }

    private function removeTags(&$string)
    {
        foreach ($this->removes as $item) {
            $string = str_replace($item, '', $string);
        }
    }

    private function getCloseIndex($string)
    {
        $positions = $this->getPositions($string);
        $formatData = [];
        foreach ($positions as $item) {
            if ($item) {
                $formatData[] = $item;
            }
        }


        $menor = isset($formatData[0]) ? $formatData[0] : null;

        if (!empty($menor)) {
            foreach ($formatData as $item) {
                if ($item < $menor) {
                    $menor = $item;
                }
            }

        }

        return $menor;
    }


    private function getPositions($string)
    {
        $positions = [];
        foreach ($this->find as $item) {
            $positions[] = stripos($string, $item);
        }

        return $positions;
    }

    public static function build()
    {
        static $instance = null;

        if (is_null($instance))
            $instance = new self;

        return $instance;
    }
}