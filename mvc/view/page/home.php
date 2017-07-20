<div class="relative">
    <? $header = '<div class="pageheader  topRight"><img class="profile-image" src="' . baseUrl() . '/image/empty-profile-24.png"><div class="htitle">'; ?>
</div>
<? if ($isGuest){
    $header .= _header_guest . '</div></div>';
    echo $header;
}else{
$header .= $_SESSION['email'] . ' خوش آمدید. ' . '</div>'
    . '<a class="btn-white topLeft btn-logout link-simple" href="'. baseUrl().'/user/logout'. '">'._btn_logout.'</a>'
    . '</div>';
echo $header;
?>

<div>
    <div class="notes">

        <?
        $doneImage = baseUrl() . '/image/done.png';
        $notDoneImage = baseUrl() . '/image/not_done.png';
        if ($records != null && count($records) > 0) {
            foreach ($records as $record) {
                echo '<div class="tac" >'
                    . '<img src="' . ($record['isDone'] == 0 ? $notDoneImage : $doneImage) . '" class="img-anim" onclick="toggle(this, ' . $record['note_id'] . ')">'
                    . '<div class="note">' . $record['title'] . "،  " . $record['description'] . "،  " . $record['eventDate'] . '</div>'
                    . '<img src="' . baseUrl() . '/image/delete.png' . '" class="img-anim right-margin5" onclick="remove(this,' . $record['note_id'] . ')">'
                    . '</div>';
            }

        } else {
        }
        echo '<div class="relative"><a href="' . baseUrl() . '/note/submit" class="link-simple btn-blue bottomleft">' . 'اضافه کردن یاد آور جدید' . '</a></div>';
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function toggle(sender, noteId) {
        var $sender = $(sender);
        $.ajax('/notes-v2/note/toggle/' + noteId, {
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.isDone == 1) {
                    $sender.attr('src', '/notes-v2/image/done.png')
                } else {
                    $sender.attr('src', '/notes-v2/image/not_done.png')
                }
            }
        });
    }
    function remove(sender, noteId) {
        var $parent = $(sender).parent();
        $.ajax('/notes-v2/note/remove/' + noteId, {
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $parent.remove();
            }
        });
    }
</script>