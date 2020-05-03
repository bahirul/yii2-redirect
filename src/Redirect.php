<?php
namespace bahirul\yii2;

use Yii;
use yii\helpers\Url;

class Redirect
{
    private $url;
    private $statusCode;
    private $flash = [];

    public function to($url, $statusCode = 302)
    {
        $this->url = $url;
        $this->statusCode = $statusCode;

        return $this;
    }

    public function withFlash($name, $message)
    {
        $this->flash['name'] = $name;
        $this->flash['message'] = $message;

        return $this;
    }

    public function prev()
    {
        $referrer = Yii::$app->request->referrer;

        $this->url = $referrer;
        
        if (!$referrer) {
            $this->url = Yii::$app->defaultRoute;
        }

        return $this;
    }

    public function go()
    {
        if (isset($this->flash['name']) && isset($this->flash['message'])) {
            \Yii::$app->session->setFlash($this->flash['name'], $this->flash['message']);
        }

        return Yii::$app->response->redirect(Url::to($this->url), $this->statusCode);

    }
}
