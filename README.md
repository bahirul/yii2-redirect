# Yii2 Redirect

Simple yii2 redirect component.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require bahirul/yii2-redirect
```

or add

```
"bahirul/yii2-redirect": "^0.0.1"
```

to the `require` section of your `composer.json` file.

## Configuring

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'redirect' => [
            'class' => 'bahirul\yii2\Redirect',
        ],
    ],
];
```

## Usage

### Redirect to URL

```php
Yii::$app->redirect->to($url)->go(); //redirect only
```

### Redirect with flash message

```php
Yii::$app->redirect->to($url)->withFlash($flash_name, $flash_message)->go(); //redirect with flash message
```

### Redirect to previous page

```php
Yii::$app->redirect->prev()->go(); //redirect to previous page or home page (if previous page is null)
```

### Redirect to Login page

```php
Yii::$app->redirect->login()->go(); //redirect to login page
```