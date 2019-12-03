<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203082729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE logiciel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nb VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affecter (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, logiciel_id INT NOT NULL, licence VARCHAR(255) NOT NULL, nb VARCHAR(255) NOT NULL, INDEX IDX_C290057AA76ED395 (user_id), INDEX IDX_C290057ACA84195D (logiciel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affecter ADD CONSTRAINT FK_C290057AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affecter ADD CONSTRAINT FK_C290057ACA84195D FOREIGN KEY (logiciel_id) REFERENCES logiciel (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affecter DROP FOREIGN KEY FK_C290057ACA84195D');
        $this->addSql('ALTER TABLE affecter DROP FOREIGN KEY FK_C290057AA76ED395');
        $this->addSql('DROP TABLE logiciel');
        $this->addSql('DROP TABLE affecter');
        $this->addSql('DROP TABLE user');
    }
}
