<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219105949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, license_plate VARCHAR(255) NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, mileage INT NOT NULL, seats INT DEFAULT NULL, doors INT DEFAULT NULL, production_year INT DEFAULT NULL, weight INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, sold_at TIME DEFAULT NULL, views INT NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_773DE69DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_tag (id INT AUTO_INCREMENT NOT NULL, tag_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_82E9733BAD26311 (tag_id), INDEX IDX_82E9733C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE car_tag ADD CONSTRAINT FK_82E9733BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE car_tag ADD CONSTRAINT FK_82E9733C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA76ED395');
        $this->addSql('ALTER TABLE car_tag DROP FOREIGN KEY FK_82E9733BAD26311');
        $this->addSql('ALTER TABLE car_tag DROP FOREIGN KEY FK_82E9733C3C6F69F');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
