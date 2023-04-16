<?php

namespace App\Factory;

use App\Entity\Plant;
use App\Repository\PlantRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Plant>
 *
 * @method        Plant|Proxy create(array|callable $attributes = [])
 * @method static Plant|Proxy createOne(array $attributes = [])
 * @method static Plant|Proxy find(object|array|mixed $criteria)
 * @method static Plant|Proxy findOrCreate(array $attributes)
 * @method static Plant|Proxy first(string $sortedField = 'id')
 * @method static Plant|Proxy last(string $sortedField = 'id')
 * @method static Plant|Proxy random(array $attributes = [])
 * @method static Plant|Proxy randomOrCreate(array $attributes = [])
 * @method static PlantRepository|RepositoryProxy repository()
 * @method static Plant[]|Proxy[] all()
 * @method static Plant[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Plant[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Plant[]|Proxy[] findBy(array $attributes)
 * @method static Plant[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Plant[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class PlantFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function getDefaults(): array
    {
        return [
            'family' => self::faker()->text(128),
            'image_url' => self::faker()->text(255),
            'scientific_name' => self::faker()->text(128),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Plant $plant): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Plant::class;
    }
}
