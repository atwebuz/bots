<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$content = array('chat_id' => $chat_id, 'text' =>  $text);
$telegram->sendMessage($content);