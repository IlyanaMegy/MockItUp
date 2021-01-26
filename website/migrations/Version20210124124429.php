<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210124124429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE channels (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, logo_url VARCHAR(255) NOT NULL, bg_url VARCHAR(255) NOT NULL, owner_id INT NOT NULL, subscriber_nb INT NOT NULL, post_nb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, chan VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_5F9E962A4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friends (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_21EE7069275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joinedchans (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, chan_id INT NOT NULL, INDEX IDX_DD3D9E1C275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ownedchans (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, chan_id INT NOT NULL, INDEX IDX_834910D9275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, username VARCHAR(255) NOT NULL, chan VARCHAR(255) NOT NULL, INDEX IDX_885DBAFA72F5A1AA (channel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profils (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, country VARCHAR(20) NOT NULL, gender VARCHAR(30) NOT NULL, birth_date DATETIME NOT NULL, pic_url VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscribers (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_2FCD16AC72F5A1AA (channel_id), INDEX IDX_2FCD16AC275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscriptions (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_4778A01275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, channel_id INT DEFAULT NULL, humor VARBINARY(255) NOT NULL, politic VARBINARY(255) NOT NULL, travel VARBINARY(255) NOT NULL, religion VARBINARY(255) NOT NULL, food VARBINARY(255) NOT NULL, music VARBINARY(255) NOT NULL, art VARBINARY(255) NOT NULL, science VARBINARY(255) NOT NULL, sport VARBINARY(255) NOT NULL, animes VARBINARY(255) NOT NULL, gaming VARBINARY(255) NOT NULL, drawing VARBINARY(255) NOT NULL, hightech VARBINARY(255) NOT NULL, books VARBINARY(255) NOT NULL, philosophy VARBINARY(255) NOT NULL, poems VARBINARY(255) NOT NULL, movie VARBINARY(255) NOT NULL, education VARBINARY(255) NOT NULL, culture VARBINARY(255) NOT NULL, aesthetism VARBINARY(255) NOT NULL, photography VARBINARY(255) NOT NULL, nature VARBINARY(255) NOT NULL, mode VARBINARY(255) NOT NULL, beauty VARBINARY(255) NOT NULL, INDEX IDX_6FBC94264B89032C (post_id), INDEX IDX_6FBC942672F5A1AA (channel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4B89032C FOREIGN KEY (post_id) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE7069275ED078 FOREIGN KEY (profil_id) REFERENCES profils (id)');
        $this->addSql('ALTER TABLE joinedchans ADD CONSTRAINT FK_DD3D9E1C275ED078 FOREIGN KEY (profil_id) REFERENCES profils (id)');
        $this->addSql('ALTER TABLE ownedchans ADD CONSTRAINT FK_834910D9275ED078 FOREIGN KEY (profil_id) REFERENCES profils (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels (id)');
        $this->addSql('ALTER TABLE subscribers ADD CONSTRAINT FK_2FCD16AC72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels (id)');
        $this->addSql('ALTER TABLE subscribers ADD CONSTRAINT FK_2FCD16AC275ED078 FOREIGN KEY (profil_id) REFERENCES profils (id)');
        $this->addSql('ALTER TABLE subscriptions ADD CONSTRAINT FK_4778A01275ED078 FOREIGN KEY (profil_id) REFERENCES profils (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94264B89032C FOREIGN KEY (post_id) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC942672F5A1AA FOREIGN KEY (channel_id) REFERENCES channels (id)');
        $this->addSql('DROP TABLE post');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA72F5A1AA');
        $this->addSql('ALTER TABLE subscribers DROP FOREIGN KEY FK_2FCD16AC72F5A1AA');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC942672F5A1AA');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A4B89032C');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94264B89032C');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE7069275ED078');
        $this->addSql('ALTER TABLE joinedchans DROP FOREIGN KEY FK_DD3D9E1C275ED078');
        $this->addSql('ALTER TABLE ownedchans DROP FOREIGN KEY FK_834910D9275ED078');
        $this->addSql('ALTER TABLE subscribers DROP FOREIGN KEY FK_2FCD16AC275ED078');
        $this->addSql('ALTER TABLE subscriptions DROP FOREIGN KEY FK_4778A01275ED078');
        $this->addSql('CREATE TABLE post (firstPost TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE channels');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE friends');
        $this->addSql('DROP TABLE joinedchans');
        $this->addSql('DROP TABLE ownedchans');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE profils');
        $this->addSql('DROP TABLE subscribers');
        $this->addSql('DROP TABLE subscriptions');
        $this->addSql('DROP TABLE tags');
    }
}
