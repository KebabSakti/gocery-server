<?php

use Kreait\Firebase\Factory;

if (!function_exists('firebaseFactory')) {
    function firebaseFactory()
    {
        $factory = (new Factory())->withServiceAccount(base_path().'/ayo-belanja-7bc1e-firebase-adminsdk-pxpmr-22cb053bd7.json');

        return $factory;
    }
}
