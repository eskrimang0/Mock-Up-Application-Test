<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ModelHelper extends Model
{
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $models = [];
        $formName = (new $modelClass())->formName();
        $post = Yii::$app->request->post($formName);
        $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));

        if ($post && is_array($post)) {
            foreach ($post as $index => $data) {
                if (isset($keys[$index]) && isset($multipleModels[$keys[$index]])) {
                    $models[] = $multipleModels[$keys[$index]];
                } else {
                    $models[] = new $modelClass();
                }
            }
        }

        return $models;
    }
}
