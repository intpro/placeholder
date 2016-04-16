<?php

namespace Interpro\Placeholder\Laravel;

use Interpro\Placeholder\Concept\Exception\PlaceholderException;
use Intervention\Image\Facades\Image;
use Interpro\Placeholder\Concept\PlaceholderAgent as PlaceholderAgentInterface;

class PlaceholderAgent implements PlaceholderAgentInterface{

    /**
     * @param int $width
     * @param int $height
     * @param string $color
     * @return string
     */
    public function getLink($width, $height, $color = '#808080')
    {

        if($width < 0)
        {
            throw new PlaceholderException('Ширина не может быть меньше нуля (0).');
        }

        if($height < 0)
        {
            throw new PlaceholderException('Высота не может быть меньше нуля (0).');
        }

        if(!$this->validateColor($color))
        {
            throw new PlaceholderException('Формат строки цвета неправильный (hex).');
        }

        $dir_path = public_path() . '/' . config('placeholder.placeholder_dir');

        if (!is_dir($dir_path))
        {
            throw new PlaceholderException('Папка для плейсхолдеров ' . config('placeholder.placeholder_dir') . ' не найдена.');
        }

        $file_name = 'placeholder_' . $width . '_'.$height . '_' . substr($color, -6).'.jpg';
        $file_path = $dir_path . '/' . $file_name;

        if(!file_exists($file_path))
        {
            $img = Image::canvas($width, $height, $color);

            $img->save($file_path, 100);

            chmod($file_path, 0777);
        }

        return $file_name;

    }

    /**
     * @param string $color
     * @return bool
     */
    private function validateColor($color)
    {
        preg_match('/(#[a-f0-9]{3}([a-f0-9]{3})?)/i', $color, $matches);
        if (isset($matches[1]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
