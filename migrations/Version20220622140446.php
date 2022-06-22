<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622140446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rented_vehicles ADD rental_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', ADD delivery_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE vehicles CHANGE is_avaliablity is_availability TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rented_vehicles DROP rental_date, DROP delivery_date');
        $this->addSql('ALTER TABLE vehicles CHANGE is_availability is_avaliablity TINYINT(1) NOT NULL');
    }
}
