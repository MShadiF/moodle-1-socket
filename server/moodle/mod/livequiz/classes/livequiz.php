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

namespace mod_livequiz\classes;
defined('MOODLE_INTERNAL') || die();
require_once('question.php');

/**
 * Class LiveQuiz
 * @package mod_livequiz
 * @copyright 2024 Software AAU
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class livequiz {
    /** @var int $id id of the livequiz */
    private int $id;

    /** @var string $name name of the livequiz */
    private string $name;

    /** @var int $courseid id of the course the quiz is in */
    private int $courseid;

    /** @var string $intro introduction to the quiz */
    private string $intro;

    /** @var int $introformat format of the introduction text*/
    private int $introformat;

    /** @var int $timecreated when the quiz was created*/
    private int $timecreated;

    /** @var int $timemodified last time the quiz was modified*/
    private int $timemodified;

    /** @var array $questions array of questions in the quiz */
    private array $questions = [];

    /**
     * LiveQuiz constructor.
     * @param int $id
     * @param string $name
     * @param int $courseid
     * @param string $intro
     * @param int $introformat
     * @param int $timecreated
     * @param int $timemodified
     * @param array $questions
     */
    public function __construct(
        int $id,
        string $name,
        int $courseid,
        string $intro,
        int $introformat,
        int $timecreated,
        int $timemodified,
        array $questions
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->courseid = $courseid;
        $this->intro = $intro;
        $this->introformat = $introformat;
        $this->timecreated = $timecreated;
        $this->timemodified = $timemodified;

        foreach ($questions as $question) {
            $questionobject = new question(
                $question['id'],
                $question['title'],
                $question['description'],
                $question['explanation'],
                $question['timelimit'],
                $question['answers']
            );
            $this->questions[] = $questionobject;
        }
    }

    /**
     * Getter for livequiz id
     * @return int
     */
    public function get_id(): int {
        return $this->id;
    }

    /**
     * Getter for livequiz name
     * @return string
     */
    public function get_name(): string {
        return $this->name;
    }

    /**
     * Getter for livequiz courseid
     * @return int
     */
    public function get_courseid(): int {
        return $this->courseid;
    }

    /**
     * Getter for livequiz intro
     * @return string
     */
    public function get_intro(): string {
        return $this->intro;
    }

    /**
     * Getter for livequiz introformat
     * @return int
     */
    public function get_introformat(): int {
        return $this->introformat;
    }

    /**
     * Getter for livequiz timecreated
     * @return int
     */
    public function get_timecreated(): int {
        return $this->timecreated;
    }

    /**
     * Getter for livequiz timemodified
     * @return int
     */
    public function get_timemodified(): int {
        return $this->timemodified;
    }

    /**
     * Getter for livequiz array of question objects
     * @return array
     */
    public function get_questions(): array {
        return $this->questions;
    }

    /**
     * Getter that gets the question object in the parsed index
     * @param int $index the index of the question
     * @return question
     */
    public function get_question_by_index(int $index) {
        return $this->questions[$index];
    }
}
