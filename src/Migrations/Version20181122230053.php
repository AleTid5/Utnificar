<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181122230053 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE career (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, duration SMALLINT NOT NULL, status INT NOT NULL, register_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(25) NOT NULL, css_class VARCHAR(25) NOT NULL, register_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, year SMALLINT NOT NULL, semester SMALLINT NOT NULL, plan SMALLINT NOT NULL, career INT NOT NULL, status INT NOT NULL, register_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, lastname VARCHAR(25) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(32) NOT NULL, user_type INT NOT NULL, status INT NOT NULL, login_counter INT NOT NULL, born_date DATETIME NOT NULL, last_login_date DATETIME NOT NULL, register_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, status INT NOT NULL, register_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE career');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_type');
    }
}
