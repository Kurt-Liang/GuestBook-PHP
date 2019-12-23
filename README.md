# GuestBook - PHP

使用免費的 template 來做原生 PHP 的練習

來源 : https://templated.co/graffiti

# DB 設計
### users
- id int 自增長主鍵
- user_name char(20)
- user_pwd char(40)
- user_email char(64)
### messages
- id int 自增長主鍵
- user_name char(20)
- message char(255)
- time char(16)
- user_id int 外鍵關聯 users 的 id
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

- guestbook.php
  > 讓用戶可以使用留言功能，需要登入才能使用，如果沒有登入會顯示登入提示
  
  > 有 title 和 message 兩個輸入框

- index.php
  > 主頁面顯示，會顯示所有的留言、時間和用戶

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
