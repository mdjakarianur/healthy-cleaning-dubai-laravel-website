<?php

use Illuminate\Support\Str;

if (!function_exists('clean_html')) {
    function clean_html($html)
    {
        // Remove width styles (style="... width: 1180px; ...")
        $html = preg_replace('/style="[^"]*?width:[^;]+;?[^"]*?"/i', '', $html);

        // Optionally remove other inline styles you don't want
        // For example: remove margin-inline styles
        $html = preg_replace('/style="[^"]*?margin[^;]*;?[^"]*?"/i', '', $html);

        // Optionally remove empty style attributes
        $html = preg_replace('/style="\s*"/i', '', $html);

        // You could also remove unwanted classes like Elementor's default container widths
        $html = preg_replace('/class="[^"]*?elementor-[^"]*?"/i', '', $html);

        // Or remove inline font sizes if needed
        // $html = preg_replace('/style="[^"]*?font-size:[^;]+;?[^"]*?"/i', '', $html);

        // Optionally wrap images to be responsive
        $html = preg_replace_callback('/<img[^>]+>/i', function($matches) {
            $img = $matches[0];
            // Remove width/height attributes from images
            $img = preg_replace('/(width|height)="[^"]*"/i', '', $img);
            return $img;
        }, $html);

        return $html;
    }
}
