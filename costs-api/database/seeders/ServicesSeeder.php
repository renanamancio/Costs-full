<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = DB::table('projects')->pluck('id', 'name');

        $services = [
            // Project 1 (Website Ramen Ichiraku - Total Cost: 1000)
            ['name' => 'Cardápio Digital de Lámen', 'description' => 'Desenvolvimento da interface interativa com seleção de tipos de lámen e adicionais', 'cost' => '600', 'project_id' => $projects['Website Ramen Ichiraku']],
            ['name' => 'Sistema de Checkout e Pedidos', 'description' => 'Integração de pagamentos e envio direto dos pedidos para o balcão do Teuchi', 'cost' => '400', 'project_id' => $projects['Website Ramen Ichiraku']],

            // Project 2 (Website Memorial Uzumaki - Total Cost: 800)
            ['name' => 'Galeria Histórica do Clã Uzumaki', 'description' => 'Criação de linha do tempo e páginas dedicadas aos membros ilustres e símbolos do clã', 'cost' => '500', 'project_id' => $projects['Website Memorial Uzumaki']],
            ['name' => 'Mural Digital de Homenagens', 'description' => 'Espaço para mensagens da comunidade ninja e registros em memória do clã', 'cost' => '300', 'project_id' => $projects['Website Memorial Uzumaki']],

            // Project 3 (Website Exame Chunin - Total Cost: 1150)
            ['name' => 'Portal de Inscrição dos Gennins', 'description' => 'Formulário de cadastro das equipes das vilas e validação de pergaminhos', 'cost' => '700', 'project_id' => $projects['Website Exame Chunin']],
            ['name' => 'Plataforma de Chaveamento da Arena', 'description' => 'Módulo de exibição em tempo real das lutas e chaveamento da fase final', 'cost' => '450', 'project_id' => $projects['Website Exame Chunin']],

            // Project 4 (Servidor da Vila da Folha - Total Cost: 2100)
            ['name' => 'Firewall e Segurança dos Portões de Konoha', 'description' => 'Configuração de regras de proteção e barreira contra invasão externa', 'cost' => '1200', 'project_id' => $projects['Servidor da Vila da Folha']],
            ['name' => 'Cluster da Torre do Hokage', 'description' => 'Balanceamento de carga e servidores redundantes para alta disponibilidade', 'cost' => '900', 'project_id' => $projects['Servidor da Vila da Folha']],

            // Project 5 (Servidor de comunicações da ANBU - Total Cost: 3100)
            ['name' => 'VPN Criptografada Ponto a Ponto', 'description' => 'Canal exclusivo e cifrado para comunicação confidencial de agentes em campo', 'cost' => '1800', 'project_id' => $projects['Servidor de comunicações da ANBU']],
            ['name' => 'Storage Seguro e Disaster Recovery', 'description' => 'Servidor de arquivos criptografado com rotinas automáticas de backup externo', 'cost' => '1300', 'project_id' => $projects['Servidor de comunicações da ANBU']],

            // Project 6 (Testes do sistema Kage Bunshin API - Total Cost: 400)
            ['name' => 'Testes de Concorrência de Clones', 'description' => 'Simulação de milhares de clones simultâneos consumindo a API', 'cost' => '250', 'project_id' => $projects['Testes do sistema Kage Bunshin API']],
            ['name' => 'Testes de Vazamento de Memória', 'description' => 'Validação da liberação de recursos após a dispersão dos clones', 'cost' => '150', 'project_id' => $projects['Testes do sistema Kage Bunshin API']],

            // Project 7 (Testes unitários do módulo Rasengan - Total Cost: 900)
            ['name' => 'Casos de Borda de Rotação e Densidade', 'description' => 'Testes unitários cobrindo rotação, compressão e estabilização de chakra', 'cost' => '500', 'project_id' => $projects['Testes unitários do módulo Rasengan']],
            ['name' => 'Pipeline de Cobertura de Código', 'description' => 'Relatórios automáticos de cobertura de testes do módulo no CI/CD', 'cost' => '400', 'project_id' => $projects['Testes unitários do módulo Rasengan']],

            // Project 8 (Website do Clã Uchiha - Total Cost: 950)
            ['name' => 'Frontend Escuro com Tema Uchiha', 'description' => 'Design visual estilizado com tema escuro e ícones do leque Uchiha', 'cost' => '550', 'project_id' => $projects['Website do Clã Uchiha']],
            ['name' => 'Árvore Genealógica Interativa', 'description' => 'Componente dinâmico exibindo a linhagem dos membros do clã', 'cost' => '400', 'project_id' => $projects['Website do Clã Uchiha']],

            // Project 9 (Website de recrutamento Akatsuki - Total Cost: 1200)
            ['name' => 'Formulário Seletivo de Nukenins', 'description' => 'Triagem confidencial de habilidades e upload de registros criminais', 'cost' => '700', 'project_id' => $projects['Website de recrutamento Akatsuki']],
            ['name' => 'Sistema de Notificações Cifradas', 'description' => 'Envio de confirmações e missões via mensagens automáticas seguras', 'cost' => '500', 'project_id' => $projects['Website de recrutamento Akatsuki']],

            // Project 10 (Servidor de sites Uchiha - Total Cost: 100)
            ['name' => 'Setup de Servidor Web e DNS Uchiha', 'description' => 'Configuração de proxy reverso Nginx e apontamento de DNS', 'cost' => '100', 'project_id' => $projects['Servidor de sites Uchiha']],

            // Project 11 (Servidor de emails renegados - Total Cost: 1800)
            ['name' => 'Servidor de Correio Postfix Seguro', 'description' => 'Implementação de servidor de e-mail com TLS, DKIM e SPF ativos', 'cost' => '1100', 'project_id' => $projects['Servidor de emails renegados']],
            ['name' => 'Módulo Anti-Rastreamento Ninja', 'description' => 'Ofuscação de cabeçalhos e roteamento de tráfego por nós anônimos', 'cost' => '700', 'project_id' => $projects['Servidor de emails renegados']],

            // Project 12 (Servidor do banco de dados sharingan - Total Cost: 1010)
            ['name' => 'Tuning do PostgreSQL para Leituras Rápidas', 'description' => 'Otimização de memória compartilhada e criação de índices avançados', 'cost' => '610', 'project_id' => $projects['Servidor do banco de dados sharingan']],
            ['name' => 'Replicação Contínua de Dados', 'description' => 'Cluster com standby server para espelhamento em tempo real', 'cost' => '400', 'project_id' => $projects['Servidor do banco de dados sharingan']],

            // Project 13 (Testes de segurança do Genjutsu Tsukuyomi - Total Cost: 1500)
            ['name' => 'Pentest e Testes de Invasão Psíquica', 'description' => 'Testes de vulnerabilidade contra quebra de ilusão e injeção mental', 'cost' => '900', 'project_id' => $projects['Testes de segurança do Genjutsu Tsukuyomi']],
            ['name' => 'Auditoria de Integridade Temporal', 'description' => 'Validação dos registros de dilatação de tempo em ambiente controlado', 'cost' => '600', 'project_id' => $projects['Testes de segurança do Genjutsu Tsukuyomi']],

            // Project 14 (Testes de carga do sistema Amaterasu - Total Cost: 1100)
            ['name' => 'Simulação de Estresse Térmico Contínuo', 'description' => 'Execução de testes de estresse avaliando persistência sob carga extrema', 'cost' => '700', 'project_id' => $projects['Testes de carga do sistema Amaterasu']],
            ['name' => 'Monitoramento de Consumo e Latência', 'description' => 'Métricas de telemetria em tempo real para verificar limites de sobrecarga', 'cost' => '400', 'project_id' => $projects['Testes de carga do sistema Amaterasu']],

            // Project 15 (Website do restaurante Baratie - Total Cost: 900)
            ['name' => 'Sistema de Reserva de Mesas Flutuantes', 'description' => 'Interface para seleção de mesas no deck superior e horário de refeições', 'cost' => '500', 'project_id' => $projects['Website do restaurante Baratie']],
            ['name' => 'Cardápio Especial do Chef Zeff', 'description' => 'Vitrine online de frutos do mar com fotos e preços atualizados', 'cost' => '400', 'project_id' => $projects['Website do restaurante Baratie']],

            // Project 16 (Website do Jornal da Economia do Mar - Total Cost: 1300)
            ['name' => 'CMS para Distribuição via Gaivotas', 'description' => 'Painel administrativo para publicação imediata de manchetes e recompensas', 'cost' => '800', 'project_id' => $projects['Website do Jornal da Economia do Mar']],
            ['name' => 'Portal de Assinaturas em Berries', 'description' => 'Área de assinantes com integração de cobrança periódica', 'cost' => '500', 'project_id' => $projects['Website do Jornal da Economia do Mar']],

            // Project 17 (Servidor de rotas do Log Pose - Total Cost: 2200)
            ['name' => 'Servidor de Triangulação Magnética', 'description' => 'Setup de backend dedicado a calcular rotas entre as ilhas da Grand Line', 'cost' => '1300', 'project_id' => $projects['Servidor de rotas do Log Pose']],
            ['name' => 'Monitoramento e Recuperação de Sinal', 'description' => 'Mecanismos de tolerância a falhas diante de anomalias no clima marítimo', 'cost' => '900', 'project_id' => $projects['Servidor de rotas do Log Pose']],

            // Project 18 (Servidor da base da Marinha G-5 - Total Cost: 2900)
            ['name' => 'Infraestrutura de Rede e Blindagem Den Den Mushi', 'description' => 'Instalação de roteadores seguros contra escuta de caracóis transmissores', 'cost' => '1700', 'project_id' => $projects['Servidor da base da Marinha G-5']],
            ['name' => 'Storage Centralizado de Fichas de Procurados', 'description' => 'Armazenamento seguro em rede para prontuários de piratas procurados', 'cost' => '1200', 'project_id' => $projects['Servidor da base da Marinha G-5']],

            // Project 19 (Testes da API pirataServer - Total Cost: 300)
            ['name' => 'Testes Automatizados de Rotas de Saque', 'description' => 'Validação com Robot Framework dos endpoints de inventário e tesouros', 'cost' => '200', 'project_id' => $projects['Testes da API pirataServer']],
            ['name' => 'Testes de Autenticação de Piratas', 'description' => 'Verificação de cabeçalhos de autorização e expiração de sessões', 'cost' => '100', 'project_id' => $projects['Testes da API pirataServer']],

            // Project 20 (Testes unitários do projeto rei_dos_piratas - Total Cost: 600)
            ['name' => 'Testes do Decodificador de Poneglyphs', 'description' => 'Testes unitários cobrindo conversão de texto antigo e coordenadas', 'cost' => '350', 'project_id' => $projects['Testes unitários do projeto rei_dos_piratas']],
            ['name' => 'Mocks de Integração dos Chapéus de Palha', 'description' => 'Simulação do comportamento assíncrono dos tripulantes em batalha', 'cost' => '250', 'project_id' => $projects['Testes unitários do projeto rei_dos_piratas']],

            // Project 21 (Testes automatizados de UI do site Ilha dos Peixes - Total Cost: 1400)
            ['name' => 'Testes End-to-End de Passaporte Submarino', 'description' => 'Fluxos automatizados de login, formulário e emissão de permissão', 'cost' => '850', 'project_id' => $projects['Testes automatizados de UI do site Ilha dos Peixes']],
            ['name' => 'Testes de Layout e Responsividade Subaquática', 'description' => 'Garantia de renderização perfeita em diferentes telas e resoluções', 'cost' => '550', 'project_id' => $projects['Testes automatizados de UI do site Ilha dos Peixes']],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert(array_merge($service, [
                'id' => (string) Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
