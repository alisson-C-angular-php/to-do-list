CREATE DATABASE IF NOT EXISTS todolist;
USE todolist;

CREATE TABLE IF NOT EXISTS tb_listatarefa (
    id_tarefa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao VARCHAR(200),
    status ENUM('pendente', 'concluida') DEFAULT 'pendente',
    data_criacao DATE DEFAULT (CURRENT_DATE),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    
    user_id BIGINT UNSIGNED NOT NULL,
    
    INDEX idx_status (status),
    INDEX idx_user_id (user_id),
    INDEX idx_deleted_at (deleted_at)
);

INSERT INTO tb_listatarefa (titulo, descricao, status, data_criacao, user_id) VALUES
('Comprar mantimentos', 'Ir ao supermercado e comprar frutas, arroz e leite', 'pendente', '2025-10-01', 1),
('Estudar SQL', 'Revisar comandos SELECT, JOIN e funções agregadas', 'concluida', '2025-10-02', 1),
('Fazer backup do sistema', 'Realizar backup semanal dos arquivos importantes', 'pendente', '2025-10-03', 1),
('Enviar relatório', 'Enviar relatório mensal ao gerente', 'concluida', '2025-10-04', 1),
('Agendar consulta médica', 'Marcar consulta de rotina com o clínico geral', 'pendente', '2025-10-05', 1),
('Lavar o carro', 'Limpar interior e exterior do carro', 'concluida', '2025-10-06', 1),
('Atualizar currículo', 'Adicionar novas experiências profissionais', 'pendente', '2025-10-07', 1),
('Ler um livro', 'Finalizar leitura de “Clean Code”', 'concluida', '2025-10-08', 1),
('Organizar arquivos', 'Separar documentos pessoais e digitais', 'pendente', '2025-10-09', 1),
('Reunião com equipe', 'Participar da reunião semanal de planejamento', 'concluida', '2025-10-10', 1),
('Fazer exercícios', 'Treino de 40 minutos na academia', 'pendente', '2025-10-11', 1),
('Cuidar do jardim', 'Podar plantas e regar flores', 'concluida', '2025-10-12', 1),
('Atualizar site', 'Publicar novas notícias no site institucional', 'pendente', '2025-10-13', 1),
('Assistir curso online', 'Curso de introdução ao Docker', 'concluida', '2025-10-14', 1),
('Enviar e-mails pendentes', 'Responder clientes e parceiros', 'pendente', '2025-10-15', 1),
('Limpar a casa', 'Organizar quarto e sala', 'concluida', '2025-10-16', 1),
('Revisar código', 'Analisar PRs no repositório principal', 'pendente', '2025-10-17', 1),
('Fazer compras online', 'Comprar presentes de aniversário', 'concluida', '2025-10-18', 1),
('Estudar Angular', 'Aprofundar conceitos de componentes e serviços', 'pendente', '2025-10-19', 1),
('Fazer meditação', 'Sessão de 15 minutos pela manhã', 'concluida', '2025-10-20', 1),
('Planejar viagem', 'Organizar roteiro e hospedagem', 'pendente', '2025-10-21', 1),
('Renovar CNH', 'Ir ao Detran para renovação da carteira', 'concluida', '2025-10-22', 1),
('Configurar ambiente', 'Instalar dependências do projeto Node.js', 'pendente', '2025-10-23', 1),
('Fazer teste de software', 'Rodar testes unitários e de integração', 'concluida', '2025-10-24', 1),
('Ligar para cliente', 'Confirmar entrega do pedido', 'pendente', '2025-10-25', 1),
('Assistir palestra online', 'Tema: Segurança em Aplicações Web', 'concluida', '2025-10-26', 1),
('Criar conta na AWS', 'Configurar acesso e testar instância EC2', 'pendente', '2025-10-27', 1),
('Organizar despesas', 'Atualizar planilha financeira mensal', 'concluida', '2025-10-28', 1),
('Fazer revisão no notebook', 'Limpar ventoinha e atualizar drivers', 'pendente', '2025-10-29', 1),
('Estudar inglês', 'Assistir uma aula e praticar conversação', 'concluida', '2025-10-30', 1);
