<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddMealPermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view allergens' => ['Owner', 'Executive', 'Staff'],
            'create allergens' => ['Owner', 'Executive'],
            'update allergens' => ['Owner', 'Executive'],
            'view ingredients' => ['Owner', 'Executive', 'Staff'],
            'create ingredients' => ['Owner', 'Executive'],
            'update ingredients' => ['Owner', 'Executive'],
            'view meals' => ['Owner', 'Executive', 'Staff'],
            'create meals' => ['Owner', 'Executive'],
            'update meals' => ['Owner', 'Executive'],
            'view menus' => ['Owner', 'Executive', 'Staff'],
            'create menus' => ['Owner', 'Executive'],
            'update menus' => ['Owner', 'Executive'],
            'view menu categories' => ['Owner', 'Executive', 'Staff'],
            'create menu categories' => ['Owner', 'Executive'],
            'update menu categories' => ['Owner', 'Executive'],
            'view menu changes' => ['Owner', 'Executive', 'Staff'],
            'create menu changes' => ['Owner', 'Executive'],
            'update menu changes' => ['Owner', 'Executive'],
        ];
        
        $this->createPermissions($permissions);
    }
}
