<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622120958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA545317D1');
        $this->addSql('DROP INDEX IDX_1FCE69FA545317D1 ON vehicles');
        $this->addSql('ALTER TABLE vehicles CHANGE vehicle_id brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA44F5D008 FOREIGN KEY (brand_id) REFERENCES vehicle_brands (id)');
        $this->addSql('CREATE INDEX IDX_1FCE69FA44F5D008 ON vehicles (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA44F5D008');
        $this->addSql('DROP INDEX IDX_1FCE69FA44F5D008 ON vehicles');
        $this->addSql('ALTER TABLE vehicles CHANGE brand_id vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle_brands (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1FCE69FA545317D1 ON vehicles (vehicle_id)');
    }
}
