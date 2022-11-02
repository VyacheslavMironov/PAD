from os import system
from socket import gethostbyname, getfqdn


NGINX = ""
HOSTS = ""
PATH_NGINX = "/etc/nginx/sites-available/pad-config.conf"
PATH_HOSTS = "/etc/hosts"
SERVER_NAME = gethostbyname(getfqdn())
LOCALHOST = ["server_name _", "server_name 127.0.0.1"]

# Установка Nginx
if system("apt-get install nginx") == 0:
    if system("nginx -V") == 0:
        # Чтение из /var/www/PAD/configuration/nginx/pad-config.conf
        with open('nginx/pad-config.conf') as f_obj:
            NGINX = f_obj.read()
            for item in LOCALHOST:
                if item in NGINX:
                    NGINX.replace(item, f"server_name {SERVER_NAME}")
                    f_obj.close()

        # Запись конфига
        open(PATH_NGINX, "w+").write(NGINX)

        # Перезапуск Nginx
        if system("sudo systemctl reload nginx") == 0:
            print(True)

# Настройка файла hosts
with open('hosts') as f_obj:
    HOSTS = f_obj.read()
    # Запись конфига хоста
    open(PATH_HOSTS, 'a').write(f"\n{HOSTS}")
