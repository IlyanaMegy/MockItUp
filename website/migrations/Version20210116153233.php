<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210116153233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE channel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, logo_url VARCHAR(255) NOT NULL, bg_url VARCHAR(255) NOT NULL, owner_id INT NOT NULL, subscriber_nb INT NOT NULL, post_nb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, chan VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_9474526C4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friend (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_55EEAC61275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joined_chan (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, chan_id INT NOT NULL, INDEX IDX_85A20703275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owned_chan (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, chan_id INT NOT NULL, INDEX IDX_DBD689C6275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, country VARCHAR(20) NOT NULL, gender VARCHAR(30) NOT NULL, birth_date DATETIME NOT NULL, pic_url VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscriber (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_AD005B6972F5A1AA (channel_id), INDEX IDX_AD005B69275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_A3C664D3275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, channel_id INT DEFAULT NULL, humor VARBINARY(255) NOT NULL, politic VARBINARY(255) NOT NULL, travel VARBINARY(255) NOT NULL, religion VARBINARY(255) NOT NULL, food VARBINARY(255) NOT NULL, music VARBINARY(255) NOT NULL, art VARBINARY(255) NOT NULL, science VARBINARY(255) NOT NULL, sport VARBINARY(255) NOT NULL, animes VARBINARY(255) NOT NULL, gaming VARBINARY(255) NOT NULL, drawing VARBINARY(255) NOT NULL, hightech VARBINARY(255) NOT NULL, books VARBINARY(255) NOT NULL, philosophy VARBINARY(255) NOT NULL, poems VARBINARY(255) NOT NULL, movie VARBINARY(255) NOT NULL, education VARBINARY(255) NOT NULL, culture VARBINARY(255) NOT NULL, aesthetism VARBINARY(255) NOT NULL, photography VARBINARY(255) NOT NULL, nature VARBINARY(255) NOT NULL, mode VARBINARY(255) NOT NULL, beauty VARBINARY(255) NOT NULL, INDEX IDX_389B7834B89032C (post_id), INDEX IDX_389B78372F5A1AA (channel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC61275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE joined_chan ADD CONSTRAINT FK_85A20703275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE owned_chan ADD CONSTRAINT FK_DBD689C6275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE subscriber ADD CONSTRAINT FK_AD005B6972F5A1AA FOREIGN KEY (channel_id) REFERENCES channel (id)');
        $this->addSql('ALTER TABLE subscriber ADD CONSTRAINT FK_AD005B69275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D3275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7834B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B78372F5A1AA FOREIGN KEY (channel_id) REFERENCES channel (id)');
        $this->addSql('ALTER TABLE post ADD id INT AUTO_INCREMENT NOT NULL, ADD channel_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL, ADD username VARCHAR(255) NOT NULL, ADD chan VARCHAR(255) NOT NULL, CHANGE firstpost content LONGTEXT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D72F5A1AA FOREIGN KEY (channel_id) REFERENCES channel (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D72F5A1AA ON post (channel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D72F5A1AA');
        $this->addSql('ALTER TABLE subscriber DROP FOREIGN KEY FK_AD005B6972F5A1AA');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B78372F5A1AA');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC61275ED078');
        $this->addSql('ALTER TABLE joined_chan DROP FOREIGN KEY FK_85A20703275ED078');
        $this->addSql('ALTER TABLE owned_chan DROP FOREIGN KEY FK_DBD689C6275ED078');
        $this->addSql('ALTER TABLE subscriber DROP FOREIGN KEY FK_AD005B69275ED078');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D3275ED078');
        $this->addSql('DROP TABLE channel');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE friend');
        $this->addSql('DROP TABLE joined_chan');
        $this->addSql('DROP TABLE owned_chan');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE subscriber');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE post MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX IDX_5A8A6C8D72F5A1AA ON post');
        $this->addSql('ALTER TABLE post DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE post DROP id, DROP channel_id, DROP title, DROP created_at, DROP username, DROP chan, CHANGE content firstPost TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
    }
}
