# GuestBook - PHP

使用免費的 template 來做原生 PHP 的練習

來源 : https://templated.co/graffiti

# DB 設計
### users
- id int primary key aut_increment
- user_name char(20)
- user_pwd char(40)
- user_email char(64)
### messages
- id int primary key aut_increment
- user_name char(20)
- message char(255)
- time char(16)
- user_id int references users(id)
- title char(40)

# GuestBook 主要功能
1. 登入註冊登出
2. 登入時能儲存 session
3. 需要登入才能留言
4. 需要未登入狀態才能使用登入和註冊
5. 自動跳轉的功能

- action.php
  > 當 guestbook.php 要將留言輸入進 DB 時，就會在這裡執行，執行完後過 3 秒會跳轉回到 index.php
  
  > 在這裡會先判斷用戶是否有輸入資訊，再獲取系統時間和 post 的 title 和 message 還有 session 的 userName 和 userId，都取得後輸入進 messages

- delete.php
  用戶在 index.php 可以刪除自己的留言，點擊 DELETE 後會使用 GET 傳送 id 到這裡，之後再將那篇 id 的留言刪除

- guestbook.php
  > 讓用戶可以使用留言功能，需要登入才能使用，如果沒有登入會顯示登入提示
  
  > 有 title 和 message 兩個輸入框

- index.php
  > 主頁面顯示，會顯示所有的留言、時間和用戶，如果登入用戶和留言是同個人，可以使用刪除功能

- login.php
  > 實現登入功能，只有未登入時能使用這個功能

- login1.php
  > 當 login.php 按下 Login 時，會到這裡執行登入功能
  
  > 先判斷是否 user name 和 password 都有輸入，再從 DB 中搜尋 user name，如果密碼錯誤或找不到帳號都只會顯示 Wrong password，如果資料都正確會存兩個 session ，userName 和 userId

- logout.php
  > 實現登出功能，刪除兩個 session，userName 和 userId

- register.php
  > 顯示註冊頁面，只有未登入時能使用這個功能
  
  > 總共需要輸入 User name 、 Password 和 Email，Email 不一定需要

- register1.php
  > 執行註冊功能，先判斷用戶是否有輸入 user name 和 password，再判斷 user name 是否已被使用，沒被使用會再將 password 做 sha1 編碼，最後將資訊輸入進 DB
  
  > 如果創建失敗會跳轉回 register.php ，創建成功會跳轉至 index.php


- - -
### 12/24
- 完善跳轉的顯示
- 增加顯示個別用戶的文章 list.php
- 增加文章預覽和 READ MORE 功能 article.php
- TABLE messages 增加 views 欄 
- 增加 side bar 顯示最新和最熱門文章
- 增加 side bar 文章搜尋功能
- 增加換頁功能，每四則文章一頁，網址輸入大於總頁數時會跳到最後一頁

- - -
### 12/25
- 修復路徑 bug
- 增加新的 table - comments ( 增加 foreign key 時要注意類別 )
- 增加文章內留言功能
- 增加刪除文章時也會將留言全部刪除的功能
### comments
- id int primary key aut_increment
- user_name char(20)
- comment char(255)
- time char(16)
- user_id int references users(id)
- message_id int references messages(id)

- - -
### 12/26
- 新增文章發布時能貼上影片網址，要求必須 `http://`或`https://`開頭和以`.mp4`結尾，並且後端判斷網址格式是否正確，如果正確會再發送請求至網址，如果有響應則確認這個網址可以使用，否則發布文章會失敗
- 新增文章內顯示影片功能，如果沒有影片就不會顯示
- 新增影片時間跳轉功能，點擊圖片就能跳轉到該圖片的時間位置

- - -
### 12/27
- 新增新的 table 來存放所有的影片時間跳轉點
- 新增使用者可以自己建立時間跳轉點

### time_stamp
- id int primary key aut_increment
- time char(10)
- image char(255)
- text char(20)
- user_id int references users(id)
- message_id int references messages(id)
