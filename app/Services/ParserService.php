<?php

namespace App\Services;
use App\Services\Contracts\Parser;

class ParserService implements Parser  
{

    private string $link;
    public function setLink(string $link){
        $this->link = $link;
    return $this;

    }

    public function saveParseData()
    {
        $parser = XmlParserData::load($this->link);

        $data = $parser->parse(
      [
      'title' => [
          'uses' => 'channel.title',
      ],
      'text' => [
          'uses' => 'channel.description',
      ],
      'author' => [
          'uses' => 'channel.author',
      ],
      'news' => [
          'uses' => 'channel.item[title,description,author]'
      ]
      ]);
      dd($data); 
    }
}