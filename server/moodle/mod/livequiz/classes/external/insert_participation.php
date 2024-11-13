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

namespace mod_livequiz\external;

use core_external\external_function_parameters;
use core_external\external_value;
use dml_exception;
use mod_livequiz\services\livequiz_services;

/**
 * Class insert_participation
 *
 * This class extends the core_external\external_api and is used to handle
 * the external API for appending participation in the live quiz module.
 *
 * @return     external_function_parameters The parameters required for the execute function.
 * @copyright 2024 Software AAU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package    mod_livequiz
 */
class insert_participation extends \core_external\external_api {
    /**
     * Returns the description of the execute_parameters function.
     * @return external_function_parameters The parameters required for the execute function.
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'quizid' => new external_value(PARAM_INT, 'Quiz ID'),
            'studentid' => new external_value(PARAM_INT, 'Student ID'),
        ]);
    }
    /**
     * Summary of execute
     * @param int $quizid
     * @param int  $studentid
     * @return int
     */
    public static function execute(int $quizid, int $studentid) {
        self::validate_parameters(self::execute_parameters(), ['quizid' => $quizid, 'studentid' => $studentid]);
        $services = livequiz_services::get_singleton_service_instance();
        try {
            return $services->insert_participation($studentid, $quizid);
        } catch (dml_exception $e) {
            debugging('Error inserting participation: ' . $e->getMessage());
            return -1;
        }
    }
    /**
     * Part of the webservice processing flow. Not called directly here,
     * but is in moodle's web service framework.
     * @return \external_function_parameters
     */
    public static function execute_returns(): external_value {
        return new external_value(PARAM_BOOL, 'Is insertion of participation successfull or not');
    }

    //private function read_answers_from_session() {
    //    $_SESSION['quiz_answers'][]
    //}
}
