# AGRO Smart — API IoT

Cada dispositivo tem uma credencial própria. O servidor nunca usa uma chave global para todos os ESP32.

## Provisionamento
O administrador cria o dispositivo e recebe uma chave secreta **uma única vez**. O servidor guarda apenas o hash HMAC da chave.

Header: `X-Device-Key: <device-secret>`

### Telemetria
`POST /api/iot/telemetry.php`

```json
{"device_code":"AS-AVIARIO-001","temperature":30.4,"humidity":67.2,"feed_level_kg":42.5,"water_level_pct":80,"battery_voltage":12.6}
```

### Comandos
`GET /api/iot/commands.php?device_code=AS-AVIARIO-001`

### Resultado
`POST /api/iot/command-result.php`

```json
{"device_code":"AS-AVIARIO-001","command_id":12,"status":"executed","message":"Dose concluída"}
```

O firmware deve validar localmente limites, expiração, idempotência, watchdog, emergência, sensores de confirmação e proteção elétrica.
