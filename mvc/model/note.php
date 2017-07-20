<?php
class NoteModel{
    public static function insert($title, $description, $userId){
        $db = Db::getInstance();
        $time = getCurrentDateTime();
        $db->insert("INSERT INTO x_note (title, description, user_id,  eventDate, isDone) VALUES ('$title', '$description', '$userId', '$time' , false )");
    }

    public static function remove($noteId, $userId){
        $db = Db::getInstance();
        $db->modify("DELETE FROM x_note WHERE note_id=$noteId AND user_id=$userId");
    }

    public static function toggle($noteId, $userId){
        $db = Db::getInstance();
        $db->modify("UPDATE x_note SET isDone=NOT isDone WHERE note_id=$noteId AND user_id=$userId");
    }

    public static function fetchAllNotes($user_id){
        $db = Db::getInstance();
        $records = $db->query("SELECT * FROM x_note WHERE user_id=$user_id");
        return $records;
    }

    public static function fetch_by_id($noteId,$user_id){
        $db = Db::getInstance();
        return $db->first("SELECT * FROM x_note WHERE note_id='$noteId' and user_id='$user_id'");
    }
}