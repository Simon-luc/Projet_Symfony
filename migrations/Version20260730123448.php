<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260730123448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilise ADD intervention_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilise ADD CONSTRAINT FK_28917DEF8EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('CREATE INDEX IDX_28917DEF8EAE3863 ON utilise (intervention_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilise DROP FOREIGN KEY FK_28917DEF8EAE3863');
        $this->addSql('DROP INDEX IDX_28917DEF8EAE3863 ON utilise');
        $this->addSql('ALTER TABLE utilise DROP intervention_id');
    }
}
