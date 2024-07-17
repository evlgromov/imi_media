Провести миграции php artisan migrate
Заполнить БД фейковыми данными php artisan db:seed

QueryParameters:

- title - string
- price - int
- color - string
- variety - string
- category_id - int

Пример запроса:
localhost:8000/api/posts?title[]=Помидолры&title[]=Огурцы&color=Чёрный&category_id[]=1&category_id[]=2
