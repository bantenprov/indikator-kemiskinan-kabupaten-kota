<?php

namespace Bantenprov\IKKabupatenKota\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The IKKabupatenKota facade.
 *
 * @package Bantenprov\IKKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IKKabupatenKotaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ik-kabupaten-kota';
    }
}
