<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class MenuChange extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;

}
