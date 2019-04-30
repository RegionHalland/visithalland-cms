<?php

namespace App\Traits;

trait RecommendedArticles
{

    /**
    * Returns top list acf repeater field from selected pages
    * @return array Output top list array
    */
    public function recommendedArticles() {
        
        $recommended_articles = \App::getPosts(array(), null , 3, true);

        return $recommended_articles;
    }
}
