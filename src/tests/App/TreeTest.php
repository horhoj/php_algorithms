<?php

declare(strict_types=1);

namespace Tests\App;

use App\Tree\ListDTO;
use App\Tree\Tree;
use App\Tree\TreeDTO;
use PHPUnit\Framework\TestCase;

const CATEGORIES_LIST = [
    new ListDTO(4, 'Sub Category 1 of Category 1', 1),
    new ListDTO(5, 'Sub Category 2 of Category 1', 1),
    new ListDTO(6, 'Sub Category 3 of Category 1', 1),
    new ListDTO(7, 'Sub Category 1 of Sub Category 1 of Category 1', 4),
    new ListDTO(8, 'Sub Category 2 of Sub Category 1 of Category 1', 4),
    new ListDTO(3, 'Category 3', null),
    new ListDTO(2, 'Category 2', null),
    new ListDTO(1, 'Category 1', null),
];


const CATEGORIES_TREE = [
    new TreeDTO(3, 'Category 3', null, []),
    new TreeDTO(2, 'Category 2', null, []),
    new TreeDTO(1, 'Category 1', null, [
        new TreeDTO(4, 'Sub Category 1 of Category 1', 1, [
            new TreeDTO(7, 'Sub Category 1 of Sub Category 1 of Category 1', 4, []),
            new TreeDTO(8, 'Sub Category 2 of Sub Category 1 of Category 1', 4, []),
        ]),
        new TreeDTO(5, 'Sub Category 2 of Category 1', 1, []),
        new TreeDTO(6, 'Sub Category 3 of Category 1', 1, []),
    ]),
];

final class TreeTest extends TestCase
{

    public function testListToTree()
    {
        $tree = new Tree();
        self::assertEquals(CATEGORIES_TREE, $tree->listToTree(CATEGORIES_LIST));
    }
}
