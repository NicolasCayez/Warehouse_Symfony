<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121135409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_reception ADD invoice_ref VARCHAR(50) NOT NULL, ADD parcel_ref VARCHAR(50) NOT NULL, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE product_reception ADD CONSTRAINT FK_3E7633A2BF396750 FOREIGN KEY (id) REFERENCES movement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_modification ADD stock_modification_message LONGTEXT NOT NULL, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_modification ADD CONSTRAINT FK_CE0F1FC1BF396750 FOREIGN KEY (id) REFERENCES movement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_transfert ADD stock_transfert_message LONGTEXT NOT NULL, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_transfert ADD CONSTRAINT FK_86D34A53BF396750 FOREIGN KEY (id) REFERENCES movement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_reception DROP FOREIGN KEY FK_3E7633A2BF396750');
        $this->addSql('ALTER TABLE product_reception DROP invoice_ref, DROP parcel_ref, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE stock_modification DROP FOREIGN KEY FK_CE0F1FC1BF396750');
        $this->addSql('ALTER TABLE stock_modification DROP stock_modification_message, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE stock_transfert DROP FOREIGN KEY FK_86D34A53BF396750');
        $this->addSql('ALTER TABLE stock_transfert DROP stock_transfert_message, CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
