<?php

declare(strict_types=1);

namespace Tests\App;

use App\Tree;
use PHPUnit\Framework\TestCase;

const CATEGORIES_LIST = [
    ['id' => 4, 'name' => 'Sub Category 1 of Category 1', 'parentId' => 1, 'categories' => []],
    ['id' => 5, 'name' => 'Sub Category 2 of Category 1', 'parentId' => 1, 'categories' => []],
    ['id' => 6, 'name' => 'Sub Category 3 of Category 1', 'parentId' => 1, 'categories' => []],
    ['id' => 7, 'name' => 'Sub Category 1 of Sub Category 1 of Category 1', 'parentId' => 4, 'categories' => []],
    ['id' => 8, 'name' => 'Sub Category 2 of Sub Category 1 of Category 1', 'parentId' => 4, 'categories' => []],
    ['id' => 3, 'name' => 'Category 3', 'parentId' => null, 'categories' => []],
    ['id' => 2, 'name' => 'Category 2', 'parentId' => null, 'categories' => []],
    ['id' => 1, 'name' => 'Category 1', 'parentId' => null, 'categories' => []],
];

const CATEGORIES_TREE = [
    [
        "id"         => 3,
        "name"       => "Category 3",
        "parentId"   => null,
        "categories" => [],
    ],
    [
        "id"         => 2,
        "name"       => "Category 2",
        "parentId"   => null,
        "categories" => [],
    ],
    [
        "id"         => 1,
        "name"       => "Category 1",
        "parentId"   => null,
        "categories" => [
            [
                "id"         => 4,
                "name"       => "Sub Category 1 of Category 1",
                "parentId"   => 1,
                "categories" => [
                    [
                        "id"         => 7,
                        "name"       => "Sub Category 1 of Sub Category 1 of Category 1",
                        "parentId"   => 4,
                        "categories" => [],
                    ],
                    [
                        "id"         => 8,
                        "name"       => "Sub Category 2 of Sub Category 1 of Category 1",
                        "parentId"   => 4,
                        "categories" => [],
                    ],
                ],
            ],
            [
                "id"         => 5,
                "name"       => "Sub Category 2 of Category 1",
                "parentId"   => 1,
                "categories" => [],
            ],
            [
                "id"         => 6,
                "name"       => "Sub Category 3 of Category 1",
                "parentId"   => 1,
                "categories" => [],
            ],
        ],
    ],
];


class TreeTest extends TestCase
{

    public function testListToTree()
    {
        $tree = new Tree();
        self::assertEquals(CATEGORIES_TREE, $tree->listToTree(CATEGORIES_LIST));
    }
}
