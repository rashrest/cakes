<?php

function validFlavor($flavor)
{
    $validFlavors = array_values(getFlavors());
    foreach ($flavor as $userChoice)
    {
        if(!in_array($userChoice, $validFlavors)){
            return false;
        }
    }
}

function validName($name): bool
{
    return strlen($name) > 3;
}
