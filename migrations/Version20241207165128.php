<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241207165128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'création des tables : début du Projet avec HERITAGE sur Prestataire et Internaute';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abus (id INT AUTO_INCREMENT NOT NULL, commentaire_id INT NOT NULL, internaute_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, encodage DATETIME DEFAULT NULL, INDEX IDX_72C9FD01BA9CD190 (commentaire_id), INDEX IDX_72C9FD01CAF41882 (internaute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, position INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_services (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, en_avant TINYINT(1) DEFAULT NULL, valide TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_4BB5A0033DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE code_postal (id INT AUTO_INCREMENT NOT NULL, code_postal VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, internaute_id INT DEFAULT NULL, prestataire_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, cote INT DEFAULT NULL, encodage DATETIME DEFAULT NULL, INDEX IDX_67F068BCCAF41882 (internaute_id), INDEX IDX_67F068BCBE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, commune VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, prestataire_photo_id INT DEFAULT NULL, ordre INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_C53D045FBE3DB2B7 (prestataire_id), INDEX IDX_C53D045FBA6A6AFF (prestataire_photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internaute (id INT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, newsletter TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_6C8E97CC3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internaute_bloc (internaute_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_B4CC2BA7CAF41882 (internaute_id), INDEX IDX_B4CC2BA75582E9C0 (bloc_id), PRIMARY KEY(internaute_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, publication DATETIME DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, document_pdf VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, internaute_id INT DEFAULT NULL, bloc_position_id INT DEFAULT NULL, ordre INT DEFAULT NULL, INDEX IDX_462CE4F5CAF41882 (internaute_id), INDEX IDX_462CE4F5C40DD82E (bloc_position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT NOT NULL, utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, site_internet VARCHAR(255) DEFAULT NULL, num_tel VARCHAR(255) DEFAULT NULL, num_tva VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_60A26480FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_categorie_services (prestataire_id INT NOT NULL, categorie_services_id INT NOT NULL, INDEX IDX_E453C499BE3DB2B7 (prestataire_id), INDEX IDX_E453C499710B80C8 (categorie_services_id), PRIMARY KEY(prestataire_id, categorie_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_internaute (prestataire_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_BA91FCF0BE3DB2B7 (prestataire_id), INDEX IDX_BA91FCF0CAF41882 (internaute_id), PRIMARY KEY(prestataire_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, categorie_services_id INT DEFAULT NULL, prestataire_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, document_pdf VARCHAR(255) DEFAULT NULL, debut DATETIME DEFAULT NULL, fin DATETIME DEFAULT NULL, affichage_de DATETIME DEFAULT NULL, affichage_jusqua DATETIME DEFAULT NULL, INDEX IDX_C11D7DD1710B80C8 (categorie_services_id), INDEX IDX_C11D7DD1BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, province VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, tarif DOUBLE PRECISION DEFAULT NULL, info_complementaire VARCHAR(255) DEFAULT NULL, debut DATETIME DEFAULT NULL, fin DATETIME DEFAULT NULL, affichage_de DATETIME DEFAULT NULL, affichage_jusque DATETIME DEFAULT NULL, INDEX IDX_C27C9369BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse_cp_id INT DEFAULT NULL, adresse_province_id INT DEFAULT NULL, commune_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, adresse_num VARCHAR(255) DEFAULT NULL, adresse_rue VARCHAR(255) DEFAULT NULL, inscription DATETIME DEFAULT NULL, type_utilisateur VARCHAR(255) DEFAULT NULL, nb_essais_infructueux INT DEFAULT NULL, banni TINYINT(1) DEFAULT NULL, inscript_confirmee TINYINT(1) DEFAULT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64985CF3708 (adresse_cp_id), INDEX IDX_8D93D6492748E8A5 (adresse_province_id), INDEX IDX_8D93D649131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE categorie_services ADD CONSTRAINT FK_4BB5A0033DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBA6A6AFF FOREIGN KEY (prestataire_photo_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CC3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA7CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA75582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5C40DD82E FOREIGN KEY (bloc_position_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499710B80C8 FOREIGN KEY (categorie_services_id) REFERENCES categorie_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1710B80C8 FOREIGN KEY (categorie_services_id) REFERENCES categorie_services (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64985CF3708 FOREIGN KEY (adresse_cp_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492748E8A5 FOREIGN KEY (adresse_province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01BA9CD190');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01CAF41882');
        $this->addSql('ALTER TABLE categorie_services DROP FOREIGN KEY FK_4BB5A0033DA5256D');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCCAF41882');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBE3DB2B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBE3DB2B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBA6A6AFF');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CC3DA5256D');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCBF396750');
        $this->addSql('ALTER TABLE internaute_bloc DROP FOREIGN KEY FK_B4CC2BA7CAF41882');
        $this->addSql('ALTER TABLE internaute_bloc DROP FOREIGN KEY FK_B4CC2BA75582E9C0');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5CAF41882');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5C40DD82E');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480BF396750');
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499710B80C8');
        $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0CAF41882');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1710B80C8');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1BE3DB2B7');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64985CF3708');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492748E8A5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649131A4F72');
        $this->addSql('DROP TABLE abus');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE categorie_services');
        $this->addSql('DROP TABLE code_postal');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE internaute');
        $this->addSql('DROP TABLE internaute_bloc');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_categorie_services');
        $this->addSql('DROP TABLE prestataire_internaute');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
