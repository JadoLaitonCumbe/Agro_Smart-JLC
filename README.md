# AGRO Smart Enterprise V3

Plataforma SaaS agropecuária para gestão de explorações, animais, dispositivos IoT, telemetria, alertas, automação, financeiro, subscrições e auditoria.

## Stack
- PHP 8.2+
- MySQL 8+/MariaDB compatível
- PDO + prepared statements
- HTML/CSS/JavaScript
- REST API para ESP32
- Sessões seguras + CSRF + RBAC + isolamento multi-tenant

## Instalação
1. Crie a base `agro_smart` e importe `database/schema.sql`.
2. Copie `.env.example` para `.env`.
3. Defina uma `APP_KEY` e `DEVICE_KEY_PEPPER` aleatórias e fortes.
4. Configure MySQL e HTTPS.
5. Gere um hash de administrador com `password_hash()` e use `database/first_admin.sql.example`.
6. Aponte o DocumentRoot do Apache para `public/`.
7. Configure os cron jobs em `cron/`.
8. Execute `tests/syntax.sh` antes do deploy.

## Segurança
- Segredos não são guardados no Git.
- Cada dispositivo IoT possui credencial individual.
- O servidor guarda somente o hash HMAC da credencial IoT.
- Todas as operações de utilizador passam por tenant + RBAC.
- Operações mutáveis da sessão usam CSRF.
- Login e endpoints IoT possuem rate limiting.
- Comandos físicos expiram e devem ser validados também pelo firmware.

## Produção
HTTPS, backups MySQL, monitorização de logs, restauração testada, firewall, atualização de PHP/MySQL e gestão segura de segredos são obrigatórios antes do go-live.

## IoT
Consulte `docs/API-IOT.md` para o contrato do ESP32.
