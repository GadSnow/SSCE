<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614162400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_of_life ADD CONSTRAINT FK_B436B321F773E7CA FOREIGN KEY (student_id_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_B436B321F773E7CA ON course_of_life (student_id_id)');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F53408E8AF');
        $this->addSql('DROP INDEX IDX_462CE4F53408E8AF ON position');
        $this->addSql('ALTER TABLE position ADD situation VARCHAR(255) NOT NULL, DROP situation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position ADD situation_id INT DEFAULT NULL, DROP situation');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F53408E8AF FOREIGN KEY (situation_id) REFERENCES situation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_462CE4F53408E8AF ON position (situation_id)');
        $this->addSql('ALTER TABLE course_of_life DROP FOREIGN KEY FK_B436B321F773E7CA');
        $this->addSql('DROP INDEX IDX_B436B321F773E7CA ON course_of_life');
    }
}
