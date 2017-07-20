<?php

class NoteController {
    public function submit() {

        if (isset($_POST['title'])) {
            $this->submitNote();
        } else {
            View::render("note/submit.php");
        }
    }

    private function submitNote() {

        $title = $_POST['title'];
        $description = $_POST['description'];

        if (!isset($_SESSION['user_id'])) {
            message('fail', "message not allowed;", true);
        } else {
            NoteModel::insert($title, $description, $_SESSION['user_id']);
            header("Location:" . baseUrl() . "/page/home");
        }
    }

    public function toggle($noteId) {

        if (!isset($_SESSION['user_id'])) {
            message('fail', _already_logged_out, true);
        }
        $userId = $_SESSION['user_id'];
        NoteModel::toggle($noteId, $userId);
        echo json_encode(array(
            "status" => true,
            "isDone" => NoteModel::fetch_by_id($noteId, $userId)['isDone'],
        ));
    }

    public function remove($noteId) {

        if (!isset($_SESSION['user_id'])) {
            message('fail', _already_logged_out, true);
        }
        $userId = $_SESSION['user_id'];
        NoteModel::remove($noteId, $userId);
        echo json_encode(array(
            "status" => true,

        ));
    }

}