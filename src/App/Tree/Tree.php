<?php

declare(strict_types=1);

namespace App\Tree;

class Tree
{
    /**
     * @param ListDTO[] $list
     * @return TreeDTO[]
     */
    public function listToTree(array $list): array
    {
        $map = [];
        /* @var ListDTO[] $clone */
        $flatTree = [];

        /* @var TreeDTO[] $result */
        $result = [];

        foreach ($list as $key => $value) {
            $map[$value->id] = $key;
            $flatTree[] = new TreeDTO($value->id, $value->name, $value->parentId, []);
        }

        foreach ($flatTree as $value) {
            if ($value->parentId === null) {
                $result[] = $value;
            } else {
                $parentIdx = $map[$value->parentId];
                $parent = $flatTree[$parentIdx];
                $parent->children[] = $value;
            }
        }

        return $result;
    }

    /**
     * @param TreeDTO[] $tree
     * @return ListDTO[]
     */
    public function treeToList(array $tree): array
    {
        /* @var ListDTO[] $result */
        $result = [];

        /* @var TreeDTO[] $stack */
        $stack = [...$tree];

        while (count($stack) > 0) {
            $current = array_shift($stack);
            if ($current) {
                $result[] = new ListDTO($current->id, $current->name, $current->parentId);

                foreach ($current->children as $child) {
                    $stack[] = $child;
                }
            }
        }

        return $result;
    }

}
