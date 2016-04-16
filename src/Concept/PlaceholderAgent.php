<?php

namespace Interpro\Placeholder\Concept;

interface PlaceholderAgent {

    /**
     * @param int $width
     * @param int $height
     * @param string $color
     * @return string
     */
    public function getLink($width, $height, $color = '8421504');

}
