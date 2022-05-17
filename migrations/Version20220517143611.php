<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517143611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP nom_charge_dossier');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993C54C8C93 FOREIGN KEY (type_id) REFERENCES type_contrat (id)');
        $this->addSql('CREATE INDEX IDX_60349993C54C8C93 ON contrat (type_id)');
        $this->addSql('ALTER TABLE expert DROP roles, DROP password, DROP etat_expert, CHANGE nombre_h_fait nombre_h_fait INT DEFAULT NULL, CHANGE tel tel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_contrat ADD nom VARCHAR(255) NOT NULL, DROP contrat_cadre, DROP contrat_normale, DROP avenant');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD nom_charge_dossier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993C54C8C93');
        $this->addSql('DROP INDEX IDX_60349993C54C8C93 ON contrat');
        $this->addSql('ALTER TABLE expert ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, ADD etat_expert VARCHAR(255) NOT NULL, CHANGE nombre_h_fait nombre_h_fait INT NOT NULL, CHANGE tel tel INT NOT NULL');
        $this->addSql('ALTER TABLE type_contrat ADD contrat_normale VARCHAR(255) NOT NULL, ADD avenant VARCHAR(255) NOT NULL, CHANGE nom contrat_cadre VARCHAR(255) NOT NULL');
    }
}
