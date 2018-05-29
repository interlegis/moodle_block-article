<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 25/05/18
 * Time: 16:19
 */

class block_article extends block_base
{
    public function init() {
        $this->title = get_string('article', 'block_article');
    }
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         =  new stdClass;
        $this->content->text   = 'The content of our SimpleHTML block!';
        $this->content->footer = 'Footer here...';

        return $this->content;
    }
}