<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Displays the livequiz view page.
 * @package   mod_livequiz
 * @copyright 2024 Software AAU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir . '/accesslib.php'); // Include the access library for context_module.

global $OUTPUT, $PAGE, $DB;


$id = required_param('id', PARAM_INT); // Course module ID.
[$course, $cm] = get_course_and_cm_from_cmid($id, 'livequiz');
$instance = $DB->get_record('livequiz', ['id' => $cm->instance], '*', MUST_EXIST);

require_login($course, true, $cm); // Ensure the user is logged in and can access this module.
$context = context_module::instance($cm->id); // Set the context for the course module.
$PAGE->set_context($context); // Make sure to set the page context.
try {
    require_capability('moodle/course:manageactivities', $context);
} catch (Exception $e) {
    echo 'Permission error: ' . $e->getMessage();
    die();
}
$PAGE->set_url('/mod/livequiz/view.php', ['id' => $id]);
$PAGE->set_title(get_string('modulename', 'mod_livequiz'));
$PAGE->set_heading(get_string('modulename', 'mod_livequiz'));

echo $OUTPUT->header();
echo $context->id;
echo $OUTPUT->heading('This is the livequiz view page');
echo $cm->id;

// Check if the form was submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['userfile'])) {
    $itemid = required_param('itemid', PARAM_INT); // Replace or modify as needed.
    $fs = get_file_storage();

    // Set up file record details.
    $file_record = array(
        'contextid' => $context->id,
        'component' => 'mod_yourplugin', // Replace with your plugin's component name.
        'filearea' => 'uploaded_files',  // Replace with your file area.
        'itemid' => $itemid,             // Set this to your specific item ID (e.g., a record ID).
        'filepath' => '/',               // Root directory for files.
        'filename' => $_FILES['userfile']['name'] // Use the uploaded file's name.
    );

    // Check if the file already exists and delete if necessary (optional).
    $existing_file = $fs->get_file($context->id, 'mod_livequiz', 'uploaded_files', $itemid, '/', $_FILES['userfile']['name']);
    if ($existing_file) {
        $existing_file->delete();
    }

    // Create the file from the temporary upload location.
    $stored_file = $fs->create_file_from_pathname($file_record, $_FILES['userfile']['tmp_name']);
    if ($stored_file) {
        echo '<p>File uploaded successfully.</p>';
    } else {
        echo '<p>Failed to upload the file.</p>';
    }
}

// Display the upload form.
echo '<form enctype="multipart/form-data" method="post">';
echo '<input type="hidden" name="itemid" value="42">'; // Replace or modify as needed.
echo '<input type="file" name="userfile">';
echo '<input type="submit" value="Upload File">';
echo '</form>';

echo $OUTPUT->footer();
