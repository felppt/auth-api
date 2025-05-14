<?php

if (! function_exists('alert')) {
    function alert(string $message = '')
    {
        session(['alert' => $message]);
    }
}


if (! function_exists('validate')) {
    function validate(array $data, array $rules)
    {
        return validator($data, $rules)->validate();
    }
}
