<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParserData;

class ParserController extends Controller
{
public function __invoke(Request $request, Parser $parser)
{
  $url ="https://news.rambler.ru/rss/tech/";
  $parser->setLink($url)->saveParseData();


}
}
