<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230611213538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE latitude latitude VARCHAR(255) DEFAULT NULL, CHANGE longitude longitude VARCHAR(255) DEFAULT NULL, CHANGE description description TINYTEXT NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333B5A08D7');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE latitude latitude VARCHAR(255) NOT NULL, CHANGE longitude longitude VARCHAR(255) NOT NULL, CHANGE description description TINYTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333B5A08D7');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON UPDATE NO ACTION ON DELETE SET NULL');
    }
}
