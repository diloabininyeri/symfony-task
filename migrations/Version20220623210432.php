<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623210432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle_value ADD feature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle_value ADD CONSTRAINT FK_7FD8D8D860E4B879 FOREIGN KEY (feature_id) REFERENCES vehicle_feature (id)');
        $this->addSql('CREATE INDEX IDX_7FD8D8D860E4B879 ON vehicle_value (feature_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle_value DROP FOREIGN KEY FK_7FD8D8D860E4B879');
        $this->addSql('DROP INDEX IDX_7FD8D8D860E4B879 ON vehicle_value');
        $this->addSql('ALTER TABLE vehicle_value DROP feature_id');
    }
}
