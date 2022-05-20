<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520141402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993C5568CE4 FOREIGN KEY (expert_id) REFERENCES expert (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999329C96BD8 FOREIGN KEY (interim_id) REFERENCES expert (id)');
        $this->addSql('CREATE INDEX IDX_60349993C5568CE4 ON contrat (expert_id)');
        $this->addSql('CREATE INDEX IDX_6034999329C96BD8 ON contrat (interim_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993C5568CE4');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999329C96BD8');
        $this->addSql('DROP INDEX IDX_60349993C5568CE4 ON contrat');
        $this->addSql('DROP INDEX IDX_6034999329C96BD8 ON contrat');
    }
}
