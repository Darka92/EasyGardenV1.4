<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015175349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE task');
        $this->addSql('ALTER TABLE bassin ADD statut TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE jardin DROP FOREIGN KEY FK_2C22443861A414C5');
        $this->addSql('DROP INDEX UNIQ_2C22443861A414C5 ON jardin');
        $this->addSql('ALTER TABLE jardin DROP bassin, CHANGE user user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tondeuse CHANGE capteur_batterie capteur_batterie INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipement (equipement_id INT AUTO_INCREMENT NOT NULL, bassin INT NOT NULL, nom VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, statut TINYINT(1) NOT NULL, INDEX IDX_B8B4C6F361A414C5 (bassin), PRIMARY KEY(equipement_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, titre VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F361A414C5 FOREIGN KEY (bassin) REFERENCES bassin (bassin_id)');
        $this->addSql('ALTER TABLE bassin DROP statut');
        $this->addSql('ALTER TABLE jardin ADD bassin INT DEFAULT NULL, CHANGE user user INT NOT NULL');
        $this->addSql('ALTER TABLE jardin ADD CONSTRAINT FK_2C22443861A414C5 FOREIGN KEY (bassin) REFERENCES bassin (bassin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2C22443861A414C5 ON jardin (bassin)');
        $this->addSql('ALTER TABLE tondeuse CHANGE capteur_batterie capteur_batterie DOUBLE PRECISION NOT NULL');
    }
}
