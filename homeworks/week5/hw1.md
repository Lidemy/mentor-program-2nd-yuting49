資料庫名稱：users
| 欄位名稱 | 欄位型態 | 說明 |
|---------- |----------|------|
| user_id   | integer  | 會員 id |
| username  | varchar  | 帳戶    |
| password  | varchar  | 密碼    |
| nicknam   | text     | 暱稱    |

資料庫名稱：comments
| 欄位名稱 | 欄位型態 | 說明 |
|----------  |----------|------|
| comment_id | integer  | 留言 id  |
| comment    | text     | 留言內容  |
| created_at | datetime | 留言時間  |
| parent_id  | integer  | 判斷是否為子留言|
