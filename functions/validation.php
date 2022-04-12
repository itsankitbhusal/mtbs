<?php

/**
 * Validate Name accept character only
 *
 * @param string $name name
 *
 * @return true
 */
function validateName($name)
{
    return preg_match("/^[a-zA-Z]{3,}(?: [a-zA-Z]+){0,2}$/", $name);
};

/**
 * Validate Phone Number +977 and 97 && 98
 *
 * @param string $phone phone
 *
 * @return true
 */

function validatePhone($phone)
{
    return preg_match('/^\+?(?:977)?[ -]?(?:(?:(?:98|97)-?\d{8})|(?:01-?\d{7}))$/', $phone);
};

/**
 * Validate number
 *
 * @param string $value number
 *
 * @return true
 */

function validateNumber($value)
{
    return preg_match('/^([0-9]*)$/', $value);
}

/**
 * Validate Strong Password
 *
 * @param string $password string
 *
 * @return true
 */

function validatePassword($password)
{
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/', $password);
}

/**
 * Validate Movie genre 
 * matches only single word and -
 *
 * @param string $password string
 *
 * @return true
 */
function validateGenre($genre)
{
    return preg_match("/^[A-Za-z-]+$/", $genre);
}
