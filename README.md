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
