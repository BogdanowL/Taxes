<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219181931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'insert init tax residents';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('INSERT INTO tax_resident (id, country, tax_percentage, tax_number) VALUES (1, \'France\', 20, \'FR123456789\'), (2, \'Belgium\', 21, \'BE123456789\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
