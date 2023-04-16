<?php

namespace App\Controller\Admin;

use App\Entity\Species;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpeciesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Species::class;
    }
}
