<?php
namespace controller;

/**
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';
use models\ModelUser;

Class SiteController {
    public $name;
    public $email;
    public $description;
    public $response;
    public $post;

    /**
     *
     */
    public function __construct()
    {
        $this->post = json_decode(file_get_contents('php://input'));
        $this->name = $this->post->name;
        $this->email = $this->post->email;
        $this->description = $this->post->description;
        $this->response = $this->post->response;
    }



    public $secret = '6LfD4zgUAAAAADwwEz9q-o5L-iNeAOyq6ydYMKoJ';

    public function Contact(){
        if (isset($this->response)){
            $recaptcha = new \ReCaptcha\ReCaptcha($this->secret);
            $resp = $recaptcha->verify($this->response, $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                    echo "okay";
                    $model = new ModelUser();
                    $model->insertIntoDB($this->name, $this->email, $this->description);
                }
            } else {
                echo "Нажміть кнопку, я не робот";
            }
        }
}

$comment = new SiteController();
$comment->Contact();

?>