<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsChunkService
{
    public function __construct()
    {
        session()->put('last_text_template_key', 0);
        session()->put('last_image_template_key', 0);
    }

    public function retrieve_news(array $row): array | bool
    {
        $data = $this->parseNews($row);

        $newsResponse = Http::asForm()->post(config('trstdly.chunkCloudUrl'), [
            'content' => $data
        ]);

        if ($newsResponse->ok()) {
            return $this->parseResponse($newsResponse->json()['data']);
        }

        return false;
    }

    private function parseNews(array $row): string
    {
        $news = '';

        $news = $row['news_content'];

        if (isset($row['news_paging']) && count($row['news_paging']) > 0) {
            foreach ($row['news_paging'] as $np) {
                $news = $news . html_entity_decode($np['content']);
            }
        }

        return $news;
    }

    private function parseResponse(array $response): array
    {
        $data = [];

        foreach ($response as $key => $rp) {
            $data[$key] = $rp;
            $data[$key]['template']['name'] = $this->templateSelector($rp['type']);
        }

        return $data;
    }

    public function templateSelector(string $type): string
    {
        $template = config('trstdly.templates');

        switch ($type) {
            case 'img':
                $img_template = $template['image'];

                $template_output = $img_template[session('last_image_template_key')];

                session()->increment('last_image_template_key');

                if ((session('last_image_template_key') + 1) > count($img_template)) {
                    session()->put('last_image_template_key', 0);
                }

                return $template_output;

                break;

            case 'text':
                $text_template = $template['text'];

                if ((session('last_text_template_key') + 1) > count($text_template)) {
                    session()->put('last_text_template_key', 0);
                }

                $template_output = $text_template[session('last_text_template_key')];

                session()->increment('last_text_template_key');

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
            case 'title-img':
                $text_template = $template['title-img'];

                $template_output = $text_template[0];

                return $template_output;

                break;
            case 'list':
                $text_template = $template['list'];

                $template_output = $text_template[0];

                return $template_output;

                break;


            default:
                return $type;

                break;
        }
    }
}
