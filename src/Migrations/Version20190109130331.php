<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109130331 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, career_id INT NOT NULL, name VARCHAR(50) NOT NULL, year SMALLINT NOT NULL, plan SMALLINT NOT NULL, status VARCHAR(50) NOT NULL, register_date DATETIME NOT NULL, INDEX IDX_FBCE3E7AB58CDA09 (career_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7AB58CDA09 FOREIGN KEY (career_id) REFERENCES career (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE subject');
    }
}
