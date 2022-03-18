<?php

declare(strict_types=1);

namespace App\Attribute;

use Attribute;
use Ray\Di\Di\Qualifier;

#[Attribute, Qualifier]
final class Loggable
{
}
