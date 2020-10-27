# Проект для души
# "Новая тюряга"

Конфиги для Apache! Прописываются в файл httpd.conf:  
NameVirtualHost newprison.com:8000  
Include "${SRVROOT}/new_prison"  

Перед этим устанавливаем в файл C:\Windows\System32\drivers\etc\hosts  
Для Mac OS - /private/etc/hosts  
Для Linux - /etc/hosts  
Следующую строку:  
127.0.0.1 newprison.com www.newprison.com  
