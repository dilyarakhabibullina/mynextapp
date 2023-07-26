<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function getNews($id = null){
        if ($id !== null)
        {
            return $this->getNews()[$id-1]; 
            
        }
        
        else  return $news = [
              [
                   'id' => 1,
                   'category_id' => 2,
                    'title' => 'Новость первая',
                    'text' => 'Самая первая новость- об отсутствии новостей'
                    ,
                    'author' => 'Неизвестный автор',
                    'isPrivate'=>false],
             ['id' => 2,
             'category_id' => 5,
            'title' => 'Новость вторая',
            'text' => 'Вторая новость- об отсутствии новостей',
            'author' => 'Неизвестный автор',
        'isPrivate'=>true],
            ['id' => 3,
            'title' => 'Новость третья',
            'category_id' => 5,
            'text' => 'Третья новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>false],
            ['id' => 4,
            'title' => 'Новость четвертая',
            'category_id' => 5,
            'text' => 'четвертая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>true],
            ['id' => 5,
            'title' => 'Новость пятая',
            'category_id' => 4,
            'text' => 'Пятая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>false],
            ['id' => 6,
            'title' => 'Новость шестая',
            'category_id' => 5,
            'text' => 'Шестая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>'true'],
            ['id' => 7,
            'title' => 'Новость седьмая',
            'category_id' => 4,
            'text' => 'Седьмая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>false],
            ['id' => 8,
            'title' => 'Новость восьмая',
            'category_id' => 2,
            'text' => 'Восьмая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>true],
            ['id' => 9,
            'title' => 'Новость девятая',
            'category_id' => 2,
            'text' => 'Девятая новость- и опять об отсутствии новостей',
            'author' => 'Неизвестный автор',
            'isPrivate'=>false]
              ];}



            public function getCategories() {
                // if($category_id !== 0) {
                    
                // }
                return $categories = [
                ['id'=>1,
                'category_name'=>'Спорт'],
                ['id'=>2,
                'category_name'=>'Политика'],
                ['id'=>3,
                'category_name'=>'Экономика'],
                ['id'=>4,
                'category_name'=>'Светская жизнь'],
                ['id'=>5,
                'category_name'=>'Мода']
                ];

            } 

            public function getNewsByCategory($cid){
                $newsList = [];
                foreach ($this->getNews() as $new) {
                    
                    if($new['category_id'] == $cid) {
                        $newsList[] =$new;
                    }
                }
               
                return $newsList;
            }
//В двух методах ниже я пытаюсь получить имя категории по ее номеру, для того, чтобы 
//вывести название категории во вьюхе newsindex. Но у меня так и не получилось
            public function getCategoriesNameById($cid) {
                if ($this->getCategories()['id'] == $this->getNews()['category_id'])
                return $this->getCategories()['category_name'];
            }
                        
            public function getCatNameByCatId($cid){
                foreach($this->getCategories() as $cats){
                    if($cats['id'] == $cid){

                    dump($cats['category_name']);
                    return $cats['category_name'];
                }
            }
                
            }

            
}



