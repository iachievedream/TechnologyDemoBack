# README

## 使用軟體

~~~bash
brew install --cask herd
brew install --cask dbngin
brew install --cask tableplu
~~~
參考：[Herd 實用教學：PHP 網站開發者的利器](https://kamadiam.com/what-is-herd/)

### db 設定

dbngin 新增資料庫名稱(其他先預設)
tableplu 查看資料庫的介面

#### laravel 與 db 的連接方式

1.將 `config/database.php` 改成資料庫的連接方式。

~~~php
# DB_CONNECTION=sqlite
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=TechnologyDemo # 依照自己資料庫修改
DB_USERNAME=root
DB_PASSWORD=
~~~

## TodoList

### 終端機指令解說
~~~bash
php artisan make:controller TodoListController
php artisan make:model TodoList
# 新增到db的模板
php artisan make:migration create_todo_lists_table

# 資料生成器（各欄屬性）
php artisan make:factory TodoList
# 塞入測試的假資料樣板（以 table 歸類）
php artisan make:seeder TodoListSeeder

# 匯入資料庫的指令
php artisan migrate
# 重匯資料庫的指令
php artisan migrate:refresh
# 塞入測試的假資料
php artisan db:seed
~~~

### 測試網址進入
http://technologydemoback.test/api/todo/2

technologydemoback:專案資料夾名稱

.test：herd軟體的環境添加之後綴

/api：laravel的前後端分離的前綴(`rounts/api.php`)，
使用 `rounts/web.php` 路徑則無需使用此後綴

/todo：rount的名稱，以及接往 controller 的class 名稱

/2：資料第二筆的 id

## Swagger
他的格式要求教嚴苛，
所以有時執行第三個指令時，
會不給通過，
需要修改至完全正確才能產生出 swagger 的文件。

~~~
composer require darkaonline/l5-swagger

php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

# 每次更新程式碼，就需要重新執行一次
php artisan l5-swagger:generate
~~~

進入查看網址
http://technologydemoback.test/api/documentation

## docker

### 執行相關指令
重新製作 docker image 與背景啟動，背景啟動執行，關閉，查看

~~~
docker-compose up --build -d
docker-compose up -d
docker-compose down
docker ps     
~~~

### 查看全部 log 或單一 log
all log and any one

~~~
docker-compose logs -f
docker logs mysql-db
~~~

### 執行 container 當中的指令

~~~
docker exec -it php_container /bin/bash
php artisan migrate
exit

上列三行指令合併為下列指令
docker exec -it php_container php artisan migrate
docker exec -it php_container php artisan migrate:refresh
~~~

<details>
<summary>備註（死坑）：</summary>

MySQL8 不能使用下列資料格式
~~~
DB_USERNAME=root
DB_PASSWORD=
~~~
所以在 `.env` 當中需要修改

</details>

## pint 程式碼格式工具

~~~
./vendor/bin/pint
./vendor/bin/pint --test
~~~
