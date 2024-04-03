CREATE TABLE `email_replica` (`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `ticket_id` INT(11) DEFAULT 0, `uidl` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', INDEX `uidl` (`uidl` (95)), `mailbox_path` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `message_id` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `message_text` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `references` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `thread_index` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `message_date` DATETIME, `last_seen` DATETIME, `status` ENUM('ok','error','undesired','ignored') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'ok', `error_message` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `error_trace` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `contents_data` LONGBLOB, `contents_mimetype` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `contents_filename` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `contents_downloads_count` INT(11) UNSIGNED) ENGINE = innodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
CREATE TABLE `priv_trigger_onmailupdate` (`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY) ENGINE = innodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
CREATE TABLE `mailinbox_base` (`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `server` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `mailbox` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `login` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', INDEX `login` (`login` (95)), `password` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `protocol` ENUM('imap','pop3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'imap', `port` INT(11), `active` ENUM('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'yes', `realclass` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'MailInboxBase', INDEX `realclass` (`realclass` (95))) ENGINE = innodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
CREATE TABLE `mailinbox_standard` (`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `behavior` ENUM('both','create_only','update_only') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'both', `target_class` ENUM('Change','EmergencyChange','Incident','NormalChange','Problem','RoutineChange','UserRequest') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'UserRequest', `ticket_default_values` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `ticket_default_title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `title_pattern` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `unknown_caller_behavior` ENUM('create_contact','reject_email') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'reject_email', `unknown_caller_rejection_reply` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `caller_default_values` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `error_behavior` ENUM('delete','mark_as_error') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'mark_as_error', `notify_errors_to` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `notify_errors_from` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `trace` ENUM('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no', `debug_trace` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `email_storage` ENUM('delete','keep','move') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'keep', `target_folder` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '', `import_additional_contacts` ENUM('always','never','only_on_creation','only_on_update') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'never', `stimuli` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, `realclass` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'MailInboxStandard', INDEX `realclass` (`realclass` (95))) ENGINE = innodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
CREATE TABLE `mailinbox_oauth` (`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `oauth_client_id` INT(11) DEFAULT 0, INDEX `oauth_client_id` (`oauth_client_id`)) ENGINE = innodb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
ALTER TABLE `priv_sync_att_linkset` CHANGE `attribute_qualifier` `attribute_qualifier` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '\''
