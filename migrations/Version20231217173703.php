<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217173703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'création de la table user et des relations qui en dépendent cp prov et com';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse_cp_id INT DEFAULT NULL, adresse_province_id INT DEFAULT NULL, commune_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, adresse_num VARCHAR(255) DEFAULT NULL, adresse_rue VARCHAR(255) DEFAULT NULL, inscription DATETIME DEFAULT NULL, type_utilisateur VARCHAR(255) DEFAULT NULL, nb_essais_infructueux INT DEFAULT NULL, banni TINYINT(1) DEFAULT NULL, inscript_confirmee TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64985CF3708 (adresse_cp_id), INDEX IDX_8D93D6492748E8A5 (adresse_province_id), INDEX IDX_8D93D649131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64985CF3708 FOREIGN KEY (adresse_cp_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492748E8A5 FOREIGN KEY (adresse_province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64985CF3708');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492748E8A5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649131A4F72');
        $this->addSql('DROP TABLE user');
    }
}
