<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class CommonComponent extends Component
{
    public function getSettingByKey($key){

        $settingTable = TableRegistry::get('Settings');

        $settings = $settingTable->find()->where(['Settings.key_name'=>$key])->first();

        if(!empty($settings['value'])){
            return $settings['value'];
        } else {
            return false;
        }
    }

    public function limit_word($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    public function slug($text = null, $type='_'){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', $type, $text)));
    }
}