<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730182729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE train (id INT AUTO_INCREMENT NOT NULL, numero_train INT NOT NULL, heure_depart TIME NOT NULL, heure_arrivee TIME NOT NULL, date_depart DATE NOT NULL, date_arrivee DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trajet ADD train_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C23BCD4D0 FOREIGN KEY (train_id) REFERENCES train (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98C23BCD4D0 ON trajet (train_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C23BCD4D0');
        $this->addSql('DROP TABLE train');
        $this->addSql('DROP INDEX IDX_2B5BA98C23BCD4D0 ON trajet');
        $this->addSql('ALTER TABLE trajet DROP train_id');
    }
}
