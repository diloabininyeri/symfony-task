<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624154424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicle_controller');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BF61C9F55E237E06 ON vehicle_categories (name)');
        $this->addSql('ALTER TABLE vehicles CHANGE model_year model_year VARCHAR(4) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle_controller (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP INDEX UNIQ_BF61C9F55E237E06 ON vehicle_categories');
        $this->addSql('ALTER TABLE vehicles CHANGE model_year model_year VARCHAR(4) DEFAULT NULL');
    }
}
