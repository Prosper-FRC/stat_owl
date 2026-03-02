<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../database_connection.php";
require_once "../global_connection.php";


function sync_server($game, $event) {
    /* $ids = [];
    $ip_addresses = [];
    $match_nos = [];
    $time_secs = [];
    $robots = [];
    $alliances = [];
    $actions = [];
    $locations = [];
    $results = [];
    $points = [];
    $timestamps = [];
    $field_ids = []; */

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'");
        $pull_stmt = $pdo->prepare("
            SELECT 
                ip_address, match_no, time_sec, robot, alliance, action, location, result, points, timestamp, field_id 
            FROM scouting_submissions 
            WHERE uploaded = 0 AND event_name = :event AND game = :game
        ");
        $pull_stmt->execute([
            ':event' => $event,
            ':game' => $game
        ]);
        $rows = $pull_stmt->fetchAll(PDO::FETCH_ASSOC);
        $df = [];
        foreach ($rows as $r) {
            $c = [];
            $c[] = $game;
            $c[] = $r['ip_address'];
            $c[] = $event;
            $c[] = $r['match_no'];
            $c[] = $r['time_sec'];
            $c[] = $r['robot'];
            $c[] = $r['alliance'];
            $c[] = $r['action'];
            $c[] = $r['location'];
            $c[] = $r['result'];
            $c[] = $r['points'];
            $c[] = $r['timestamp'];
            $c[] = $r['field_id'];
            $df[] = $c;
        }
        echo "<script> alert(count($df)); </script>"
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }

}
>
<!DOCTYPE=<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Upload</title>
</head>
</html>
