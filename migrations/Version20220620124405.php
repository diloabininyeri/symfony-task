<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620124405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES colors (id)');
        $this->addSql('CREATE INDEX IDX_1FCE69FA7ADA1FB5 ON vehicles (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA7ADA1FB5');
        $this->addSql('DROP INDEX IDX_1FCE69FA7ADA1FB5 ON vehicles');
        $this->addSql('ALTER TABLE vehicles DROP color_id');
    }
}
