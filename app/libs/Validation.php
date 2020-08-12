<?php

namespace libs;

class Validation
{
    private const TOKEN = 'token';

    private $errors = [];
    private $permitted = false;

    public function checkInput()
    {
        if (isset($_POST['submit_btn'])) {
            foreach ($_POST as $item => $value) {
                if (empty(trim($value))) {
                    $this->errors[] = 'You need to fill ' . $item;
                }
            }
        }

        if ( ! $this->errors) {
            $this->permitted = true;
        }

        return $this;
    }

    public function escapeInput($data = [])
    {
        $results = [];
        foreach ($data as $item => $value) {
            $results[$item] = htmlentities(trim($value), ENT_QUOTES, 'UTF-8');
        }

        return $results;
    }

    public function isInputValid()
    {
        return $this->permitted;
    }

    public function isTokenValid()
    {
        if (
            Session::sessionExists(self::TOKEN)
            && Session::getSession(self::TOKEN) == $this->getInputValue(self::TOKEN)
        ) {
            Session::deleteSession(self::TOKEN);

            return true;
        }

        return false;
    }

    public static function getInputValue($value)
    {
        if (isset($_POST[$value])) {
            return $_POST[$value];
        }

        return '';
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
