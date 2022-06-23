<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623205907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rented_vehicles (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, vehicle_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', rental_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', delivery_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_8CA643BFA76ED395 (user_id), INDEX IDX_8CA643BF545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_brands (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_feature (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A4280912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_value (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_7FD8D8D8545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, color_id INT DEFAULT NULL, category_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image VARCHAR(255) NOT NULL, is_availability TINYINT(1) NOT NULL, INDEX IDX_1FCE69FA7ADA1FB5 (color_id), INDEX IDX_1FCE69FA12469DE2 (category_id), INDEX IDX_1FCE69FA44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rented_vehicles ADD CONSTRAINT FK_8CA643BF545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicles (id)');
        $this->addSql('ALTER TABLE vehicle_feature ADD CONSTRAINT FK_A4280912469DE2 FOREIGN KEY (category_id) REFERENCES vehicle_categories (id)');
        $this->addSql('ALTER TABLE vehicle_value ADD CONSTRAINT FK_7FD8D8D8545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicles (id)');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES colors (id)');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA12469DE2 FOREIGN KEY (category_id) REFERENCES vehicle_categories (id)');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FA44F5D008 FOREIGN KEY (brand_id) REFERENCES vehicle_brands (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA7ADA1FB5');
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BFA76ED395');
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA44F5D008');
        $this->addSql('ALTER TABLE vehicle_feature DROP FOREIGN KEY FK_A4280912469DE2');
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FA12469DE2');
        $this->addSql('ALTER TABLE rented_vehicles DROP FOREIGN KEY FK_8CA643BF545317D1');
        $this->addSql('ALTER TABLE vehicle_value DROP FOREIGN KEY FK_7FD8D8D8545317D1');
        $this->addSql('DROP TABLE colors');
        $this->addSql('DROP TABLE rented_vehicles');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle_brands');
        $this->addSql('DROP TABLE vehicle_categories');
        $this->addSql('DROP TABLE vehicle_feature');
        $this->addSql('DROP TABLE vehicle_value');
        $this->addSql('DROP TABLE vehicles');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
