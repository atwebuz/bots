<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();


if ($text == '/start'){

    $option = array(
        //First row
        array($telegram->buildKeyboardButton("🗣 Batafsil malumot")), 
        //Second row 
        array($telegram->buildKeyboardButton("👨‍💻 Buyurtma berish"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   

    $content = array('chat_id' => $chat_id,  'text' =>  'Assalomu aleykum auto shop botiga xush kelibsiz !!!');
    $telegram->sendMessage($content);

    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Biz bilan boling va yetuk marralarga erishing.');
    $telegram->sendMessage($content);
}elseif ($text == '🗣 Batafsil malumot'){
    $content = array('chat_id' => $chat_id,  'text' =>  "Biz xaqimizda malumot. <a href='https://telegra.ph/Biz-xaqimizda-05-31'>Havolani ko'rish</a>", "parse_mode" => "html");
    $telegram->sendMessage($content);
}
elseif ('👨‍💻 Buyurtma berish'){
    $option = array(
        //First row
        array($telegram->buildKeyboardButton("button 1")),
        //Second row 
        array($telegram->buildKeyboardButton("button 2")), 
        //Third row
        array($telegram->buildKeyboardButton("button 3")),
        //Fourth row 
        array($telegram->buildKeyboardButton("button 4"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   
    $content = array('chat_id' => $chat_id,  'text' =>  'Assalomu aleykum auto shop botiga xush kelibsiz !!!');
    $telegram->sendMessage($content);
}