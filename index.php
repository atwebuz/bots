<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();


if ($text == '/start'){

    $option = array(
        //First row
        array($telegram->buildKeyboardButton("Button 1")), 
        //Second row 
        array($telegram->buildKeyboardButton("Button 3"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   

    $content = array('chat_id' => $chat_id,  'text' =>  '🗣 Batafsil malumot');
    $telegram->sendMessage($content);

    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  '👨‍💻 Buyurtma berish');
    $telegram->sendMessage($content);
}