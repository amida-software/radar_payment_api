<?php

namespace Amida\Radar\Request;

use MyCLabs\Enum\Enum;

class Feature extends Enum
{
    private const AUTO_PAYMENT = 'AUTO_PAYMENT';
    private const VERIFY = 'VERIFY';
    private const FORCE_TDS = 'FORCE_TDS';
    private const FORCE_SSL = 'FORCE_SSL';
    private const FORCE_FULL_TDS = 'FORCE_FULL_TDS';
}