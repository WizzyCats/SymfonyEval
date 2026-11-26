<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261126102938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY `FK_835033F86A3B2603`');
        $this->addSql('DROP INDEX IDX_835033F86A3B2603 ON genre');
        $this->addSql('ALTER TABLE genre DROP genres_id');
        $this->addSql('ALTER TABLE livres ADD genre_id INT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A44296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_927187A44296D31F ON livres (genre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre ADD genres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT `FK_835033F86A3B2603` FOREIGN KEY (genres_id) REFERENCES livres (id)');
        $this->addSql('CREATE INDEX IDX_835033F86A3B2603 ON genre (genres_id)');
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A44296D31F');
        $this->addSql('DROP INDEX IDX_927187A44296D31F ON livres');
        $this->addSql('ALTER TABLE livres DROP genre_id');
    }
}
