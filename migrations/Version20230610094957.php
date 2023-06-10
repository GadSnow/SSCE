<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230610094957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_skill (student_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_D60A9DEACB944F1A (student_id), INDEX IDX_D60A9DEA5585C142 (skill_id), PRIMARY KEY(student_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_skill ADD CONSTRAINT FK_D60A9DEACB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_skill ADD CONSTRAINT FK_D60A9DEA5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_skill DROP FOREIGN KEY FK_D60A9DEACB944F1A');
        $this->addSql('ALTER TABLE student_skill DROP FOREIGN KEY FK_D60A9DEA5585C142');
        $this->addSql('DROP TABLE student_skill');
    }
}
