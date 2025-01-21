<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121144223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD24BD5740');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA65F9C7D');
        $this->addSql('DROP INDEX IDX_D34A04ADA65F9C7D ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD24BD5740 ON product');
        $this->addSql('ALTER TABLE product ADD brand_id INT NOT NULL, ADD supplier_id INT NOT NULL, DROP brand_id_id, DROP supplier_id_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD44F5D008 ON product (brand_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD2ADD6D8C ON product (supplier_id)');
        $this->addSql('ALTER TABLE product_color DROP FOREIGN KEY FK_C70A33B5DE18E50B');
        $this->addSql('DROP INDEX IDX_C70A33B5DE18E50B ON product_color');
        $this->addSql('ALTER TABLE product_color CHANGE product_id_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_color ADD CONSTRAINT FK_C70A33B54584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_C70A33B54584665A ON product_color (product_id)');
        $this->addSql('ALTER TABLE product_info DROP FOREIGN KEY FK_466113F6DE18E50B');
        $this->addSql('DROP INDEX IDX_466113F6DE18E50B ON product_info');
        $this->addSql('ALTER TABLE product_info CHANGE product_id_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_info ADD CONSTRAINT FK_466113F64584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_466113F64584665A ON product_info (product_id)');
        $this->addSql('ALTER TABLE product_movement DROP FOREIGN KEY FK_3F6DFF60535DCFD3');
        $this->addSql('ALTER TABLE product_movement DROP FOREIGN KEY FK_3F6DFF60DE18E50B');
        $this->addSql('DROP INDEX IDX_3F6DFF60DE18E50B ON product_movement');
        $this->addSql('DROP INDEX IDX_3F6DFF60535DCFD3 ON product_movement');
        $this->addSql('ALTER TABLE product_movement ADD product_id INT NOT NULL, ADD mvmt_id INT NOT NULL, DROP product_id_id, DROP mvmt_id_id');
        $this->addSql('ALTER TABLE product_movement ADD CONSTRAINT FK_3F6DFF604584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_movement ADD CONSTRAINT FK_3F6DFF60B6898492 FOREIGN KEY (mvmt_id) REFERENCES movement (id)');
        $this->addSql('CREATE INDEX IDX_3F6DFF604584665A ON product_movement (product_id)');
        $this->addSql('CREATE INDEX IDX_3F6DFF60B6898492 ON product_movement (mvmt_id)');
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CBDE18E50B');
        $this->addSql('DROP INDEX IDX_7A2806CBDE18E50B ON product_size');
        $this->addSql('ALTER TABLE product_size CHANGE product_id_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_7A2806CB4584665A ON product_size (product_id)');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C28779FE25E29A');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C2877988987678');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C287799D86650F');
        $this->addSql('DROP INDEX IDX_D6C287799D86650F ON user_role_warehouse');
        $this->addSql('DROP INDEX IDX_D6C2877988987678 ON user_role_warehouse');
        $this->addSql('DROP INDEX IDX_D6C28779FE25E29A ON user_role_warehouse');
        $this->addSql('ALTER TABLE user_role_warehouse ADD user_id INT NOT NULL, ADD role_id INT NOT NULL, ADD warehouse_id INT NOT NULL, DROP user_id_id, DROP role_id_id, DROP warehouse_id_id');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C28779A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C28779D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C287795080ECDE FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)');
        $this->addSql('CREATE INDEX IDX_D6C28779A76ED395 ON user_role_warehouse (user_id)');
        $this->addSql('CREATE INDEX IDX_D6C28779D60322AC ON user_role_warehouse (role_id)');
        $this->addSql('CREATE INDEX IDX_D6C287795080ECDE ON user_role_warehouse (warehouse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2ADD6D8C');
        $this->addSql('DROP INDEX IDX_D34A04AD44F5D008 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD2ADD6D8C ON product');
        $this->addSql('ALTER TABLE product ADD brand_id_id INT NOT NULL, ADD supplier_id_id INT NOT NULL, DROP brand_id, DROP supplier_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD24BD5740 FOREIGN KEY (brand_id_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA65F9C7D FOREIGN KEY (supplier_id_id) REFERENCES supplier (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA65F9C7D ON product (supplier_id_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD24BD5740 ON product (brand_id_id)');
        $this->addSql('ALTER TABLE product_color DROP FOREIGN KEY FK_C70A33B54584665A');
        $this->addSql('DROP INDEX IDX_C70A33B54584665A ON product_color');
        $this->addSql('ALTER TABLE product_color CHANGE product_id product_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_color ADD CONSTRAINT FK_C70A33B5DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_C70A33B5DE18E50B ON product_color (product_id_id)');
        $this->addSql('ALTER TABLE product_info DROP FOREIGN KEY FK_466113F64584665A');
        $this->addSql('DROP INDEX IDX_466113F64584665A ON product_info');
        $this->addSql('ALTER TABLE product_info CHANGE product_id product_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_info ADD CONSTRAINT FK_466113F6DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_466113F6DE18E50B ON product_info (product_id_id)');
        $this->addSql('ALTER TABLE product_movement DROP FOREIGN KEY FK_3F6DFF604584665A');
        $this->addSql('ALTER TABLE product_movement DROP FOREIGN KEY FK_3F6DFF60B6898492');
        $this->addSql('DROP INDEX IDX_3F6DFF604584665A ON product_movement');
        $this->addSql('DROP INDEX IDX_3F6DFF60B6898492 ON product_movement');
        $this->addSql('ALTER TABLE product_movement ADD product_id_id INT NOT NULL, ADD mvmt_id_id INT NOT NULL, DROP product_id, DROP mvmt_id');
        $this->addSql('ALTER TABLE product_movement ADD CONSTRAINT FK_3F6DFF60535DCFD3 FOREIGN KEY (mvmt_id_id) REFERENCES movement (id)');
        $this->addSql('ALTER TABLE product_movement ADD CONSTRAINT FK_3F6DFF60DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_3F6DFF60DE18E50B ON product_movement (product_id_id)');
        $this->addSql('CREATE INDEX IDX_3F6DFF60535DCFD3 ON product_movement (mvmt_id_id)');
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CB4584665A');
        $this->addSql('DROP INDEX IDX_7A2806CB4584665A ON product_size');
        $this->addSql('ALTER TABLE product_size CHANGE product_id product_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CBDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_7A2806CBDE18E50B ON product_size (product_id_id)');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C28779A76ED395');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C28779D60322AC');
        $this->addSql('ALTER TABLE user_role_warehouse DROP FOREIGN KEY FK_D6C287795080ECDE');
        $this->addSql('DROP INDEX IDX_D6C28779A76ED395 ON user_role_warehouse');
        $this->addSql('DROP INDEX IDX_D6C28779D60322AC ON user_role_warehouse');
        $this->addSql('DROP INDEX IDX_D6C287795080ECDE ON user_role_warehouse');
        $this->addSql('ALTER TABLE user_role_warehouse ADD user_id_id INT NOT NULL, ADD role_id_id INT NOT NULL, ADD warehouse_id_id INT NOT NULL, DROP user_id, DROP role_id, DROP warehouse_id');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C28779FE25E29A FOREIGN KEY (warehouse_id_id) REFERENCES warehouse (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C2877988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user_role_warehouse ADD CONSTRAINT FK_D6C287799D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D6C287799D86650F ON user_role_warehouse (user_id_id)');
        $this->addSql('CREATE INDEX IDX_D6C2877988987678 ON user_role_warehouse (role_id_id)');
        $this->addSql('CREATE INDEX IDX_D6C28779FE25E29A ON user_role_warehouse (warehouse_id_id)');
    }
}
