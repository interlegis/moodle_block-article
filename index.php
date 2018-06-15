<?php

require_once("../../config.php");
require_once('create_article.php');
global $DB, $OUTPUT, $PAGE;
// Prepare page
$context=context_system::instance();
$PAGE->set_context($context);
$PAGE->set_heading('Notícias');
$result = $DB->get_records_sql('SELECT * FROM {block_article} WHERE id < ?', array(15));

    echo $OUTPUT->header();
    foreach ($result as $r) {
        echo $r->article_text;
    }
    echo $OUTPUT->footer();