CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(255) PRIMARY KEY,
    pass TEXT NOT NULL,
    type TEXT NOT NULL DEFAULT 'user'
);

INSERT INTO users (username, pass, type)
VALUES ('admin', '$2y$12$by5HcQ7IGECcg7D6OM9zcOOw7s//oLqefvSBJohEyCCOz7JmnL9X.', 'master')
ON DUPLICATE KEY UPDATE username = username;