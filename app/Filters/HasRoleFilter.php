<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class HasRoleFilter implements FilterInterface
{
    public function transform($item)
    {
        if ( isset($item['hasRole']) && (!auth()->check() || !auth()->user()->hasRole($item['hasRole'])) ) {
            $item['restricted'] = true;
        }

        return $item;
    }
}
