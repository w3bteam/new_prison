# Проект для души
# "Новая тюряга"

Конфиги для Apache! Прописываются в файл httpd.conf:  
Listen 8000  
Define APP "/путь/до/директории/где/находится/new_prison"  
NameVirtualHost *:8000  
Include "${APP}/new_prison/conf"  

Сайт пока на newprison.com:8000. Пока не разобрался как убрать порт из адреса в Apache. Так что еще проапдейчу.  

Перед этим устанавливаем в файл C:\Windows\System32\drivers\etc\hosts  
Для Mac OS - /private/etc/hosts  
Для Linux - /etc/hosts  
Следующую строку:  
127.0.0.1 newprison.com www.newprison.com  

**Важно!!!**  
Нельзя лить изменения сразу в master. Изменения делать в отдельных ветках. Добавлять через pull request. Пример:  
aavksentev/bugfix_описание(для багов) или aavksentev/feature_описание(для фич)  
Вместо aavksentev пишите что то свое.  

Для обучения git'у:  

https://learngitbranching.js.org/?locale=ru_RU 
