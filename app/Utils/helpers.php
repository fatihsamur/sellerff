<?php

namespace App\Utils;

class Helpers
{
    public static function generateAffCode()
    {
        return 'SELLERFF'.str_random(10);
    }
}
