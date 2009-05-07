
CREATE TABLE db_finance.users (
                id INT(10) AUTO_INCREMENT NOT NULL,
                login VARCHAR(100) NOT NULL,
                password VARCHAR(50) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.peoples (
                id INT(10) AUTO_INCREMENT NOT NULL,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.categories (
                id INT(10) AUTO_INCREMENT NOT NULL,
                parent_id INT(10),
                name VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.currencies (
                id INT(10) AUTO_INCREMENT NOT NULL,
                name VARCHAR(50) NOT NULL,
                short_name VARCHAR(10) NOT NULL,
                symbol VARCHAR(10) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.currancy_rates (
                id INT(10) AUTO_INCREMENT NOT NULL,
                currency_id INT(10),
                start_date DATE NOT NULL,
                end_date DATE NOT NULL,
                rate DOUBLE PRECISION NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.accounts (
                id INT(10) AUTO_INCREMENT NOT NULL,
                parent_id INT(10),
                user_id INT(10) NOT NULL,
                name VARCHAR(250) NOT NULL,
                desc VARCHAR(200) NOT NULL,
                amount DOUBLE PRECISION NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE db_finance.transactions (
                id INT(10) AUTO_INCREMENT NOT NULL,
                currency_id INT(10),
                people_id INT(10),
                user_id INT(10) NOT NULL,
                account_id INT(10),
                category_id INT(10),
                desc_1 VARCHAR(200) NOT NULL,
                last_modified TIMESTAMP DEFAULT NOW() NOT NULL,
                date_entered TIMESTAMP NOT NULL,
                date_posted TIMESTAMP NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE db_finance.accounts ADD CONSTRAINT users_accounts_fk
FOREIGN KEY (user_id)
REFERENCES db_finance.users (id)
ON DELETE CASCADE
ON UPDATE NO ACTION;


ALTER TABLE db_finance.transactions ADD CONSTRAINT users_transactions_fk
FOREIGN KEY (user_id)
REFERENCES db_finance.users (id)
ON DELETE RESTRICT
ON UPDATE RESTRICT;


ALTER TABLE db_finance.transactions ADD CONSTRAINT peoples_transactions_fk
FOREIGN KEY (people_id)
REFERENCES db_finance.peoples (id)
ON DELETE SET NULL
ON UPDATE CASCADE;


ALTER TABLE db_finance.transactions ADD CONSTRAINT categories_transactions_fk
FOREIGN KEY (category_id)
REFERENCES db_finance.categories (id)
ON DELETE SET NULL
ON UPDATE NO ACTION;


ALTER TABLE db_finance.categories ADD CONSTRAINT categories_categories_fk
FOREIGN KEY (parent_id)
REFERENCES db_finance.categories (id)
ON DELETE CASCADE
ON UPDATE CASCADE;


ALTER TABLE db_finance.transactions ADD CONSTRAINT currencies_transactions_fk
FOREIGN KEY (currency_id)
REFERENCES db_finance.currencies (id)
ON DELETE SET NULL
ON UPDATE CASCADE;


ALTER TABLE db_finance.currancy_rates ADD CONSTRAINT currencies_currancy_rates_fk
FOREIGN KEY (currency_id)
REFERENCES db_finance.currencies (id)
ON DELETE SET NULL
ON UPDATE NO ACTION;


ALTER TABLE db_finance.transactions ADD CONSTRAINT transactions_accounts_fk
FOREIGN KEY (account_id)
REFERENCES db_finance.accounts (id)
ON DELETE SET NULL
ON UPDATE NO ACTION;


ALTER TABLE db_finance.accounts ADD CONSTRAINT accounts_accounts_fk
FOREIGN KEY (parent_id)
REFERENCES db_finance.accounts (id)
ON DELETE RESTRICT
ON UPDATE NO ACTION;