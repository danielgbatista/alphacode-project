USE alphacode_test;

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    job VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    cell_phone VARCHAR(20) NOT NULL,
    has_whatsapp BOOLEAN,
    send_email_notification BOOLEAN,
    send_sms_notification BOOLEAN
);