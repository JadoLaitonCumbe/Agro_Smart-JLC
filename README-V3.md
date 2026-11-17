# AGRO Smart Enterprise V3

Plataforma SaaS de gestão agropecuária com monitorização IoT, alertas, automação, financeiro, subscrições e auditoria.

## Fases implementadas na V3
1-6 fundação, segurança, RBAC, isolamento tenant e auditoria.
7-10 exploração, animais, dispositivos e financeiro.
11-15 credenciais IoT, telemetria, saúde, comandos e automação base.
16-19 regras/alertas/notificações/relatórios: infraestrutura e cron preparados.
20-24 SaaS, planos, subscrições, pagamentos e webhooks: schema e serviços preparados; provedor de pagamento deve ser configurado.
25-30 testes, rate limiting, backups, logs e hardening.

## Produção
- HTTPS obrigatório.
- APP_DEBUG=false.
- APP_KEY e DEVICE_KEY_PEPPER aleatórios e secretos.
- `.env` fora do repositório.
- Backups MySQL automáticos e teste periódico de restauração.
- PHP 8.2+ e MySQL 8+/MariaDB compatível.
