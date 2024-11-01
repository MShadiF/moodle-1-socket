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

class livequiz_dto {
    /**
     * @var int $id
     */
    public int $id;

    /**
     * @var string $name
     */
    public string $name;

    /**
     * @var int $course
     */
    public int $course;

    /**
     * @var string $intro
     */
    public string $intro;

    /**
     * @var int $introformat
     */
    public int $introformat;

    /**
     * @var int $timecreated
     */
    public int $timecreated;

    /**
     * @var int $timemodified
     */
    public int $timemodified;

    /**
     * @var array $questions
     */
    public array $questions = [];
}