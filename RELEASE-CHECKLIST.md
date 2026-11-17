# Checklist antes de produção

- [ ] PHP 8.1+ e MySQL compatível
- [ ] HTTPS válido e obrigatório
- [ ] Segredos fortes e exclusivos em `.env`
- [ ] `.env`, `config`, `database`, `storage` bloqueados externamente
- [ ] Conta inicial criada com hash seguro
- [ ] Isolamento entre tenants testado
- [ ] Backups e restauração testados
- [ ] Limites de pedidos/rate limiting configurados
- [ ] Logs e monitorização configurados
- [ ] Dispositivos registados e chaves protegidas
- [ ] Leituras simuladas validadas
- [ ] Comandos testados em bancada sem carga
- [ ] Interlocks e limites de segurança no firmware
- [ ] SMS e pagamentos integrados com fornecedores reais
- [ ] Política de privacidade e termos publicados
- [ ] Teste de carga e revisão de segurança realizados
