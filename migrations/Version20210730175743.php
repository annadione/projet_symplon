<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730175743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, confirmee TINYINT(1) NOT NULL, annulee TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE passager ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE passager ADD CONSTRAINT FK_BFF42EE9B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_BFF42EE9B83297E7 ON passager (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passager DROP FOREIGN KEY FK_BFF42EE9B83297E7');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_BFF42EE9B83297E7 ON passager');
        $this->addSql('ALTER TABLE passager DROP reservation_id');
    }
}
