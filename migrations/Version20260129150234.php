<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260129150234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Modifying driver name column for lastname and adding firstname column to increase details';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver ADD firstname VARCHAR(255) NOT NULL, CHANGE name lastname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver ADD name VARCHAR(255) NOT NULL, DROP lastname, DROP firstname');
    }
}
