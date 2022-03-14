<?php

/**
 * Validate Name
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
 * Validate Phone
 *
 * @param string $phone phone
 *
 * @return true
 */

function ($phone) {
    if (preg_match('(?:\+977[- ])?\d{2}-?\d{7,8}', $phone)) {
        return true;
    } else {
        return false;
    }
};
