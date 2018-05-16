<?php
require dirname(__DIR__) . '/practice/vendor/autoload.php';

//namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
class Chat implements MessageComponentInterface {
    protected $clients;
    protected $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);


    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        // unset($this->users[$conn->resourceId]);
    }

    public function onMessage(ConnectionInterface $from,  $data) {
        $from_id = $from->resourceId;
//        var_dump($from);
        $data = json_decode($data);
        $type = $data->type;
        $img = $data->img;
        switch ($type) {
            case 'socket':
                $user_id = $data->user_id;
                $welcome = '歡迎'.$user_id.'加入聊天室'.'<br>';
                $from->send(json_encode(array("type"=>$type,"msg"=>$welcome,"img"=>$img)));
                foreach($this->clients as $client)
                {
                    if($from!=$client)
                    {
                        $client->send(json_encode(array("type"=>$type,"msg"=>$welcome,"img"=>$img)));
                    }
                }
                break;

            case 'chat':
                $user_id = $data->user_id;
                $chat_msg = $data->chat_msg;
                $response_from = "<span style='color:lightgray'><b>".$user_id.":</b> ".$chat_msg."</span><br>";
                $response_to = "<b>".$user_id."</b>: ".$chat_msg."<br>";
                // Output
                $from->send(json_encode(array("type"=>$type,"msg"=>$response_from,"img"=>$img)));
                foreach($this->clients as $client)
                {
                    if($from!=$client)
                    {
                        $client->send(json_encode(array("type"=>$type,"msg"=>$response_to,"img"=>$img)));
                    }
                }
                break;
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}