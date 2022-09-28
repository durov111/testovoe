<?php

// Задание 4

interface InterfaceOne
{

}

class ParentClass implements InterfaceOne
{

    private static $instance;

    static public function getInstance()
    {
        return (static::$instance == new static()) ? (static::$instance) : (static::$instance = new static());
    }
}


//задание 5
// я не понял что именно тербуется от этой функиции без входных данных
global $items;
$items = ['site1.ru', 'site2.ru'];
var_export(test($items));
function test($items) {
    $sites = [];
    $result = [];
    foreach($items as $item) {
        preg_match('/(site1\.ru)/', $item->site, $matches);
        if ($matches) {
            $sites[$item] = 'site1.ru';
        } else {
            $sites[$item] = 'site2.ru';
        }
        if($result < count($sites)) {
            $result[count($result)] = count($sites);
        }
    }
    testTwo($result);
    return $sites;
}
function testTwo($arr) {
    $newArr = [];
    foreach($arr as $itemRes) {
        if($itemRes > 0) $newArr = $itemRes;
    }
}




// Задание 6
// тут так-же как и с заданием 5
global $item;
var_dump( getMinPrice($item));

function formatPrice($price) {
    return preg_replace('/\B(?=(\d{3})+(?!\d))/', ',',$price);
}

function getMinPrice($item) {
    return formatPrice(
        usort($item->prices, function($a, $b) {
            return $a->price - $b->price;
		})[0]->price
    );
}



//Задание 7


$items = [
    0 => (object)[
        'title' => "test",
        'price' => 10,
        'size' => 10
    ],
    1 => (object)[
        'title' => "test",
        'price' => 10,
        'size' => 10
    ],
    2 => (object)[
        'title' => "test",
        'price' => 20,
        'size' => 10
    ],
    3 => (object)[
        'title' => "test",
        'prices' => (array)[
            1 => (object)[
                'price' => 5,
                'size' => 10
            ],
            2 => (object)[
                'price' => 2,
                'size' => 10
            ],
            3 => (object)[
                'price' => 8,
                'size' => 10
            ],

        ],
    ],
    4 => (object)[
        'title' => "test",
        'prices' => (array)[
            1 => (object)[
                'price' => 5,
                'size' => 10
            ],
            2 => (object)[
                'price' => 2,
                'size' => 10
            ],
            3 => (object)[
                'price' => 8,
                'size' => 10
            ],

        ]
    ]

];

sortProductsByPrice(18, 1, $items);

// функция проверяет на порог min и max price
function checkPrice($maxPrice, $minPrice, $item)
{
    if (is_array($item)) {
        foreach ($item->price as $value) {
            if ($value->price > $maxPrice or $value->price < $minPrice) {
                return false;
            }
        }
        return $item;
    } else {
        return ($item->price > $maxPrice or $item->price < $minPrice) ? false : $item;
    }
}

// функия создаёт новый массив где ключ это price товара
function sortProductsByPrice($maxPrice, $minPrice, $items)
{
    $result = [];

    foreach ($items as $item) {
        if (is_array($item->prices)) {
            $item_checked = checkPrice($maxPrice, $minPrice, $item->prices);
            if ($item_checked != false) {
                if (isset($result[$item_checked[1]->price]))
                    array_push($result[$item_checked[1]->price], $item);
                elseif(!is_array($result[$item_checked[1]->price])){
                    $result[$item_checked[1]->price] = [$result[$item_checked[1]->price], $item];
                }
                else{
                    $result[$item_checked[1]->price] = $item;
                }
            }
        } else {
            $item_checked = checkPrice($maxPrice, $minPrice, $item);
            if ($item_checked != false) {
                if (isset($result[$item->price]))
                    array_push($result[$item->price], $item);
                elseif (!is_array( $result[$item->price])){
                    $result[$item->price] = [ $result[$item->price], $item];
                }
                else {
                    $result[$item->price] = $item;
                }
            }
        }

    }

    return $result;
}



// Задание 8

$query = '
SELECT users.Id, objects.name, users.email, users.password, status.status, objects.last_login, objects.create FORM users
INNER JOIN objects obj on obj.Id = users.object_id
INNER JOIN status on status.Id = obj.status_id
WHERE DATE(obj.last_login) > "2020-01-01" and DATE(obj.create) > "2020-01-01" 
';



// Задание 9

$query = '
UPDATE objects SET status_id = 1, last_login = "2022-08-25"
WHERE status_id = 0;
';