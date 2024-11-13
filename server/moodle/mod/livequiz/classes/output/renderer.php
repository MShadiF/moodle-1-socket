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

namespace mod_livequiz\output;

use core\exception\moodle_exception;
use plugin_renderer_base;

/**
 * The main renderer for the livequiz module.
 *
 * @package   mod_livequiz
 * @category  output
 * @copyright 2024 Software AAU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {
    /**
     *
     * @param index_page $page
     *
     * @return string html for the page
     * @throws moodle_exception
     */
    public function render_index_page(index_page $page): string {
        $data = $page->export_for_template($this);
        return parent::render_from_template('mod_livequiz/index_page', $data);
    }

    /**
     *
     * @param take_livequiz_page $page
     *
     * @return string html for the page
     * @throws moodle_exception
     */
    public function render_take_livequiz_page(take_livequiz_page $page): string {
        $data = $page->export_for_template($this);
        return parent::render_from_template('mod_livequiz/take_livequiz_page', $data);
    }
    /**
     * 
     * @return string html for the navbar
     * @throws moodle_exception
     */
    public function render_navigationbar(): string {
        $id = required_param('id', PARAM_INT);
        $tabs = [
            [
                'url' => new moodle_url('/mod/livequiz/quizcreator', ['id' => $id]),
                'label' => get_string('quizcreator', 'mod_livequiz'),

            ],
            [
                'url' => new moodle_url('/mod/livequiz/quizrunner', ['id' => $id]),
                'label' => get_string('quizrunner', 'mod_livequiz'),

            ],
            [
                'url' => new moodle_url('/mod/livequiz/quizstats', ['id' => $id]),
                'label' => get_string('quizstats', 'mod_livequiz'),

            ],
            [
                'url' => new moodle_url('/mod/livequiz/questionbank', ['id' => $id]),
                'label' => get_string('questionbank', 'mod_livequiz'),
            ],
        ];
        return parent::render_from_template('mod_livequiz/navigationbar', $tabs);
    }
}

