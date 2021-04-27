<?php declare(strict_types=1);


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;
use phpDocumentor\Reflection\Types\This;

class ParserService
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function parsing(): void
    {
        $xml = XmlParser::load($this->url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description, pubDate]'
            ],

        ]);
        $e = explode("/", $this->url);
        $fileName = end($e);
        Storage::append('parsing/' . $fileName . ".txt", json_encode($data));
    }
}
