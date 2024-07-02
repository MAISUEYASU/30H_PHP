# 管理画面で予約削除→削除フラグを立てるための変更
# 削除フラグを立てて削除日時を記録する
ALTER TABLE reserve
ADD COLUMN deleted_flag TINYINT(1) DEFAULT 0,
ADD COLUMN deleted_at DATETIME DEFAULT NULL;
