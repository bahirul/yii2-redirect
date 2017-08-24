<?php
namespace bahirul\yii2redirect;

use yii\web\Response;
use yii\web\Request;

class Redirect
{
    private $url;
    private $flash = [];

    /**
     * [to description]
     *
     * @param [type] $url [description]
     *
     * @return [type] [description]
     */
    public function to($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * [withFlash description]
     *
     * @param [type] $name    [description]
     * @param [type] $message [description]
     *
     * @return [type] [description]
     */
    public function withFlash($name, $message)
    {
        $this->flash['name'] = $name;
        $this->flash['message'] = $message;

        return $this;
    }

    /**
     * [prev description]
     *
     * @return [type] [description]
     */
    public function prev()
    {
        $referrer = \Yii::$app->request->referrer;
        $this->url = $referrer;
        
        if (!$referrer) {
            $this->url = \Yii::$app->defaultRoute;
        }

        return $this;
    }

    /**
     * [login description]
     *
     * @return [type] [description]
     */
    public function login()
    {
        $this->url = \Yii::$app->user->loginUrl != null ? \Yii::$app->user->loginUrl :  '';

        return $this;
    }

    /**
     * [send description]
     *
     * @return [type] [description]
     */
    public function send()
    {
        if (isset($this->flash['name']) && isset($this->flash['message'])) {
            \Yii::$app->session->setFlash($this->flash['name'], $this->flash['message']);
        }

        return (new Response())->redirect($this->url);
    }
}
