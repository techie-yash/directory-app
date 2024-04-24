<?php

namespace App\Helpers;

use Share;
use App\Helpers\ImageHelper;
use Illuminate\Support\HtmlString;

class ShareHelper {
    public static function generateShareComponent($text = 'Default share text') {
        return Share::page(url()->current(), $text)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
    }

    public static function generateShareOptionsHtml($text = 'Default share text') {
        $shareComponent = self::generateShareComponent($text);

        $html = '<li>
            <a href="#" id="shareIcon">
                <img src="' . ImageHelper::imageUrl('red-share.svg') . '" alt="Share">
            </a>
            <ul id="shareOptions" class="share-options">';

        foreach ($shareComponent->getRawLinks() as $platform => $link) {
            $html .= '<li class="share-option">
                <a href="' . $link . '" target="_blank">
                    <i class="fab fa-' . strtolower($platform) . '"></i>
                </a>
            </li>';
        }

        $html .= '</ul>
        </li>';

        return ['html' => $html, 'shareComponent' => $shareComponent];
    }


    public static function generateWhatsAppShareComponent($text = 'Default share text')
    {
        $currentUrl = urlencode(url()->current());
        $whatsAppLink = "https://wa.me/?text=$text $currentUrl";
    
        return $whatsAppLink;
    }
    

    public static function generateWhatsAppShareHtml($text = 'Default share text') {
        $whatsAppLink = self::generateShareComponent($text)->whatsapp();
    
        $html = '<li class="share-option">
            <a href="' . $whatsAppLink . '" target="_blank" id="whatsappShareIcon">
                <i class="fab fa-whatsapp"></i>
            </a>
        </li>';
    
        return new HtmlString($html); // Ensure you're returning an HtmlString
    }

}