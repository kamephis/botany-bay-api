<?php

namespace App\Controller\Admin;

use App\Entity\TaxonomyLevels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TaxonomyLevelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TaxonomyLevels::class;
    }
}
