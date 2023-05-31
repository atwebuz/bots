<?php 

include 'Telegram.php';

$telegram = new Telegram('6077714195:AAG6CEXyLZjuBU08G2H5-GNr_-AE7KjVhDM');
// $fileFath = 'users/stap.txt';


$data = $telegram->getData();
$message = $data['message'];
$telegram->sendMessage([
    'chat_id' => $telegram->ChatID(),
    'text' => json_encode($data, JSON_PRETTY_PRINT)
]);

$text = $data['message']['text'];
$chat_id = $message['chat']['id'];

// $chat_id = $telegram->ChatID();
// $text = $telegram->Text();


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
    case "Orqaga":
        switch(file_get_contents('users/stap.txt')){
            case 'start':
             break;
            case 'order':
                showStart();
            break;
            default;
        }
        break;    
    default:
        if (in_array($text, $orderTypes)){
            file_put_contents('users/mass.txt', $text);
                askContact();
        }else{
            switch(file_get_contents('users/step.txt')){
                case 'phone':
                if($message['contact']['phone_number'] != ""){
                    file_put_contents('users/phone.txt', $message['contact']['phone_number']);
                }
                else{
                    file_put_contents('users/phone.txt', $text);
                }
                showDeliveryType();
                    break;
            }
            
        }
        break;
}


function showStart(){
    global $telegram, $chat_id;

    file_put_contents('users/stap.txt', 'start');
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

    file_put_contents('users/phone.txt', 'order');
    $option = array(
        //First row
        array($telegram->buildKeyboardButton("Laccetti 15000$")),
        //Second row 
        array($telegram->buildKeyboardButton("Matiz 4900$")), 
        //Third row
        array($telegram->buildKeyboardButton("Spark 7300$")),
        //Fourth row 
        array($telegram->buildKeyboardButton("Cobalt 8300$")).
        // back
        array($telegram->buildKeyboardButton("Orqaga"))
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Buyurtma berish uchun avtomabil turini tanlang !!!');
    $telegram->sendMessage($content);
}

function askContact() {
    global $telegram, $chat_id, $message;

    

    file_put_contents('users/step.txt', 'phone');

    $option = array(
        array($telegram->buildKeyboardButton("☎️ Kontakt yuborish", $request_contact = true)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true,$resize=true);
   
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' =>  'Siz ushbu mashinani tanladingiz!!!');
    $telegram->sendMessage($content);
}

function showDeliveryType(){
    
}

