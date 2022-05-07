<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507224234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_intervention (id INT AUTO_INCREMENT NOT NULL, expert_id INT DEFAULT NULL, nom_intervention VARCHAR(255) NOT NULL, date_intervention DATE NOT NULL, type_intervention LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', nombre_h_realisé INT NOT NULL, description LONGTEXT NOT NULL, lieu_intervention VARCHAR(255) NOT NULL, INDEX IDX_8D88099EC5568CE4 (expert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_intervention ADD CONSTRAINT FK_8D88099EC5568CE4 FOREIGN KEY (expert_id) REFERENCES expert (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fiche_intervention');
    }
}
