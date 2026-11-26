<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261126092715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) DEFAULT NULL, biographie VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, genres_id INT DEFAULT NULL, INDEX IDX_835033F86A3B2603 (genres_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE livres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, synopsis VARCHAR(500) NOT NULL, publication DATE NOT NULL, isbn VARCHAR(20) NOT NULL, auteur_id INT NOT NULL, INDEX IDX_927187A460BB6FE6 (auteur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F86A3B2603 FOREIGN KEY (genres_id) REFERENCES livres (id)');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A460BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F86A3B2603');
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A460BB6FE6');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE livres');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
