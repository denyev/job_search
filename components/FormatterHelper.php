<?php

namespace app\components;

use yii\i18n\Formatter;

class FormatterHelper extends Formatter {

    private $countryCodeRu = '+7';
    /* https://regex101.com/r/FCeSwg/1/ */
    private $phoneRegexp = '/^(\d{3})(\d{3})(\d{2})(\d{2})$/';

    /**
     * @param integer $phone
     * @return string|string[]|null
     */
    public function asPhone($phone) {
        return preg_replace($this->phoneRegexp,
            "$this->countryCodeRu&nbsp;($1)&nbsp;$2-$3-$4", $phone);
    }

}
