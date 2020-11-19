<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201119100243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE createur_categorie (createur_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_7FD01DCB73A201E5 (createur_id), INDEX IDX_7FD01DCBBCF5E72D (categorie_id), PRIMARY KEY(createur_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE createur_categorie ADD CONSTRAINT FK_7FD01DCB73A201E5 FOREIGN KEY (createur_id) REFERENCES createur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE createur_categorie ADD CONSTRAINT FK_7FD01DCBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE categorie_createur');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_createur (categorie_id INT NOT NULL, createur_id INT NOT NULL, INDEX IDX_C25F9BEEBCF5E72D (categorie_id), INDEX IDX_C25F9BEE73A201E5 (createur_id), PRIMARY KEY(categorie_id, createur_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_createur ADD CONSTRAINT FK_C25F9BEE73A201E5 FOREIGN KEY (createur_id) REFERENCES createur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_createur ADD CONSTRAINT FK_C25F9BEEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE createur_categorie');
    }
}
