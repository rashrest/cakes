<?php

function validFlavor($flavor)
{
    $validFlavors = getFlavors();
    foreach ($flavor as $userChoice)
    {
        if(!in_array($userChoice, $validFlavors)){
            return false;
        }
    }

}