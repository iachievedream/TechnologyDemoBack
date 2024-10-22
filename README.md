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
