<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121145304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock_transfert DROP FOREIGN KEY FK_86D34A53816C6140');
        $this->addSql('DROP INDEX UNIQ_86D34A53816C6140 ON stock_transfert');
        $this->addSql('ALTER TABLE stock_transfert CHANGE destination_id linked_transfert_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_transfert ADD CONSTRAINT FK_86D34A5392A50EF7 FOREIGN KEY (linked_transfert_id) REFERENCES stock_transfert (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_86D34A5392A50EF7 ON stock_transfert (linked_transfert_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock_transfert DROP FOREIGN KEY FK_86D34A5392A50EF7');
        $this->addSql('DROP INDEX UNIQ_86D34A5392A50EF7 ON stock_transfert');
        $this->addSql('ALTER TABLE stock_transfert CHANGE linked_transfert_id destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_transfert ADD CONSTRAINT FK_86D34A53816C6140 FOREIGN KEY (destination_id) REFERENCES stock_transfert (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_86D34A53816C6140 ON stock_transfert (destination_id)');
    }
}
