<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605213519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_of_life (id INT AUTO_INCREMENT NOT NULL, student_id_id INT DEFAULT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_B436B321F773E7CA (student_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, student_id_id INT DEFAULT NULL, entreprise_id_id INT DEFAULT NULL, situation_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_462CE4F5F773E7CA (student_id_id), INDEX IDX_462CE4F5DAC5BE2B (entreprise_id_id), INDEX IDX_462CE4F53408E8AF (situation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE situation (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, speciality_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, fullname VARCHAR(255) NOT NULL, birthday DATE NOT NULL, birthplace VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_B723AF333B5A08D7 (speciality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_of_life ADD CONSTRAINT FK_B436B321F773E7CA FOREIGN KEY (student_id_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5F773E7CA FOREIGN KEY (student_id_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5DAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F53408E8AF FOREIGN KEY (situation_id) REFERENCES situation (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_of_life DROP FOREIGN KEY FK_B436B321F773E7CA');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5F773E7CA');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5DAC5BE2B');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F53408E8AF');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333B5A08D7');
        $this->addSql('DROP TABLE course_of_life');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE situation');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE student');
    }
}
