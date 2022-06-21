<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621102425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BF16F10C70');
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BF67B3B43D');
        $this->addSql('DROP INDEX IDX_8CA643BF16F10C70 ON rented_vehicles');
        $this->addSql('DROP INDEX IDX_8CA643BF67B3B43D ON rented_vehicles');
        $this->addSql('ALTER TABLE rented_vehicles DROP users_id, DROP vehicles_id');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BF545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicles (id)');
        $this->addSql('CREATE INDEX IDX_8CA643BFA76ED395 ON rented_vehicles (user_id)');
        $this->addSql('CREATE INDEX IDX_8CA643BF545317D1 ON rented_vehicles (vehicle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BFA76ED395');
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BF545317D1');
        $this->addSql('DROP INDEX IDX_8CA643BFA76ED395 ON rented_vehicles');
        $this->addSql('DROP INDEX IDX_8CA643BF545317D1 ON rented_vehicles');
        $this->addSql('ALTER TABLE rented_vehicles ADD users_id INT DEFAULT NULL, ADD vehicles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BF16F10C70 FOREIGN KEY (vehicles_id) REFERENCES vehicles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BF67B3B43D FOREIGN KEY (users_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8CA643BF16F10C70 ON rented_vehicles (vehicles_id)');
        $this->addSql('CREATE INDEX IDX_8CA643BF67B3B43D ON rented_vehicles (users_id)');
    }
}
