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
    if (preg_match("/^[a-zA-Z'. -]+$/", $name)) {
        return true;
    }
    return false;
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
    if (preg_match('(?:\+977[- ])?\d{2}-?\d{7,8}', $phone)) {
        return true;
    } else {
        return false;
    }
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
 * Validate expiry date of card
 *
 * @param string $value date
 *
 * @return true
 */
