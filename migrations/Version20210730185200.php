<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730185200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CD12A823');
        $this->addSql('DROP INDEX IDX_2B5BA98CD12A823 ON trajet');
        $this->addSql('ALTER TABLE trajet DROP trajet_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trajet ADD trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CD12A823 FOREIGN KEY (trajet_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98CD12A823 ON trajet (trajet_id)');
    }
}
