<?php

function validateFormationData($titre, $prix, $date_debut, $date_fin, $capacite)
{
    if (!isset($titre) || !isset($prix) || !isset($date_debut) || !isset($date_fin) || !isset($capacite))
    {
        return "All fields are required";
    }

    if (strlen($titre) < 1 || strlen($titre) > 254)
    {
        return "Title must be between 2 and 254 characters";
    }

    if (!is_numeric($prix))
    {
        return "Prix must be a number";
    }

    if (!validateDate($date_debut, 'Y-m-d'))
    {
        return "Date_debut is not valid";
    }

    if (!validateDate($date_fin, 'Y-m-d'))
    {
        return "Date_fin is not valid";
    }

    if (!is_numeric($capacite))
    {
        return "Capacite must be a number";
    }

    return true; 
}

function validateDate($date, $format = 'Y-m-d') 
{ 
    $d = DateTime::createFromFormat($format, $date); 
    return $d && $d->format($format) === $date; 
}

?>
