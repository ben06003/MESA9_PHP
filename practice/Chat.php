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

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
        $numRecv = count($this->users);
        $msg = '<br>'.'在線人數'.':'.$numRecv;
        var_dump($numRecv);
        $online = 'online';
        $conn->send(json_encode(array("type" => $online, "msg" => $msg)));
        foreach($this->clients as $client)
        {
            if($conn!=$client)
            {
                $client->send(json_encode(array("type"=>$online,"msg"=>$msg)));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        $numRecv = count($this->users);
        $msg = '<br>'.'在線人數'.':'.$numRecv;
        var_dump($numRecv);
        $online = 'online';
        $conn->send(json_encode(array("type" => $online, "msg" => $msg)));
        foreach($this->clients as $client)
        {
            if($conn!=$client)
            {
                $client->send(json_encode(array("type"=>$online,"msg"=>$msg)));
            }
        }
    }

    public function onMessage(ConnectionInterface $from,  $data) {
        $numRecv = count($this->users);
        var_dump($numRecv);
        $from_id = $from->resourceId;
        $data = json_decode($data);
        $type = $data->type;
        $img = $data->img;
        switch ($type) {
            case 'socket':
                $user_id = $data->user_id;
                $src = 'data: '.'image/jpeg'.';base64,'.$img;
                $welcome = '<img src="'.$src.'">'.$user_id.'上線'.'<br>';
                $from->send(json_encode(array("type"=>$type,"msg"=>$welcome)));
                foreach($this->clients as $client)
                {
                    if($from!=$client)
                    {
                        $client->send(json_encode(array("type"=>$type,"msg"=>$welcome)));
                    }
                }
                break;

            case 'chat':
                $user_id = $data->user_id;
                $chat_msg = $data->chat_msg;
                $src = 'data: '.'image/jpeg'.';base64,'.$img;
                $response_from = '<img src="'.$src.'">'.
                    "<span style='color:lightgray'><b>".
                    $user_id.":</b> ".$chat_msg."</span><br>";

                $response_to = '<img src="'.$src.'">'.
                    "<b>".$user_id."</b>: ".$chat_msg."<br>";

                $from->send(json_encode(array("type"=>$type,"msg"=>$response_from)));
                foreach($this->clients as $client)
                {
                    if($from!=$client)
                    {
                        $client->send(json_encode(array("type"=>$type,"msg"=>$response_to)));
                    }
                }
                break;
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}