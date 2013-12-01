/*
** SQL file for college major project RamroDeal.com
** creating database and tables
*/

--creating database
CREATE DATABASE	ramrodeal;

-- choosing the created database
USE ramrodeal;

CREATE TABLE groups(
    id int(10) not null auto_increament,
    name varchar(20) not null primary key,
    permissions text not null
);

CREATE TABLE user_session(
    id int(10) unsigned not null auto_increament primary,
    user_id int(20) unsigned not null,
    hash varchar(64) not null
);

--creating table login that holds email and password
CREATE TABLE login(
	email varchar(42) not null primary key,
	password varchar(64) not null,
        salt varchar(32) not null,
        group int(11) not null
);

--creating table address_id that holds data for address information
CREATE TABLE address(
	address_id int unsigned not null auto_increment primary key,
	house_no smallint(4) unsigned not null,
	street_name varchar(40) not null,
	ward_no smallint(3) not null,
	city varchar(40) not null,
	district varchar(40) not null,
	country varchar(28) not null,
	zip smallint(10) unsigned not null,
	CHECK (house_no>0 and ward_no>0 and zip>0)
);

--creating table Person that holds data for customer, administrator and sub-administrator
CREATE TABLE person(
	person_id char(18) not null primary key,
	first_name varchar(25) not null,
	last_name varchar(25) not null,
	gender char(1) not null,
	contact_no int(10) not null,
	join_date date not null,
	types varchar(15) not null,
	address_id int unsigned  not null,
	email varchar(42) not null,
	CHECK (contact_no>0),
	CONSTRAINT addressFK FOREIGN KEY (address_id)
	REFERENCES address(address_id),
	CONSTRAINT person_loginFK FOREIGN KEY (email)
	REFERENCES login(email)
);

-- creating table Company
CREATE TABLE company(
	company_id char(18) not null primary key,
	name varchar(100) not null,
	office_no int(9) unsigned not null,
	mobile_no int(10) unsigned not null,
	join_date date not null,
	types varchar(10) not null,
	address_id int unsigned  not null,
	person_id char(18) not null,
	email varchar(42) not null,
	CONSTRAINT company_addressFK FOREIGN KEY (address_id)
	REFERENCES address(address_id),
	CONSTRAINT company_personFK FOREIGN KEY (person_id)
	REFERENCES person(person_id),
	CONSTRAINT company_loginFK FOREIGN KEY (email)
	REFERENCES login(email)
);

--creating table account_transcation holds data for merchant and agent
CREATE TABLE account_transcation(
	transcation_id int not null auto_increment primary key,
	deposited float(9) not null,
	issued float(9) not null,
	total float(9) not null,
	dates date not null,
	company_id char(18) not null,
	person_id char(18) not null,
	CHECK (deposited>0 and issued>0 and total>0),
	CONSTRAINT account_transcation_companyFK FOREIGN KEY (company_id)
	REFERENCES company(company_id),
	CONSTRAINT account_transcation_personFK FOREIGN KEY (person_id)
	REFERENCES person(person_id)
);

--creating table company_transcation to change many-to-many relation to
-- one-to-one relation between table company and account_transcation
CREATE TABLE company_transcation(
	company_id char(18) not null,
	transcation_id int not null,
	CONSTRAINT company_transcation_companyFK FOREIGN KEY (company_id)
	REFERENCES company(company_id),
	CONSTRAINT company_transcation_account_transcationFK FOREIGN KEY (transcation_id)
	REFERENCES account_transcation(transcation_id)
);

--creating table category that holds data of different category
CREATE TABLE category(
	category_id int unsigned not null auto_increment primary key,
	name varchar(25) not null
);

--creating table merchant_category to change many-to-many relation to
-- one-to-one relation between table person and category
CREATE TABLE merchant_category(
	company_id char(18) not null,
	category_id int unsigned not null,
	CONSTRAINT merchant_category_companyFK FOREIGN KEY (company_id)
	REFERENCES company(company_id),
	CONSTRAINT merchant_category_categoryFK FOREIGN KEY (category_id)
	REFERENCES category(category_id)
);

--creating table image that holds images
CREATE TABLE image(
	image_id int unsigned not null auto_increment primary key,
	cover_image blob,
	image1 blob,
	image2 blob
);

--creating table deal that holds data for different deals
CREATE TABLE deal(
	deal_id char(18) not null primary key,
	name varchar(100) not null,
	actual_price int(9) unsigned not null,
	offered_price int(9) unsigned not null,
	paid_price int(9) unsigned not null,
	final_price int(9) unsigned not null,
	start_date date not null,
	end_date date not null,
	minimum_purchase_requirement int(3) unsigned not null,
	maximum_purchase_requirement int(3) unsigned not null,
	coupon_start_date date not null,
	coupon_end_date date not null,
	company_id char(18) not null,
	category_id int unsigned not null,
	image_id int unsigned not null,
	person_id char(18) not null,
	CONSTRAINT deal_companyFK FOREIGN KEY (company_id)
	REFERENCES company(company_id),
	CONSTRAINT deal_categoryFK FOREIGN KEY (category_id)
	REFERENCES category(category_id),
	CONSTRAINT deal_imageFK FOREIGN KEY (image_id)
	REFERENCES image(image_id),
	CONSTRAINT deal_personFK FOREIGN KEY (person_id)
	REFERENCES person(person_id),
	CHECK (actual_price >0 and offered_price>0 and paid_price > 0 and final_price > 0 and minimum_purchase_requirement > 0 and maximum_purchase_requirement > 0)
);

--creating table coupon that holds data for coupons
CREATE TABLE coupon(
	coupon_no char(18) not null primary key,
	deal_id char(18) not null,
	person_id char(18) not null,
	CONSTRAINT coupon_dealFK FOREIGN KEY (deal_id)
	REFERENCES deal(deal_id),
	CONSTRAINT coupon_personFK FOREIGN KEY (person_id)
	REFERENCES person(person_id)
);