<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240724212620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Inserir dados fictícios na tabela empresa
        $this->addSql("INSERT INTO empresa (id, nome, endereco) VALUES 
            (1, 'Empresa A', 'Rua A, 123'),
            (2, 'Empresa B', 'Rua B, 456'),
            (3, 'Empresa C', 'Rua C, 789')");

        // Inserir dados fictícios na tabela socio
        $this->addSql("INSERT INTO socio (id, nome, cpf, empresa_id) VALUES 
            (1, 'Sócio 1', '12345678901', 1),
            (2, 'Sócio 2', '23456789012', 2),
            (3, 'Sócio 3', '34567890123', 3),
            (4, 'Sócio 4', '45678901234', 1),
            (5, 'Sócio 5', '56789012345', 2)");
    }

    public function down(Schema $schema): void
    {
        // Remover dados fictícios das tabelas
        $this->addSql('DELETE FROM socio');
        $this->addSql('DELETE FROM empresa');
    }
}