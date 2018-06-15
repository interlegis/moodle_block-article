<?php
defined('MOODLE_INTERNAL') || die();

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
        $url = new moodle_url('/blocks/article/new.php');
        $url_index = new moodle_url('/blocks/article/index.php');
        $this->content->footer = 'Footer here...';

        return $this->content;
    }
}