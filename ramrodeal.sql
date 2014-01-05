/*
** SQL file for college major project RamroDeal.com
** creating database AND tables
*/

--creating database
CREATE DATABASE	ramrodeal;

-- choosing the created database
USE ramrodeal;

CREATE TABLE groups(
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    permissions TEXT NOT NULL
);

CREATE TABLE user_session(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT(20) UNSIGNED NOT NULL,
    hash VARCHAR(64) NOT NULL
);

--creating table address_id that holds data for address information
CREATE TABLE address(
    address_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    house_no SMALLINT(4) UNSIGNED NOT NULL,
    street_name VARCHAR(40) NOT NULL,
    ward_no SMALLINT(3) NOT NULL,
    city VARCHAR(40) NOT NULL,
    district VARCHAR(40) NOT NULL,
    country VARCHAR(28) NOT NULL,
    zip SMALLINT(10) UNSIGNED NOT NULL,
    CHECK (house_no>0 AND ward_no>0 AND zip>0)
);

-- creating table Company
CREATE TABLE company(
    company_id CHAR(18) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    office_no INT(9) UNSIGNED NOT NULL,
    mobile_no INT(10) UNSIGNED NOT NULL,
    join_date DATETIME NOT NULL,
    address INT UNSIGNED  NOT NULL,
    email VARCHAR(42) NOT NULL,
    CONSTRAINT company_addressFK FOREIGN KEY (address)
    REFERENCES address(address_id)
);

--creating table Person that holds data for customer, administrator AND sub-administrator
CREATE TABLE user(
    user_id CHAR(18) NOT NULL PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    password VARCHAR(64) NOT NULL,
    salt VARCHAR(32) NOT NULL,
    gender CHAR(1) NOT NULL,
    contact_no INT(10) NOT NULL,
    address INT UNSIGNED  NOT NULL,
    email VARCHAR(42) NOT NULL,
    join_date DATETIME NOT NULL,
    company CHAR(18) NOT NULL,
    groups INT(11) NOT NULL,
    CHECK (contact_no>0),
    CONSTRAINT user_groupsFK FOREIGN KEY (groups)
    REFERENCES groups(id),
    CONSTRAINT user_addressFK FOREIGN KEY (address)
    REFERENCES address(address_id),
    CONSTRAINT user_companyFK FOREIGN KEY (company)
    REFERENCES company(company_id)
);

--creating table account_transcation holds data for merchant AND agent
CREATE TABLE account_transcation(
    transcation_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    deposited FLOAT(9) NOT NULL,
    issued FLOAT(9) NOT NULL,
    total FLOAT(9) NOT NULL,
    dates DATETIME NOT NULL,
    user CHAR(18) NOT NULL,
    CHECK (deposited>0 AND issued>0 AND total>0),
    CONSTRAINT account_transcation_userFK FOREIGN KEY (user)
    REFERENCES user(user_id)
);

--creating table company_transcation to change many-to-many relation to
-- one-to-one relation between table company AND account_transcation
CREATE TABLE company_transcation(
    company_id CHAR(18) NOT NULL,
    transcation_id INT NOT NULL,
    CONSTRAINT company_transcation_companyFK FOREIGN KEY (company_id)
    REFERENCES company(company_id),
    CONSTRAINT company_transcation_account_transcationFK FOREIGN KEY (transcation_id)
    REFERENCES account_transcation(transcation_id)
);

--creating table category that holds data of different category
CREATE TABLE category(
    category_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL
);

--creating table merchant_category to change many-to-many relation to
-- one-to-one relation between table user AND category
CREATE TABLE merchant_category(
    company_id CHAR(18) NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    CONSTRAINT merchant_category_companyFK FOREIGN KEY (company_id)
    REFERENCES company(company_id),
    CONSTRAINT merchant_category_categoryFK FOREIGN KEY (category_id)
    REFERENCES category(category_id)
);

--creating table image that holds images
CREATE TABLE image(
    image_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cover_image BLOB,
    image1 BLOB,
    image2 BLOB
);

--creating table deal that holds data for different deals
CREATE TABLE deal(
    deal_id CHAR(18) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    actual_price INT(9) UNSIGNED NOT NULL,
    offered_price INT(9) UNSIGNED NOT NULL,
    paid_price INT(9) UNSIGNED,
    final_price INT(9) UNSIGNED,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    minimum_purchase_requirement INT(3) UNSIGNED NOT NULL,
    maximum_purchase_requirement INT(3) UNSIGNED NOT NULL,
    coupon_start_date DATETIME NOT NULL,
    coupon_end_date DATETIME NOT NULL,
    company_id CHAR(18) NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    image_id INT UNSIGNED NOT NULL,
    user_id CHAR(18) NOT NULL,
    CONSTRAINT deal_companyFK FOREIGN KEY (company_id)
    REFERENCES company(company_id),
    CONSTRAINT deal_categoryFK FOREIGN KEY (category_id)
    REFERENCES category(category_id),
    CONSTRAINT deal_imageFK FOREIGN KEY (image_id)
    REFERENCES image(image_id),
    CONSTRAINT deal_userFK FOREIGN KEY (user_id)
    REFERENCES user(user_id),
    CHECK (actual_price >0 AND offered_price>0 AND paid_price > 0 AND final_price > 0 AND minimum_purchase_requirement > 0 AND maximum_purchase_requirement > 0)
);

--creating table coupon that holds data for coupons
CREATE TABLE coupon(
    coupon_no CHAR(18) NOT NULL PRIMARY KEY,
    deal_id CHAR(18) NOT NULL,
    user_id CHAR(18) NOT NULL,
    CONSTRAINT coupon_dealFK FOREIGN KEY (deal_id)
    REFERENCES deal(deal_id),
    CONSTRAINT coupon_userFK FOREIGN KEY (user_id)
    REFERENCES user(user_id)
);

CREATE TABLE comments(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    deal_id CHAR(18) NOT NULL,
    created DATETIME NOT NULL,
    user_id CHAR(18) NOT NULL,
    body TEXT NOT NULL,
    CONSTRAINT comments_dealFK FOREIGN KEY (deal_id)
    REFERENCES deal(deal_id),
    CONSTRAINT comments_userFK FOREIGN KEY (user_id)
    REFERENCES user(user_id)
);