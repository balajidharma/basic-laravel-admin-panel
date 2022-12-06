<?php

namespace App\Helpers;

use App\Models\Contents\Langue;

class Tools
{

    /**
     * Add active class to current menu page
     *
     * @param array $paths
     * @param array $options
     * @return string
     */
    public function openMenu($paths, $options = [])
    {
        foreach ($paths as $path) {
            if (request()->is($path)) {
                return 'hidden' . implode(' ', $options);
            }
        }

        return '';
    }
    /**
     * Add active class to current menu page
     *
     * @param array $paths
     * @param array $options
     * @return string
     */
    public function activeMenu($paths, $options = [])
    {
        foreach ($paths as $path) {
            if (request()->is($path)) {

                return 'bg-green-100' . implode(' ', $options);
            }
        }

        return '';
    }


    public static function slugify($text)
    {

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return '/';
        }
        return $text;
    }

}
