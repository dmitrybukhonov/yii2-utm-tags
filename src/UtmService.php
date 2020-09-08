<?php

namespace dmitrybukhonov\service;

use Yii;

class UtmService
{
    private static $utm_tags = [
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content'
    ];

    /**
     * Запись меток в сессию.
     */
    public function setUtm(): void
    {
        foreach (self::$utm_tags as $utm_tag) {
            if ($value = Yii::$app->request->get($utm_tag)) {
                Yii::$app->session->set($utm_tag, $value);
            }
        }
    }

    /**
     * Проверяем есть ли хотя бы одна метка в сессии.
     * @return bool
     */
    public function checkUtmTags(): bool
    {
        foreach (self::$utm_tags as $utm_tag) {
            if (isset(Yii::$app->session[$utm_tag])) {
                return true;
            }
        }

        return false;
    }
}