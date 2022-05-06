<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506214250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, num_contrat INT NOT NULL, start DATE NOT NULL, end DATE NOT NULL, nombre_h_totale INT NOT NULL, nombre_h_restant INT NOT NULL, etat_contrat VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix NUMERIC(10, 0) NOT NULL, forfait NUMERIC(10, 0) NOT NULL, frais_transport NUMERIC(10, 0) NOT NULL, type LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', num_contrat_cadre INT NOT NULL, nb_expert_jours INT NOT NULL, homme_jours_experts INT NOT NULL, team_experts LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contrat');
    }
}
