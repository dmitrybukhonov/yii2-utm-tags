# Yii2 tracking utm metrics #

## Installation ##

Either run

    php composer.phar require --prefer-dist dmitrybukhonov/yii2-utm-tags "*"
or

    composer require --prefer-dist dmitrybukhonov/yii2-utm-tags "*" 

or add to the `require` section of your composer.json. 

    "dmitrybukhonov/yii2-utm-tags": "*"

### Usage as controller behavior ###
You need to register the module in `frontend/config/main.php` :

    $config = [
        'on beforeAction' => function ($event) {
            $requestService = new \frontend\services\CityDetectionService();
            $requestService->handleBeforeActionEvent($event);
            $utmService = new UtmService();
            $utmService->setUtm();
        },
    ]

## Licence ##

MIT
