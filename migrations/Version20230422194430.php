<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422194430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant2 DROP FOREIGN KEY FK_A475AD10C35E566A');
        $this->addSql('DROP TABLE plant2');
        $this->addSql('ALTER TABLE plant ADD genus_id INT NOT NULL, DROP genus');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D7285C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AB030D7285C4074C ON plant (genus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plant2 (id INT AUTO_INCREMENT NOT NULL, family_id INT NOT NULL, scientific_name LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_A475AD10C35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE plant2 ADD CONSTRAINT FK_A475AD10C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D7285C4074C');
        $this->addSql('DROP INDEX UNIQ_AB030D7285C4074C ON plant');
        $this->addSql('ALTER TABLE plant ADD genus VARCHAR(128) DEFAULT NULL, DROP genus_id');
    }
}
