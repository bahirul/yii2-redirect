<?php
namespace bahirul\yii2redirect;

use yii\web\Response;
use yii\web\Request;

class Redirect
{
	private $url;
	private $flash = [];

	public function to(array|string $url)
	{
		$this->url = $url

		return $this;
	}

	public function withFlash(string $name, string $message)
	{
		$this->flash['name'] = $name;
		$this->flash['message'] = $message;

		return $this;
	}

	public function prev()
	{
		$this->url = \Yii::$app->request->referrer;
		return $this;
	}

	public function send()
	{
		\Yii::$app->session->setFlash($this->flash['name'], $this->flash['message']);

		return (new Response())->redirect($this->url);
	}
}