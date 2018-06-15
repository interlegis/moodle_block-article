<?php

function xmldb_block_article_upgrade($oldversion) {
    global $CFG;
    global $DB;
    $dbman = $DB->get_manager();
    $result = TRUE;

    if ($oldversion < 2018060421) {

        // Define table block_article to be created.
        $table = new xmldb_table('block_article');

        // Adding fields to table block_article.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('article_title', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table->add_field('article_text', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('article_date', XMLDB_TYPE_INTEGER, '10', null, null, null, null);

        // Adding keys to table block_article.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for block_article.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Article savepoint reached.
        upgrade_block_savepoint(true, 2018060421, 'article');
    }

    return $result;
}
?>