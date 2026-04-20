<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260420143304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE soiree_artiste (soiree_id INT NOT NULL, artiste_id INT NOT NULL, INDEX IDX_D1D45D1DBA021F7B (soiree_id), INDEX IDX_D1D45D1D21D25844 (artiste_id), PRIMARY KEY (soiree_id, artiste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE soiree_artiste ADD CONSTRAINT FK_D1D45D1DBA021F7B FOREIGN KEY (soiree_id) REFERENCES soiree (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE soiree_artiste ADD CONSTRAINT FK_D1D45D1D21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soiree_artiste DROP FOREIGN KEY FK_D1D45D1DBA021F7B');
        $this->addSql('ALTER TABLE soiree_artiste DROP FOREIGN KEY FK_D1D45D1D21D25844');
        $this->addSql('DROP TABLE soiree_artiste');
    }
}
