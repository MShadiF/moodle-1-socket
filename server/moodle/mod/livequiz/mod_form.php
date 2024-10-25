<?php
// This file is part of Moodle - http://moodle.org/.
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
 * Activity creation/editing form for the mod_livequiz plugin.
 *
 * @package    mod_livequiz
 * @copyright  2024 Software AAU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');

/**
 * Form for creating/editing a livequiz activity.
 *
 * @package    mod_livequiz
 */
class mod_livequiz_mod_form extends moodleform_mod {
    /**
     * Defines the form elements.
     *
     * This function sets up the form elements for creating or editing a livequiz activity,
     * including the standard course module elements and action buttons.
     *
     * @return void
     */
    public function definition(): void {
        $mform = $this->_form; // Reference to the form.

        // Add standard course module elements.
        $this->standard_coursemodule_elements();

        // Add standard Moodle form action buttons.
        $this->add_action_buttons();
    }

    /**
     * Custom validation for the form.
     *
     * @param array $data  Submitted form data.
     * @param array $files Uploaded files.
     * @return array An array of validation errors, empty if none.
     */
    public function validation($data, $files): array {
        return []; // No custom validation rules for now.
    }

    /**
     * Preprocess form data before it is displayed.
     *
     * @param array &$default_values Default form values.
     * @return void
     */
    public function data_preprocessing(&$defaultvalues): void {
        // No preprocessing required for now.
    }
}
