<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923133001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE record (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, date DATE NOT NULL, description LONGTEXT DEFAULT NULL, hours DOUBLE PRECISION DEFAULT NULL, INDEX IDX_9B349F91166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_organisation_settings (organisation_id INT NOT NULL, user_id INT NOT NULL, contract_number VARCHAR(255) DEFAULT NULL, user_type INT NOT NULL, PRIMARY KEY(organisation_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisation (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E6E132B47E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisation_user (organisation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CFD7D6519E6B1585 (organisation_id), INDEX IDX_CFD7D651A76ED395 (user_id), PRIMARY KEY(organisation_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, last_organisation_logged_in VARCHAR(255) DEFAULT NULL, last_project_used VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, organisation_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_2FB3D0EE9E6B1585 (organisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, organisation_id INT NOT NULL, datetime DATETIME NOT NULL, records LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_C42F7784A76ED395 (user_id), INDEX IDX_C42F77849E6B1585 (organisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE record ADD CONSTRAINT FK_9B349F91166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE organisation ADD CONSTRAINT FK_E6E132B47E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE organisation_user ADD CONSTRAINT FK_CFD7D6519E6B1585 FOREIGN KEY (organisation_id) REFERENCES organisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organisation_user ADD CONSTRAINT FK_CFD7D651A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9E6B1585 FOREIGN KEY (organisation_id) REFERENCES organisation (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77849E6B1585 FOREIGN KEY (organisation_id) REFERENCES organisation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE organisation_user DROP FOREIGN KEY FK_CFD7D6519E6B1585');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9E6B1585');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77849E6B1585');
        $this->addSql('ALTER TABLE organisation DROP FOREIGN KEY FK_E6E132B47E3C61F9');
        $this->addSql('ALTER TABLE organisation_user DROP FOREIGN KEY FK_CFD7D651A76ED395');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784A76ED395');
        $this->addSql('ALTER TABLE record DROP FOREIGN KEY FK_9B349F91166D1F9C');
        $this->addSql('DROP TABLE record');
        $this->addSql('DROP TABLE user_organisation_settings');
        $this->addSql('DROP TABLE organisation');
        $this->addSql('DROP TABLE organisation_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE report');
    }
}
