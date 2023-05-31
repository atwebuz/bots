<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();


$orderTypes = [
    'Laccetti 15000$',
    'Matiz 4900$',
    'Spark 7300$',
    'Cobalt 8300$'
];

if ($text == '/start'){
    showStart();
}
elseif ($text == '🗣 Batafsil malumot'){
    showAbout();
}
elseif ($text == '👨‍💻 Buyurtma berish'){
    showOrder();
}
// elseif ($text == 'Laccetti 15000$'){
//     askContact();
// }
// elseif ($text == 'Matiz 4900$'){
//     askContact();
// }
// elseif ($text == 'Spark 7300$'){
//     askContact();
// }
// elseif ($text == 'Cobalt 8300$'){
//     askContact();
// }
elseif (in_array($text, $orderTypes)){
    askContact();
}


function showStart(){
    global $telegram, $chat_id;

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
}

function showAbout(){
    global $telegram, $chat_id;

    $content = array('chat_id' => $chat_id,  'text' =>  "Biz xaqimizda malumot. <a href='https://telegra.ph/Biz-xaqimizda-05-31'>Havolani ko'rish</a>", "parse_mode" => "html");
    $telegram->sendMessage($content);
}

function showOrder(){
    global $telegram, $chat_id;

    $option = array(
        //First row
        array($telegram->buildKeyboardButton("Laccetti 15000$")),
        //Second row 
        array($telegram->buildKeyboardButton("Matiz 4900$")), 
        //Third row
        array($telegram->buildKeyboardButton("Spark 7300$")),
        //Fourth row 
        array($telegram->buildKeyboardButton("Cobalt 8300$"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Buyurtma berish uchun avtomabil turini tanlang !!!');
    $telegram->sendMessage($content);
}

function askContact() {
    global $telegram, $chat_id;

    $option = array(
        array($telegram->buildKeyboardButton("☎️ Kontakt yuborish", true)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Siz ushbu mashinani tanladingiz!!!');
    $telegram->sendMessage($content);
}