/******************************************************************************\
	ADMIN
\******************************************************************************/

DROP   TABLE IF     EXISTS admins;
CREATE TABLE IF NOT EXISTS admins
(
	admin_id         INT          UNSIGNED   NOT NULL AUTO_INCREMENT,
	admin_first_name VARCHAR(256) DEFAULT '' NOT NULL               ,
	admin_last_name  VARCHAR(256) DEFAULT '' NOT NULL               ,
	admin_email      VARCHAR(256) DEFAULT '' NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (admin_id)
);

-- Default admin accounts
INSERT INTO admins
	VALUES
		(DEFAULT, 'Admin', 'AZZH', 'zhuz0010@e.ntu.edu.sg', CURRENT_TIMESTAMP, NULL),
		(DEFAULT, 'Admin', 'Cleo', 'cleo0002@e.ntu.edu.sg', CURRENT_TIMESTAMP, NULL);

DROP   TABLE IF     EXISTS auth_admin;
CREATE TABLE IF NOT EXISTS auth_admin
(
	auth_id       INT      UNSIGNED NOT NULL AUTO_INCREMENT,
	admin_id      INT      UNSIGNED NOT NULL               ,
	auth_email    CHAR(32)          NOT NULL               ,
	auth_password CHAR(32)          NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (auth_id),
	FOREIGN KEY (admin_id) REFERENCES admins(admin_id) ON DELETE CASCADE
);

-- Default admin auth
INSERT INTO auth_admin
	VALUES
		-- zhuz0010@e.ntu.edu.sg || password1
		(DEFAULT, 1, 'a8bca5419b2a21ba18a8233019c170ec', '7c6a180b36896a0a8c02787eeafb0e4c', CURRENT_TIMESTAMP, NULL),
		-- cleo0002@e.ntu.edu.sg || password2
		(DEFAULT, 2, 'ef4a3460902f386f89050450493bebcf', '6cb75f652a9b52798eb6cf2201057c73', CURRENT_TIMESTAMP, NULL);


/******************************************************************************\
	CUSTOMERS
\******************************************************************************/

DROP   TABLE IF     EXISTS customers;
CREATE TABLE IF NOT EXISTS customers
(
	customer_id         INT UNSIGNED            NOT NULL AUTO_INCREMENT,
	customer_first_name VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_last_name  VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_email      VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_address_1  VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_address_2  VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_city       VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_country    VARCHAR(256) DEFAULT '' NOT NULL               ,
	customer_postal     INT UNSIGNED DEFAULT 0  NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (customer_id)
);

-- Test customer
INSERT INTO customers
	VALUES
		(DEFAULT, 'Customer', 'Test', 'customer@test.com', 'Address 1', 'Address 2', 'SG', 'SG', 111111, CURRENT_TIMESTAMP, NULL);

DROP   TABLE IF     EXISTS auth_customers;
CREATE TABLE IF NOT EXISTS auth_customers
(
	auth_id       INT      UNSIGNED NOT NULL AUTO_INCREMENT,
	customer_id   INT      UNSIGNED NOT NULL               ,
	auth_email    CHAR(32)          NOT NULL               ,
	auth_password CHAR(32)          NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (auth_id),
	FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Test customer auth
INSERT INTO auth_customers
	VALUES
		(DEFAULT, 1, '5b27f0c7078f0861d364ccb34094ba44', '5f4dcc3b5aa765d61d8327deb882cf99', CURRENT_TIMESTAMP, NULL);


/******************************************************************************\
	CUSTOMER FEEDBACK
\******************************************************************************/

DROP   TABLE IF     EXISTS feedbacks;
CREATE TABLE IF NOT EXISTS feedbacks
(
	feedback_id      INT UNSIGNED            NOT NULL AUTO_INCREMENT,
	feedback_name    CHAR(128)    DEFAULT '' NOT NULL               ,
	feedback_email   VARCHAR(256) DEFAULT '' NOT NULL               ,
	feedback_type    CHAR(128)    DEFAULT '' NOT NULL               ,
	feedback_message TEXT         DEFAULT '' NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (feedback_id),
);

-- Test feedback entry
INSERT INTO customer_feedbacks
	VALUES
		(DEFAULT, 'Test', 'test@customer.com', 'general', 'message', CURRENT_TIMESTAMP, NULL);


/******************************************************************************\
	SALES
\******************************************************************************/

DROP   TABLE IF     EXISTS sale_statuses;
CREATE TABLE IF NOT EXISTS sale_statuses
(
	sale_status_id TINYINT     UNSIGNED NOT NULL AUTO_INCREMENT,
	sale_status    VARCHAR(64)          NOT NULL               ,

	PRIMARY KEY (sale_status_id)
);

-- Sales statuses
INSERT INTO sale_statuses (sale_status)
	VALUES
		('Pending confirmation'),
		('Pending payment')     ,
		('Payment received')    ,
		('Shipping')            ,
		('Completed')           ;

DROP   TABLE IF     EXISTS sales;
CREATE TABLE IF NOT EXISTS sales
(
	sale_id          INT      UNSIGNED NOT NULL AUTO_INCREMENT,
	sale_status_id   TINYINT  UNSIGNED NOT NULL               ,
	sale_amount      DEC(9,2) UNSIGNED NOT NULL               ,
	sale_amount_paid DEC(9,2) UNSIGNED                        ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,
	paid_at    TIMESTAMP                                ,

	PRIMARY KEY (sale_id),
	FOREIGN KEY (sale_status_id) REFERENCES sale_statuses(sale_status_id)
);

-- Sample sales
INSERT INTO sales
	VALUES
		(DEFAULT, 1, 0,     0,     CURRENT_TIMESTAMP, NULL, NULL),
		(DEFAULT, 1, 1.11,  1.11,  CURRENT_TIMESTAMP, NULL, NULL),
		-- TEST IF CAN ACCEPT NEGATIVE
		(DEFAULT, 1, -1.11,  -1.11,  CURRENT_TIMESTAMP, NULL, NULL),
		(DEFAULT, 1, 2.22,  1.11,  CURRENT_TIMESTAMP, NULL, NULL),
		(DEFAULT, 1, 3.33,  1.55,  CURRENT_TIMESTAMP, NULL, NULL),
		(DEFAULT, 1, 9.999, 5.555, CURRENT_TIMESTAMP, NULL, NULL);


/******************************************************************************\
	PRODUCT META
\******************************************************************************/

DROP   TABLE IF     EXISTS categories;
CREATE TABLE IF NOT EXISTS categories
(
	category_id    SMALLINT     UNSIGNED    NOT NULL AUTO_INCREMENT,
	product_gender CHAR(1)      DEFAULT 'M' NOT NULL               ,
	product_class  VARCHAR(256) DEFAULT ''  NOT NULL               ,
	product_type   VARCHAR(256) DEFAULT ''  NOT NULL               ,

	PRIMARY KEY (category_id)
);

-- Sample categories
INSERT INTO categories
	VALUES
		(DEFAULT, 'M', 'Top'     , 'T-shirt'),
		(DEFAULT, 'M', 'Bottom'  , 'Jeans'),
		(DEFAULT, 'M', 'Footwear', 'Sneakers'),
		(DEFAULT, 'M', 'Watch'   , 'Mechanical'),
		(DEFAULT, 'F', 'Top'     , 'T-shirt'),
		(DEFAULT, 'F', 'Bottom'  , 'Jeans'),
		(DEFAULT, 'F', 'Footwear', 'Sneakers'),
		(DEFAULT, 'F', 'Watch'   , 'Mechanical');

DROP   TABLE IF     EXISTS brands;
CREATE TABLE IF NOT EXISTS brands
(
	brand_id    INT          UNSIGNED   NOT NULL AUTO_INCREMENT,
	brand_name  VARCHAR(256) DEFAULT '' NOT NULL               ,

	PRIMARY KEY (brand_id)
);

-- Sample brands
INSERT INTO brands
	VALUES
		(DEFAULT, 'OEM'),
		(DEFAULT, 'Nike'),
		(DEFAULT, 'Adidas'),
		(DEFAULT, 'Puma'),
		(DEFAULT, 'Zara'),
		(DEFAULT, 'H&M'),
		(DEFAULT, 'Charles & Keith');

DROP   TABLE IF     EXISTS sizing_types;
CREATE TABLE IF NOT EXISTS sizing_types
(
	sizing_type_id TINYINT     UNSIGNED   NOT NULL AUTO_INCREMENT,
	sizing_type    VARCHAR(16) DEFAULT '' NOT NULL               ,

	PRIMARY KEY (sizing_type_id)
);

-- Sizing types
INSERT INTO sizing_types
	VALUES
		(DEFAULT, 'N/A'),
		(DEFAULT, 'top_sizes'),
		(DEFAULT, 'bottom_sizes'),
		(DEFAULT, 'shoe_sizes');

DROP   TABLE IF     EXISTS top_sizes;
CREATE TABLE IF NOT EXISTS top_sizes
(
	size_id    INT         UNSIGNED   NOT NULL AUTO_INCREMENT,
	size_value VARCHAR(16) DEFAULT '' NOT NULL               ,

	PRIMARY KEY (size_id)
);

-- Sample top sizes
INSERT INTO top_sizes
	VALUES
		(DEFAULT, 'XXS'),
		(DEFAULT, 'XS'),
		(DEFAULT, 'S'),
		(DEFAULT, 'M'),
		(DEFAULT, 'L'),
		(DEFAULT, 'XL'),
		(DEFAULT, 'XXL');

DROP   TABLE IF     EXISTS bottom_sizes;
CREATE TABLE IF NOT EXISTS bottom_sizes
(
	size_id    INT         UNSIGNED   NOT NULL AUTO_INCREMENT,
	size_value VARCHAR(16) DEFAULT '' NOT NULL               ,

	PRIMARY KEY (size_id)
);

-- Sample bottom sizes
INSERT INTO bottom_sizes
	VALUES
		(DEFAULT, 'XXS'),
		(DEFAULT, 'XS'),
		(DEFAULT, 'S'),
		(DEFAULT, 'M'),
		(DEFAULT, 'L'),
		(DEFAULT, 'XL'),
		(DEFAULT, 'XXL');

DROP   TABLE IF     EXISTS shoe_sizes;
CREATE TABLE IF NOT EXISTS shoe_sizes
(
	size_id    INT        UNSIGNED   NOT NULL AUTO_INCREMENT,
	size_value VARCHAR(16) DEFAULT '' NOT NULL               ,

	PRIMARY KEY (size_id)
);

-- Sample shoe sizes
INSERT INTO shoe_sizes
	VALUES
		(DEFAULT, 'US 4'),
		(DEFAULT, 'US 5'),
		(DEFAULT, 'US 6'),
		(DEFAULT, 'US 7'),
		(DEFAULT, 'US 8'),
		(DEFAULT, 'US 9'),
		(DEFAULT, 'US 10'),
		(DEFAULT, 'US 11'),
		(DEFAULT, 'US 12');


/******************************************************************************\
	PRODUCT
\******************************************************************************/

DROP   TABLE IF     EXISTS products;
CREATE TABLE IF NOT EXISTS products
(
	product_id          INT          UNSIGNED              NOT NULL AUTO_INCREMENT,
	product_brand       INT          UNSIGNED DEFAULT 1    NOT NULL               ,
	product_category    SMALLINT     UNSIGNED              NOT NULL               ,
	product_name        VARCHAR(256)          DEFAULT ''   NOT NULL               ,
	product_description TEXT                  DEFAULT ''   NOT NULL               ,
	sizing_type         TINYINT      UNSIGNED DEFAULT 1    NOT NULL               ,
	product_price       DECIMAL(9,2) UNSIGNED DEFAULT 1000 NOT NULL               ,
	active_for_sale     BOOLEAN               DEFAULT 0    NOT NULL               ,
	is_featured         BOOLEAN               DEFAULT 0    NOT NULL               ,
	is_new              BOOLEAN               DEFAULT 0    NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (product_id),
	FOREIGN KEY (product_brand)    REFERENCES brands(brand_id),
	FOREIGN KEY (product_category) REFERENCES categories(category_id),
	FOREIGN KEY (sizing_type)      REFERENCES sizing_types(sizing_type_id)
);

DROP   TABLE IF     EXISTS stocks;
CREATE TABLE IF NOT EXISTS stocks
(
	product_id INT UNSIGNED           NOT NULL,
	stock_qty  INT UNSIGNED DEFAULT 0 NOT NULL,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (product_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

DROP   TABLE IF     EXISTS product_sales;
CREATE TABLE IF NOT EXISTS product_sales
(
	product_sale_id INT      UNSIGNED           NOT NULL AUTO_INCREMENT,
	sale_id         INT      UNSIGNED           NOT NULL               ,
	customer_id     INT      UNSIGNED           NOT NULL               ,
	product_id      INT      UNSIGNED           NOT NULL               ,
	sale_qty        INT      UNSIGNED DEFAULT 0 NOT NULL               ,
	sale_unit_price DEC(9,2) UNSIGNED DEFAULT 0 NOT NULL               ,
	sale_price      DEC(9,2) UNSIGNED DEFAULT 0 NOT NULL               ,
	total           DEC(9,2) UNSIGNED DEFAULT 0 NOT NULL               ,

	created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
	updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

	PRIMARY KEY (product_sale_id),
	FOREIGN KEY (sale_id)    REFERENCES sales(sale_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id)
);


-- -- Maybe should remove colours
-- DROP   TABLE IF     EXISTS colours;
-- CREATE TABLE IF NOT EXISTS colours
-- (
-- 	colour_id   INT         UNSIGNED   NOT NULL AUTO_INCREMENT,
-- 	product_id  INT         UNSIGNED   NOT NULL               ,
-- 	colour_name VARCHAR(64) DEFAULT '' NOT NULL               ,

-- 	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

-- 	PRIMARY KEY (colour_id),
-- 	FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
-- );

-- -- Sales statuses
-- INSERT INTO products
-- 	VALUES
-- 		(DEFAULT, 'Nike DryFit Classic Tee',         'lorem ipsum', 2, 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Nike DryFit Classic Sweat Pants', 'lorem ipsum', 2, 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Nike Lunar Run',                  'lorem ipsum', 2, 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Seiko SKX007',                    'lorem ipsum', 1, 1, 1, 200, 1, CURRENT_TIMESTAMP, NULL);

-- -- Sales statuses
-- INSERT INTO products
-- 	VALUES
-- 		(DEFAULT, 'Nike DryFit Tee Black', 'Lorem ipsum', 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Nike DryFit Classic Sweat Pants Black', 'Lorem ipsum', 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Adidas Ultraboost 20', 'Lorem ipsum', 1, 200, 1, CURRENT_TIMESTAMP, NULL),
-- 		(DEFAULT, 'Adidas Ultraboost 20', 'Lorem ipsum', 1, 200, 1, CURRENT_TIMESTAMP, NULL);



/******************************************************************************\
	USER TRACKING
\******************************************************************************/

-- DROP   TABLE IF     EXISTS trackings;
-- CREATE TABLE IF NOT EXISTS trackings
-- (
-- 	tracking_id         INT UNSIGNED NOT NULL AUTO_INCREMENT,
-- 	customer_id         INT UNSIGNED NOT NULL,
-- 	tracking_session_id INT UNSIGNED NOT NULL,
-- 	-- tracking_stats

-- 	PRIMARY KEY (tracking_id),
-- 	FOREIGN KEY (customer_id)
-- );

-- DROP   TABLE IF     EXISTS recommendations;
-- CREATE TABLE IF NOT EXISTS recommendations
-- (
-- 	customer_id INT      UNSIGNED           NOT NULL,
-- 	weight_1    FLOAT(5) UNSIGNED DEFAULT 0 NOT NULL,

-- 	PRIMARY KEY (customer_id)
-- );
