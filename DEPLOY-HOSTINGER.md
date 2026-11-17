# Publicação na Hostinger

1. Crie uma base MySQL pelo hPanel.
2. Importe `database/schema.sql` no phpMyAdmin.
3. Envie o conteúdo do projeto por SFTP/gestor de ficheiros.
4. Configure o domínio para servir a pasta `public/` como raiz do site. Se o plano não permitir alterar o document root, não deixe `config`, `database` e `storage` dentro da pasta pública; mova-os para fora e ajuste os caminhos.
5. Crie `.env` fora da pasta pública sempre que possível e preencha os segredos.
6. Ative SSL/HTTPS e redirecionamento HTTP para HTTPS.
7. Configure permissões mínimas necessárias para `storage/logs` e `storage/reports`.
8. Crie o administrador conforme `database/first_admin.sql.example`.
9. Registe um dispositivo e teste a API com dados simulados antes de ligar o hardware.
10. Configure backups diários e teste a restauração.

Não publique o `.env` nem use credenciais de exemplo.
