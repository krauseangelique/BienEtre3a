<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217170251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return ' création de table image et relation avec la table categorieServices';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, ordre INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_services ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_services ADD CONSTRAINT FK_4BB5A0033DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BB5A0033DA5256D ON categorie_services (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_services DROP FOREIGN KEY FK_4BB5A0033DA5256D');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP INDEX UNIQ_4BB5A0033DA5256D ON categorie_services');
        $this->addSql('ALTER TABLE categorie_services DROP image_id');
    }
}
