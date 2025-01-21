<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121142438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_role_warehouse (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, role_id_id INT NOT NULL, warehouse_id_id INT NOT NULL, INDEX IDX_D6C287799D86650F (user_id_id), INDEX IDX_D6C2877988987678 (role_id_id), INDEX IDX_D6C28779FE25E29A (warehouse_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C287799D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C2877988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C28779FE25E29A FOREIGN KEY (warehouse_id_id) REFERENCES warehouse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C287799D86650F');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C2877988987678');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C28779FE25E29A');
        $this->addSql('DROP TABLE user_role_warehouse');
    }
}
