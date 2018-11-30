<?php
    include_once('../includes/database.php');

    function addSubscription($channel_id, $user_id)
    {
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO subscription VALUES(?, ?)');
        $stmt->execute(array($channel_id, $user_id));
    }

    function removeSubscription($channel_id, $user_id)
    {
        $db = Database::instance()->db();
        $stmt = $db->prepare('DELETE FROM subscription WHERE channel_id = ? AND user_id = ?');
        $stmt->execute(array($channel_id, $user_id));
    }
     function isUserSubscribed($channel_id, $user_id)
    {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM subscription WHERE channel_id = ? AND user_id = ?');
        $stmt->execute(array($channel_id, $user_id));
        return $stmt->fetch() ? true : false;
    }

    function insertChannel($channel_name, $channel_description, $user_id)
    {
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO channel VALUES(NULL, ?, ?, ?');
        $stmt->execute(array($channel_name, $channel_description, $user_id));
    }

    function getChannel($channel_id)
    {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM channel WHERE channel_id = ?');
        $stmt->execute(array($channel_id));
        return $stmt->fetch();
    }
?>