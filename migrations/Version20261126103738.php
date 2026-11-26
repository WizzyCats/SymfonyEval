<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261126103738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livres_genre (livres_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_A5374B79EBF07F38 (livres_id), INDEX IDX_A5374B794296D31F (genre_id), PRIMARY KEY (livres_id, genre_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE livres_genre ADD CONSTRAINT FK_A5374B79EBF07F38 FOREIGN KEY (livres_id) REFERENCES livres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livres_genre ADD CONSTRAINT FK_A5374B794296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY `FK_927187A44296D31F`');
        $this->addSql('DROP INDEX IDX_927187A44296D31F ON livres');
        $this->addSql('ALTER TABLE livres DROP genre_id, CHANGE synopsis synopsis LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livres_genre DROP FOREIGN KEY FK_A5374B79EBF07F38');
        $this->addSql('ALTER TABLE livres_genre DROP FOREIGN KEY FK_A5374B794296D31F');
        $this->addSql('DROP TABLE livres_genre');
        $this->addSql('ALTER TABLE livres ADD genre_id INT NOT NULL, CHANGE synopsis synopsis VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT `FK_927187A44296D31F` FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_927187A44296D31F ON livres (genre_id)');
    }
}
