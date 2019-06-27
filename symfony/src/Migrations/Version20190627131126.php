<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627131126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE arrosage (arrosage_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, localisation VARCHAR(45) NOT NULL, capteur_debit INT NOT NULL, capteur_pression INT NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_78E734CA2C224438 (jardin), PRIMARY KEY(arrosage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bassin (bassin_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_61A414C52C224438 (jardin), PRIMARY KEY(bassin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eclairage (eclairage_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, localisation VARCHAR(45) NOT NULL, capteur_defaut_ampoule TINYINT(1) NOT NULL, capteur_luminosite INT NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_2A4239F82C224438 (jardin), PRIMARY KEY(eclairage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (equipement_id INT AUTO_INCREMENT NOT NULL, bassin INT NOT NULL, nom VARCHAR(45) NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_B8B4C6F361A414C5 (bassin), PRIMARY KEY(equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jardin (jardin_id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, nom VARCHAR(45) NOT NULL, INDEX IDX_2C2244388D93D649 (user), PRIMARY KEY(jardin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portail (portail_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, localisation VARCHAR(45) NOT NULL, capteur_presence TINYINT(1) NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_56C76A342C224438 (jardin), PRIMARY KEY(portail_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tondeuse (tondeuse_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, capteur_batterie INT NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_982D1C02C224438 (jardin), PRIMARY KEY(tondeuse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrosage ADD CONSTRAINT FK_78E734CA2C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE bassin ADD CONSTRAINT FK_61A414C52C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE eclairage ADD CONSTRAINT FK_2A4239F82C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F361A414C5 FOREIGN KEY (bassin) REFERENCES bassin (bassin_id)');
        $this->addSql('ALTER TABLE jardin ADD CONSTRAINT FK_2C2244388D93D649 FOREIGN KEY (user) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE portail ADD CONSTRAINT FK_56C76A342C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE tondeuse ADD CONSTRAINT FK_982D1C02C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F361A414C5');
        $this->addSql('ALTER TABLE arrosage DROP FOREIGN KEY FK_78E734CA2C224438');
        $this->addSql('ALTER TABLE bassin DROP FOREIGN KEY FK_61A414C52C224438');
        $this->addSql('ALTER TABLE eclairage DROP FOREIGN KEY FK_2A4239F82C224438');
        $this->addSql('ALTER TABLE portail DROP FOREIGN KEY FK_56C76A342C224438');
        $this->addSql('ALTER TABLE tondeuse DROP FOREIGN KEY FK_982D1C02C224438');
        $this->addSql('DROP TABLE arrosage');
        $this->addSql('DROP TABLE bassin');
        $this->addSql('DROP TABLE eclairage');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE jardin');
        $this->addSql('DROP TABLE portail');
        $this->addSql('DROP TABLE tondeuse');
    }
}
