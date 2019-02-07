<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Add level table
 */
final class Version20190206185654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add & insert for level table.';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, 
                                level_number INT NOT NULL, 
                                required_experience INT NOT NULL, 
                                PRIMARY KEY(id)
                            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('Insert into level (required_experience) VALUES (100);
                            Insert into level (required_experience) VALUES (150);
                            Insert into level (required_experience) VALUES (200);
                            Insert into level (required_experience) VALUES (250);
                            Insert into level (required_experience) VALUES (300);
                            Insert into level (required_experience) VALUES (350);
                            Insert into level (required_experience) VALUES (400);
                            Insert into level (required_experience) VALUES (450);
                            Insert into level (required_experience) VALUES (500);
                            Insert into level (required_experience) VALUES (550);
                            Insert into level (required_experience) VALUES (750);
                            Insert into level (required_experience) VALUES (950);
                            Insert into level (required_experience) VALUES (1150);
                            Insert into level (required_experience) VALUES (1350);
                            Insert into level (required_experience) VALUES (1550);
                            Insert into level (required_experience) VALUES (1750);
                            Insert into level (required_experience) VALUES (1950);
                            Insert into level (required_experience) VALUES (2150);
                            Insert into level (required_experience) VALUES (2350);
                            Insert into level (required_experience) VALUES (2550);
                            Insert into level (required_experience) VALUES (2750);
                            Insert into level (required_experience) VALUES (2950);
                            Insert into level (required_experience) VALUES (3150);
                            Insert into level (required_experience) VALUES (3350);
                            Insert into level (required_experience) VALUES (3550);
                            Insert into level (required_experience) VALUES (3750);
                            Insert into level (required_experience) VALUES (3950);
                            Insert into level (required_experience) VALUES (4150);
                            Insert into level (required_experience) VALUES (4350);
                            Insert into level (required_experience) VALUES (4550);
                            Insert into level (required_experience) VALUES (4750);
                            Insert into level (required_experience) VALUES (4950);
                            Insert into level (required_experience) VALUES (5150);
                            Insert into level (required_experience) VALUES (5350);
                            Insert into level (required_experience) VALUES (5550);
                            Insert into level (required_experience) VALUES (5750);
                            Insert into level (required_experience) VALUES (5950);
                            Insert into level (required_experience) VALUES (6150);
                            Insert into level (required_experience) VALUES (6350);
                            Insert into level (required_experience) VALUES (6550);
                            Insert into level (required_experience) VALUES (6750);
                            Insert into level (required_experience) VALUES (6950);
                            Insert into level (required_experience) VALUES (7150);
                            Insert into level (required_experience) VALUES (7350);
                            Insert into level (required_experience) VALUES (7550);
                            Insert into level (required_experience) VALUES (7750);
                            Insert into level (required_experience) VALUES (7950);
                            Insert into level (required_experience) VALUES (8150);
                            Insert into level (required_experience) VALUES (8350);
                            Insert into level (required_experience) VALUES (8550);
                            Insert into level (required_experience) VALUES (8750);
                            Insert into level (required_experience) VALUES (8950);
                            Insert into level (required_experience) VALUES (9150);
                            Insert into level (required_experience) VALUES (9350);
                            Insert into level (required_experience) VALUES (9550);
                            Insert into level (required_experience) VALUES (9750);
                            Insert into level (required_experience) VALUES (9950);
                            Insert into level (required_experience) VALUES (10150);
                            Insert into level (required_experience) VALUES (10350);
                            Insert into level (required_experience) VALUES (10550);
                            Insert into level (required_experience) VALUES (10750);
                            Insert into level (required_experience) VALUES (10950);
                            Insert into level (required_experience) VALUES (11150);
                            Insert into level (required_experience) VALUES (11350);
                            Insert into level (required_experience) VALUES (11550);
                            Insert into level (required_experience) VALUES (11750);
                            Insert into level (required_experience) VALUES (11950);
                            Insert into level (required_experience) VALUES (12150);
                            Insert into level (required_experience) VALUES (12350);
                            Insert into level (required_experience) VALUES (12550);
                            Insert into level (required_experience) VALUES (12750);
                            Insert into level (required_experience) VALUES (12950);
                            Insert into level (required_experience) VALUES (13150);
                            Insert into level (required_experience) VALUES (13350);
                            Insert into level (required_experience) VALUES (13550);
                            Insert into level (required_experience) VALUES (13750);
                            Insert into level (required_experience) VALUES (13950);
                            Insert into level (required_experience) VALUES (14150);
                            Insert into level (required_experience) VALUES (14350);
                            Insert into level (required_experience) VALUES (14550);
                            Insert into level (required_experience) VALUES (14750);
                            Insert into level (required_experience) VALUES (14950);
                            Insert into level (required_experience) VALUES (15150);
                            Insert into level (required_experience) VALUES (15350);
                            Insert into level (required_experience) VALUES (15550);
                            Insert into level (required_experience) VALUES (15750);
                            Insert into level (required_experience) VALUES (15950);
                            Insert into level (required_experience) VALUES (16150);
                            Insert into level (required_experience) VALUES (16350);
                            Insert into level (required_experience) VALUES (16550);
                            Insert into level (required_experience) VALUES (16750);
                            Insert into level (required_experience) VALUES (16950);
                            Insert into level (required_experience) VALUES (17150);
                            Insert into level (required_experience) VALUES (17350);
                            Insert into level (required_experience) VALUES (17550);
                            Insert into level (required_experience) VALUES (17750);
                            Insert into level (required_experience) VALUES (17950);
                            Insert into level (required_experience) VALUES (18150);
                            Insert into level (required_experience) VALUES (18350);
                            Insert into level (required_experience) VALUES (18550);
                        ');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE level');
    }
}
