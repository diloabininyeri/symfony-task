<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623205352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA545317D1');
        $this->addSql('DROP TABLE vehicle_values');
        $this->addSql('DROP INDEX IDX_1FCE69FA545317D1 ON vehicles');
        $this->addSql('ALTER TABLE vehicles DROP vehicle_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle_values (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE vehicles ADD vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle_values (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1FCE69FA545317D1 ON vehicles (vehicle_id)');
    }
}
