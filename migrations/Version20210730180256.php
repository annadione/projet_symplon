<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730180256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passager DROP FOREIGN KEY FK_BFF42EE9B83297E7');
        $this->addSql('DROP INDEX IDX_BFF42EE9B83297E7 ON passager');
        $this->addSql('ALTER TABLE passager DROP reservation_id');
        $this->addSql('ALTER TABLE reservation ADD passager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495571A51189 FOREIGN KEY (passager_id) REFERENCES passager (id)');
        $this->addSql('CREATE INDEX IDX_42C8495571A51189 ON reservation (passager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passager ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE passager ADD CONSTRAINT FK_BFF42EE9B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_BFF42EE9B83297E7 ON passager (reservation_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495571A51189');
        $this->addSql('DROP INDEX IDX_42C8495571A51189 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP passager_id');
    }
}
