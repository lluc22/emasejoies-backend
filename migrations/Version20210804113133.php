<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804113133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, collection_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, photos TEXT NOT NULL, enabled BOOLEAN DEFAULT \'true\' NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD514956FD ON product (collection_id)');
        $this->addSql('COMMENT ON COLUMN product.photos IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD514956FD FOREIGN KEY (collection_id) REFERENCES collection (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collection ADD published BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE collection ADD enabled BOOLEAN DEFAULT \'true\' NOT NULL');
        $this->addSql('ALTER TABLE collection ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE collection ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE collection DROP published');
        $this->addSql('ALTER TABLE collection DROP enabled');
        $this->addSql('ALTER TABLE collection DROP created_at');
        $this->addSql('ALTER TABLE collection DROP updated_at');
    }
}
