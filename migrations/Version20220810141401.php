<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220810141401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, sav_id INT DEFAULT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(40) NOT NULL, adr1 VARCHAR(40) DEFAULT NULL, adr2 VARCHAR(40) NOT NULL, codepos VARCHAR(5) DEFAULT NULL, ville VARCHAR(40) NOT NULL, INDEX IDX_C74404554F726353 (sav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sav (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, sav_nom VARCHAR(40) NOT NULL, sav_prenom VARCHAR(40) NOT NULL, sav_adr1 VARCHAR(40) DEFAULT NULL, sav_adr2 VARCHAR(40) NOT NULL, sav_codepos VARCHAR(5) DEFAULT NULL, sav_ville VARCHAR(40) NOT NULL, sav_probleme TINYTEXT NOT NULL, dt_crea DATE NOT NULL, INDEX IDX_6C7681F419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554F726353 FOREIGN KEY (sav_id) REFERENCES sav (id)');
        $this->addSql('ALTER TABLE sav ADD CONSTRAINT FK_6C7681F419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554F726353');
        $this->addSql('ALTER TABLE sav DROP FOREIGN KEY FK_6C7681F419EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE sav');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
