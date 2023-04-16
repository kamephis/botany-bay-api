<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use App\Entity\Plant;

class PlantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image_url')
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                ->setLabel('Image'),
            TextField::new('scientific_name'),
            TextField::new('common_name'),
            TextField::new('family'),
            TextField::new('genus'),
            TextareaField::new('description')
            ->stripTags(),
            TextareaField::new('uses')
            ->stripTags(),
            BooleanField::new('published')
        ];
    }

    /**
     * @param Crud $crud
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['scientific_name' => 'ASC'])
            ->setPaginatorPageSize(15);
    }
}
