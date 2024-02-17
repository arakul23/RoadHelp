<?php

namespace App\Http\Controllers;

class PublicOfferController extends Controller
{
    public function showPublicOffer()
    {
        $file = 'edac_public_offer_enjoy_2022.pdf';
        $filename = 'edac_public_offer_enjoy_2022.pdf';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');

        readfile($file);
    }
}
