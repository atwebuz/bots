<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();


if ($text == '/start'){

    $option = array(
        //First row
        array($telegram->buildKeyboardButton("Button 1"), $telegram->buildKeyboardButton("Button 2")), 
        //Second row 
        array($telegram->buildKeyboardButton("Button 3"), $telegram->buildKeyboardButton("Button 4"), $telegram->buildKeyboardButton("Button 5"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=false);
   

    $content = array('chat_id' => $chat_id,  'text' =>  'Assalomu aleykum auto shop botiga xush kelibsiz !!!');
    $telegram->sendMessage($content);

    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Biz bilan boling va yetuk marralarga erishing.');
    $telegram->sendMessage($content);
}