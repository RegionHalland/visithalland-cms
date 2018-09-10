<?php

namespace App\Traits;

trait EuropeanUnion
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public function europeanUnion() {
            
        $european_union['disclaimer'] = get_field('eu_disclaimer', 'options');
        $european_union['logo'] = get_field('eu_logo', 'options');
        $european_union['link'] = get_field('eu_link', 'options');

        return $european_union;
    }
}
