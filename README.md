# Проект для души
# "Новая тюряга"

Конфиги для Apache! Прописываются в файл httpd.conf:  
Listen 8000  
NameVirtualHost newprison.com:8000  
Include "/path/to/your/directory ***\/new_prison/conf***"  

Перед этим устанавливаем в файл C:\Windows\System32\drivers\etc\hosts  
Для Mac OS - /private/etc/hosts  
Для Linux - /etc/hosts  
Следующую строку:  
127.0.0.1 newprison.com www.newprison.com  
