<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422185927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, scientific_name VARCHAR(128) NOT NULL, botanical_name VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genus (id INT AUTO_INCREMENT NOT NULL, scientific_name VARCHAR(64) NOT NULL, common_name VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, family_id INT NOT NULL, scientific_name VARCHAR(128) NOT NULL, common_name VARCHAR(128) DEFAULT NULL, genus VARCHAR(128) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, uses VARCHAR(255) DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, published TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_AB030D72C35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant2 (id INT AUTO_INCREMENT NOT NULL, family_id INT NOT NULL, scientific_name LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_A475AD10C35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, scientific_name VARCHAR(128) NOT NULL, common_name VARCHAR(128) DEFAULT NULL, taxonomy INT NOT NULL, morphology LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', distribution VARCHAR(255) DEFAULT NULL, ecology VARCHAR(255) DEFAULT NULL, cultivation VARCHAR(255) DEFAULT NULL, conservation_status INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(64) NOT NULL, last_name VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE plant2 ADD CONSTRAINT FK_A475AD10C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72C35E566A');
        $this->addSql('ALTER TABLE plant2 DROP FOREIGN KEY FK_A475AD10C35E566A');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE genus');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE plant2');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE user');
    }
}
