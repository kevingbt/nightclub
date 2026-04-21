<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421090008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree ADD materiel_id INT DEFAULT NULL, ADD soiree_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE516880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
        $this->addSql('ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE5BA021F7B FOREIGN KEY (soiree_id) REFERENCES soiree (id)');
        $this->addSql('CREATE INDEX IDX_DFC1EAE516880AAF ON materiel_soiree (materiel_id)');
        $this->addSql('CREATE INDEX IDX_DFC1EAE5BA021F7B ON materiel_soiree (soiree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE516880AAF');
        $this->addSql('ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE5BA021F7B');
        $this->addSql('DROP INDEX IDX_DFC1EAE516880AAF ON materiel_soiree');
        $this->addSql('DROP INDEX IDX_DFC1EAE5BA021F7B ON materiel_soiree');
        $this->addSql('ALTER TABLE materiel_soiree DROP materiel_id, DROP soiree_id');
    }
}
