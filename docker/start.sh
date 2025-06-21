#!/bin/bash
# Espera opcional para asegurar que Laravel esté listo (si es necesario)
sleep 10
# Corre el schedule en segundo plano
nohup php artisan schedule:work &

exec apache2-foreground