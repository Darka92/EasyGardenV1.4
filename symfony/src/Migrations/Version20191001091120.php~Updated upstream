<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001091120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bassin (bassin_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_61A414C52C224438 (jardin), PRIMARY KEY(bassin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eclairage (eclairage_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, localisation VARCHAR(45) NOT NULL, capteur_defaut_ampoule TINYINT(1) NOT NULL, capteur_luminosite DOUBLE PRECISION NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_2A4239F82C224438 (jardin), PRIMARY KEY(eclairage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (equipement_id INT AUTO_INCREMENT NOT NULL, bassin INT NOT NULL, nom VARCHAR(45) NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_B8B4C6F361A414C5 (bassin), PRIMARY KEY(equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jardin (jardin_id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, bassin INT DEFAULT NULL, nom VARCHAR(45) NOT NULL, INDEX IDX_2C2244388D93D649 (user), UNIQUE INDEX UNIQ_2C22443861A414C5 (bassin), PRIMARY KEY(jardin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portail (portail_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, localisation VARCHAR(45) NOT NULL, capteur_presence TINYINT(1) NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_56C76A342C224438 (jardin), PRIMARY KEY(portail_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tondeuse (tondeuse_id INT AUTO_INCREMENT NOT NULL, jardin INT NOT NULL, nom VARCHAR(45) NOT NULL, capteur_batterie INT NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_982D1C02C224438 (jardin), PRIMARY KEY(tondeuse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', create_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bassin ADD CONSTRAINT FK_61A414C52C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE eclairage ADD CONSTRAINT FK_2A4239F82C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F361A414C5 FOREIGN KEY (bassin) REFERENCES bassin (bassin_id)');
        $this->addSql('ALTER TABLE jardin ADD CONSTRAINT FK_2C2244388D93D649 FOREIGN KEY (user) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE jardin ADD CONSTRAINT FK_2C22443861A414C5 FOREIGN KEY (bassin) REFERENCES bassin (bassin_id)');
        $this->addSql('ALTER TABLE portail ADD CONSTRAINT FK_56C76A342C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE tondeuse ADD CONSTRAINT FK_982D1C02C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('ALTER TABLE arrosage MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE arrosage DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE arrosage ADD jardin INT NOT NULL, DROP id, CHANGE arrosage_id arrosage_id INT AUTO_INCREMENT NOT NULL, CHANGE capteur_debit capteur_debit DOUBLE PRECISION NOT NULL, CHANGE capteur_pression capteur_pression DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE arrosage ADD CONSTRAINT FK_78E734CA2C224438 FOREIGN KEY (jardin) REFERENCES jardin (jardin_id)');
        $this->addSql('CREATE INDEX IDX_78E734CA2C224438 ON arrosage (jardin)');
        $this->addSql('ALTER TABLE arrosage ADD PRIMARY KEY (arrosage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F361A414C5');
        $this->addSql('ALTER TABLE jardin DROP FOREIGN KEY FK_2C22443861A414C5');
        $this->addSql('ALTER TABLE arrosage DROP FOREIGN KEY FK_78E734CA2C224438');
        $this->addSql('ALTER TABLE bassin DROP FOREIGN KEY FK_61A414C52C224438');
        $this->addSql('ALTER TABLE eclairage DROP FOREIGN KEY FK_2A4239F82C224438');
        $this->addSql('ALTER TABLE portail DROP FOREIGN KEY FK_56C76A342C224438');
        $this->addSql('ALTER TABLE tondeuse DROP FOREIGN KEY FK_982D1C02C224438');
        $this->addSql('ALTER TABLE jardin DROP FOREIGN KEY FK_2C2244388D93D649');
        $this->addSql('DROP TABLE bassin');
        $this->addSql('DROP TABLE eclairage');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE jardin');
        $this->addSql('DROP TABLE portail');
        $this->addSql('DROP TABLE tondeuse');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('ALTER TABLE arrosage MODIFY arrosage_id INT NOT NULL');
        $this->addSql('DROP INDEX IDX_78E734CA2C224438 ON arrosage');
        $this->addSql('ALTER TABLE arrosage DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE arrosage ADD id INT AUTO_INCREMENT NOT NULL, DROP jardin, CHANGE arrosage_id arrosage_id INT NOT NULL, CHANGE capteur_debit capteur_debit INT NOT NULL, CHANGE capteur_pression capteur_pression INT NOT NULL');
        $this->addSql('ALTER TABLE arrosage ADD PRIMARY KEY (id)');
    }
}
