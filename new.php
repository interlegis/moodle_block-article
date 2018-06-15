<?php

require_once("../../config.php");
require_once('create_article.php');
global $DB, $OUTPUT, $PAGE;
require_login();
if (isguestuser()) {
    die();
}
// Prepare page
$context=context_system::instance();
$PAGE->set_context($context);
$PAGE->set_heading('Nova notícia');

// Check if user is logged and not guest

//Instantiate simplehtml_form
$mform = new create_article();

//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
} else if ($fromform = $mform->get_data()) {
    $fromform->article_text=$fromform->article_text['text'];
    if (!$DB->insert_record('block_article', $fromform)) {
        print_error('inserterror', 'block_article');
    }
} else {
    // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
    // or on the first display of the form.

    //Set default data (if any)
    //displays the form
    echo $OUTPUT->header();
    $mform->display();
    echo $OUTPUT->footer();
}