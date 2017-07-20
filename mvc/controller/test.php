<?php

/**
 * Created by PhpStorm.
 * User: Mr648
 * Date: 7/20/2017
 * Time: 1:08 PM
 */
class TestController {
    public function test($user_id) {

        for ($index = 0; $index < 100; $index++)
            NoteModel::insert("some title ".$index, "some description, some description ".$index, $user_id);

    }

    // TODO write gamal here
}