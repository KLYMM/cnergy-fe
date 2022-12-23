<?php

namespace App\Services;

class Template
{
    public function __construct()
    {
        session()->put('last_text_template_key', 0);
        session()->put('last_image_template_key', 0);
    }
    public function getTemplate(string $type)
    {
        $template = config('trstdly.templates');

        switch ($type) {
            case 'img':
                $img_template = $template['image'];

                // if((session('last_image_template_key') + 1) >= count($img_template)) session()->put('last_image_template_key', 0);

                $template_output = $img_template[session('last_image_template_key')];

                session()->increment('last_image_template_key');

                if ((session('last_image_template_key') + 1) > count($img_template)) {
                    session()->put('last_image_template_key', 0);
                }

                return $template_output;

                break;

            case 'text':
                $text_template = $template['text'];

                // if((session('last_text_template_key') + 1) >= count($text_template)) {
                //     session()->put('last_text_template_key', 0);
                // }

                $template_output = $text_template[session('last_text_template_key')];

                session()->increment('last_text_template_key');

                if ((session('last_text_template_key') + 1) > count($text_template)) {
                    session()->put('last_text_template_key', 0);
                }

                return $template_output;

                break;


            case 'text-heading':
                $text_template = $template['text-heading'];

                // if((session('last_text_template_key') + 1) >= count($text_template)) {
                //     session()->put('last_text_template_key', 0);
                // }

                $template_output = $text_template[0];

                // session()->increment('last_text_template_key');

                // if ((session('last_text_template_key') + 1) > count($text_template)) {
                //     session()->put('last_text_template_key', 0);
                // }

                return $template_output;

                break;


            default:
        }
    }

}
