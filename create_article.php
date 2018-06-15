<?php
require_once("$CFG->libdir/formslib.php");

class create_article extends moodleform
{
    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore!
        $mform->addElement('text', 'article_title', 'Título'); // Add elements to your form
        $mform->setType('article_title', PARAM_NOTAGS);
        $textfieldoptions = array('trusttext'=>true, 'subdirs'=>true, 'maxfiles'=>5, 'maxbytes'=>100000000, 'enable_filemanagement' => true);
        $mform->addElement('editor', 'article_text', 'Texto', null, $textfieldoptions);
        $mform->setType('article_text', PARAM_RAW);
        $mform->addElement('hidden', 'article_date', date('Y-m-d'));
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}