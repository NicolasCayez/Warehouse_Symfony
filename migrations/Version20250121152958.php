<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121152958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand ADD brand_name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE family ADD family_name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE product ADD product_serial_number VARCHAR(50) DEFAULT NULL, ADD product_name VARCHAR(50) NOT NULL, ADD product_ref VARCHAR(50) DEFAULT NULL, ADD product_ref2 VARCHAR(50) DEFAULT NULL, ADD product_value NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE product_color ADD product_color_name VARCHAR(50) NOT NULL, ADD product_color_label VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE product_info ADD product_info_name VARCHAR(50) NOT NULL, ADD product_info_content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE product_movement ADD last_qty INT NOT NULL, ADD new_qty INT NOT NULL');
        $this->addSql('ALTER TABLE product_size ADD product_size_height DOUBLE PRECISION DEFAULT NULL, ADD product_size_width DOUBLE PRECISION DEFAULT NULL, ADD product_size_depth DOUBLE PRECISION DEFAULT NULL, ADD product_size_weight DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD role_name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE supplier ADD supplier_name VARCHAR(50) NOT NULL, ADD supplier_phone VARCHAR(13) DEFAULT NULL, ADD supplier_address_number INT DEFAULT NULL, ADD supplier_address_road VARCHAR(50) DEFAULT NULL, ADD supplier_address_label VARCHAR(50) DEFAULT NULL, ADD supplier_address_postal_code VARCHAR(8) DEFAULT NULL, ADD supplier_address_city VARCHAR(50) DEFAULT NULL, ADD supplier_address_state VARCHAR(50) DEFAULT NULL, ADD supplier_address_country VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD user_last_name VARCHAR(50) NOT NULL, ADD user_first_name VARCHAR(50) NOT NULL, ADD user_phone VARCHAR(13) DEFAULT NULL, ADD user_address_number INT DEFAULT NULL, ADD user_address_road VARCHAR(50) DEFAULT NULL, ADD user_address_label VARCHAR(50) DEFAULT NULL, ADD user_address_postal_code VARCHAR(8) DEFAULT NULL, ADD user_address_city VARCHAR(50) DEFAULT NULL, ADD user_address_state VARCHAR(50) DEFAULT NULL, ADD user_address_country VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE warehouse ADD wh_name VARCHAR(50) NOT NULL, ADD wh_phone VARCHAR(13) DEFAULT NULL, ADD wh_address_number INT DEFAULT NULL, ADD wh_address_road VARCHAR(50) DEFAULT NULL, ADD wh_address_label VARCHAR(50) DEFAULT NULL, ADD wh_address_postal_code VARCHAR(8) DEFAULT NULL, ADD wh_address_city VARCHAR(50) DEFAULT NULL, ADD wh_address_state VARCHAR(50) DEFAULT NULL, ADD wh_address_country VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand DROP brand_name');
        $this->addSql('ALTER TABLE family DROP family_name');
        $this->addSql('ALTER TABLE product DROP product_serial_number, DROP product_name, DROP product_ref, DROP product_ref2, DROP product_value');
        $this->addSql('ALTER TABLE product_color DROP product_color_name, DROP product_color_label');
        $this->addSql('ALTER TABLE product_info DROP product_info_name, DROP product_info_content');
        $this->addSql('ALTER TABLE product_movement DROP last_qty, DROP new_qty');
        $this->addSql('ALTER TABLE product_size DROP product_size_height, DROP product_size_width, DROP product_size_depth, DROP product_size_weight');
        $this->addSql('ALTER TABLE role DROP role_name');
        $this->addSql('ALTER TABLE supplier DROP supplier_name, DROP supplier_phone, DROP supplier_address_number, DROP supplier_address_road, DROP supplier_address_label, DROP supplier_address_postal_code, DROP supplier_address_city, DROP supplier_address_state, DROP supplier_address_country');
        $this->addSql('ALTER TABLE user DROP user_last_name, DROP user_first_name, DROP user_phone, DROP user_address_number, DROP user_address_road, DROP user_address_label, DROP user_address_postal_code, DROP user_address_city, DROP user_address_state, DROP user_address_country');
        $this->addSql('ALTER TABLE warehouse DROP wh_name, DROP wh_phone, DROP wh_address_number, DROP wh_address_road, DROP wh_address_label, DROP wh_address_postal_code, DROP wh_address_city, DROP wh_address_state, DROP wh_address_country');
    }
}
