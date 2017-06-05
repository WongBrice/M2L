<?php

namespace M2L\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/*
 * Ceci est la classe qui permet au Bundle M2LUserBundle de fonctionner.
 */
class M2LUserBundle extends Bundle 
{
    /*
     * Cette fonction surchage la fonction provenant du Bundle FosUserBundle.
     */
    public function getParent() 
    {
        return 'FOSUserBundle';
    }

}
