<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531134421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_projet_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_B6BD307F79F37AE5 (id_user_id), INDEX IDX_B6BD307F80F43E55 (id_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, status SMALLINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, start_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_user (projet_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA413966C18272 (projet_id), INDEX IDX_FA413966A76ED395 (user_id), PRIMARY KEY(projet_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_task (tag_id INT NOT NULL, task_id INT NOT NULL, INDEX IDX_BC716493BAD26311 (tag_id), INDEX IDX_BC7164938DB60186 (task_id), PRIMARY KEY(tag_id, task_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, id_projet_id INT NOT NULL, id_user_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, status SMALLINT NOT NULL, created_at DATETIME NOT NULL, start_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, end_at DATETIME DEFAULT NULL, INDEX IDX_527EDB2580F43E55 (id_projet_id), INDEX IDX_527EDB2579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number VARCHAR(12) NOT NULL, created_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, token VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F80F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE projet_user ADD CONSTRAINT FK_FA413966C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_user ADD CONSTRAINT FK_FA413966A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_task ADD CONSTRAINT FK_BC716493BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_task ADD CONSTRAINT FK_BC7164938DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2580F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2579F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F80F43E55');
        $this->addSql('ALTER TABLE projet_user DROP FOREIGN KEY FK_FA413966C18272');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2580F43E55');
        $this->addSql('ALTER TABLE tag_task DROP FOREIGN KEY FK_BC716493BAD26311');
        $this->addSql('ALTER TABLE tag_task DROP FOREIGN KEY FK_BC7164938DB60186');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F79F37AE5');
        $this->addSql('ALTER TABLE projet_user DROP FOREIGN KEY FK_FA413966A76ED395');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2579F37AE5');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE projet_user');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_task');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE `user`');
    }
}
