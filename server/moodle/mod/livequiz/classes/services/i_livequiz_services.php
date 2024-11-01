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

interface i_livequiz_services {
    /** Gets the livequiz instance with questions and answers.
     * 
     * @param int $id The id of the wanted livequiz.
     * @return livequiz 
     */
    public function get_livequiz_instance(int $id): livequiz_dto;

    public function submit_quiz(livequiz_dto $livequiz): livequiz_dto;

    public function update_quiz(livequiz_dto $updated): livequiz_dto;
}