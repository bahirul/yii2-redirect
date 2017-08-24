Yii2 Redirect
=======

Simple yii2 redirect component.

Features
-------

- Simple redirect via component
- Redirect with flash
- Redirect to previous page

Instalation
-------

The prefered way to install this component is throught [composer](https://getcomposer.org/download)

    composer require bahirul/yii2-redirect
    

Usage
-------

Add to your web configuration, in components section :

    ....
    components => [
        'redirect' => 'bahirul\yii2redirect\Redirect'
    ]
    ....
    

Use in controller or where you want:

    Yii::$app->redirect->to($url)->send(); //redirect only
    
    Yii::$app->redirect->to($url)->withFlash($flash_name,$flash_message)->send(); //redirect with flash message

    Yii::$app->redirect->prev()->send(); //redirect to previous page or home page (if previous page is null)


License
--------

Read [LICENSE.md](LICENSE.md)
