<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();

file_put_contents('users/step.txt', '1');
$stepFile = file_get_contents('users/step.txt');
print $stepFile;

$orderTypes = [
    'Laccetti 15000$',
    'Matiz 4900$',
    'Spark 7300$',
    'Cobalt 8300$'
];

switch ($text){
    case "/start":
        showStart();
        break;
    case "🗣 Batafsil malumot":
        showAbout();
        break;
    case "👨‍💻 Buyurtma berish":
        showOrder();
        break;
    default:
        if (in_array($text, $orderTypes)){
                askContact();
        }
        break;
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