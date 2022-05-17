<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517095025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP forfait');
        $this->addSql('ALTER TABLE fiche_intervention ADD contrat_id INT DEFAULT NULL, CHANGE nombre_h_realisé nombre_h_realise INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_intervention ADD CONSTRAINT FK_8D88099E1823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_8D88099E1823061F ON fiche_intervention (contrat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD forfait NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE fiche_intervention DROP FOREIGN KEY FK_8D88099E1823061F');
        $this->addSql('DROP INDEX IDX_8D88099E1823061F ON fiche_intervention');
        $this->addSql('ALTER TABLE fiche_intervention DROP contrat_id, CHANGE nombre_h_realise nombre_h_realisé INT NOT NULL');
    }
}
