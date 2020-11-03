SET FOREIGN_KEY_CHECKS=0;

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
        (DEFAULT, 'admin', 'test', 'admin@cleoandazzh.com', CURRENT_TIMESTAMP, NULL);


DROP   TABLE IF     EXISTS auth_admin;
CREATE TABLE IF NOT EXISTS auth_admin
(
    auth_id       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    admin_id      INT UNSIGNED NOT NULL               ,
    auth_email    CHAR(32)     NOT NULL               ,
    auth_password CHAR(32)     NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (auth_id),
    FOREIGN KEY (admin_id) REFERENCES admins(admin_id) ON DELETE CASCADE
);

-- Default admin auth
INSERT INTO auth_admin
    VALUES
        -- admin@cleoandazzh.com | password
        (
            DEFAULT,
            1,
            '3a8c5766482e22266348852ec4073aab',
            '5f4dcc3b5aa765d61d8327deb882cf99',
            CURRENT_TIMESTAMP,
            NULL
        );



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
    customer_country    VARCHAR(256) DEFAULT '' NOT NULL               ,
    customer_city       VARCHAR(256) DEFAULT '' NOT NULL               ,
    customer_postal     INT UNSIGNED DEFAULT 0  NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (customer_id)
);

-- Test customer
INSERT INTO customers
    VALUES
        (
            DEFAULT            ,
            'John'             ,
            'Doe'              ,
            'customer@test.com',
            '123 Apple Street' ,
            '#18-3-474'        ,
            'Chiang Mai'       ,
            'Thailand'         ,
            123456             ,
            CURRENT_TIMESTAMP  ,
            NULL
        );


DROP   TABLE IF     EXISTS auth_customers;
CREATE TABLE IF NOT EXISTS auth_customers
(
    auth_id       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    customer_id   INT UNSIGNED NOT NULL               ,
    auth_email    CHAR(32)     NOT NULL               ,
    auth_password CHAR(32)     NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (auth_id),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Test customer auth
INSERT INTO auth_customers
    VALUES
        (
            DEFAULT,
            1,
            '5b27f0c7078f0861d364ccb34094ba44',
            '5f4dcc3b5aa765d61d8327deb882cf99',
            CURRENT_TIMESTAMP,
            NULL
        );



/******************************************************************************\
    CUSTOMER FEEDBACK
\******************************************************************************/

DROP   TABLE IF     EXISTS feedbacks;
CREATE TABLE IF NOT EXISTS feedbacks
(
    feedback_id      INT UNSIGNED            NOT NULL AUTO_INCREMENT,
    feedback_name    CHAR(128)    DEFAULT '' NOT NULL               ,
    feedback_email   VARCHAR(128) DEFAULT '' NOT NULL               ,
    feedback_type    CHAR(128)    DEFAULT '' NOT NULL               ,
    feedback_message TEXT         DEFAULT '' NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (feedback_id)
);



/******************************************************************************\
    SALES
\******************************************************************************/

DROP   TABLE IF     EXISTS sales;
CREATE TABLE IF NOT EXISTS sales
(
    sale_id          INT      UNSIGNED NOT NULL AUTO_INCREMENT,
    sale_amount      DEC(9,2) UNSIGNED NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (sale_id)
);


INSERT INTO sales
    VALUES
        (DEFAULT, 18.75,    '2020-02-23 06:38:24', NULL),
        (DEFAULT, 218.80,   '2020-03-13 06:38:24', NULL),
        (DEFAULT, 3218.70,  '2020-07-13 06:38:24', NULL),
        (DEFAULT, 2018.35,  '2020-06-13 06:38:24', NULL),
        (DEFAULT, 12018.77, '2020-08-13 06:38:24', NULL),
        (DEFAULT, 2217.32,  '2020-09-01 06:38:38', NULL),
        (DEFAULT, 1217.13,  '2020-10-02 06:38:38', NULL),
        (DEFAULT, 7230.44,  '2020-11-02 06:24:37', NULL);



/******************************************************************************\
    PRODUCT META
\******************************************************************************/

DROP   TABLE IF     EXISTS categories;
CREATE TABLE IF NOT EXISTS categories
(
    category_id    SMALLINT     UNSIGNED    NOT NULL,
    product_gender CHAR(1)      DEFAULT 'M' NOT NULL,
    product_class  VARCHAR(256) DEFAULT ''  NOT NULL,
    product_type   VARCHAR(256) DEFAULT ''  NOT NULL,

    PRIMARY KEY (category_id)
);

-- Sample categories
INSERT INTO categories
    VALUES
        (111, "m", "top",         "t-shirt"),
        (112, "m", "top",         "shirt"),
        (113, "m", "top",         "jacket"),
        (114, "m", "top",         "coat"),
        (121, "m", "bottom",      "jeans"),
        (122, "m", "bottom",      "pants"),
        (123, "m", "bottom",      "joggers"),
        (124, "m", "bottom",      "shorts"),
        (131, "m", "footwear",    "dress shoes"),
        (132, "m", "footwear",    "sneakers"),
        (133, "m", "footwear",    "sandals"),
        (134, "m", "footwear",    "sports shoes"),
        (151, "m", "accessories", "tie"),
        (152, "m", "accessories", "watch"),
        (153, "m", "accessories", "cuff links"),
        (154, "m", "accessories", "hats"),
        (155, "m", "accessories", "bags"),
        (211, "f", "top",         "blouse"),
        (212, "f", "top",         "t-shirt"),
        (213, "f", "top",         "cardigan"),
        (214, "f", "top",         "jacket"),
        (215, "f", "top",         "sports tops"),
        (221, "f", "bottom",      "jeans"),
        (222, "f", "bottom",      "yoga pants"),
        (223, "f", "bottom",      "sports shorts"),
        (224, "f", "bottom",      "skirts"),
        (225, "f", "bottom",      "pants"),
        (231, "f", "footwear",    "flats"),
        (232, "f", "footwear",    "heels"),
        (233, "f", "footwear",    "platforms"),
        (234, "f", "footwear",    "wedges"),
        (241, "f", "overall",     "dress"),
        (242, "f", "overall",     "full length coat"),
        (243, "f", "overall",     "rompers"),
        (251, "f", "accessories", "earrings"),
        (252, "f", "accessories", "necklaces"),
        (253, "f", "accessories", "hats"),
        (254, "f", "accessories", "bags"),
        (255, "f", "accessories", "decoratives");


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
    size_id    INT         UNSIGNED   NOT NULL AUTO_INCREMENT,
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
    product_category    SMALLINT     UNSIGNED              NOT NULL               ,
    product_brand       VARCHAR(256)          DEFAULT ''   NOT NULL               ,
    product_name        VARCHAR(256)          DEFAULT ''   NOT NULL               ,
    product_description TEXT                  DEFAULT ''   NOT NULL               ,
    sizing_type         TINYINT      UNSIGNED DEFAULT 1    NOT NULL               ,
    product_price       DECIMAL(9,2) UNSIGNED DEFAULT 1000 NOT NULL               ,
    is_active           BOOLEAN               DEFAULT 0    NOT NULL               ,
    is_featured         BOOLEAN               DEFAULT 0    NOT NULL               ,
    is_new              BOOLEAN               DEFAULT 0    NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (product_id),
    FOREIGN KEY (product_category) REFERENCES categories(category_id),
    FOREIGN KEY (sizing_type)      REFERENCES sizing_types(sizing_type_id)
);


-- Sample products
INSERT INTO products
    VALUES
(	25302	,	253	,	"Gucci"	,	"GG lame baseball hat"	,	"A sparkling version of the House's emblematic monogram animates this baseball hat in white and silver GG lame. First used in the 1970s, the GG logo was an evolution of the original Gucci rhombi design from the 1930s. The sparkling material's retro appeal adds a bon ton influence to a contemporary shape, reflecting the House's hybrid spirit."	,	1	,	29.02	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	25202	,	252	,	"Dior"	,	"30 Montaigne Choker Necklace"	,	"The 'CD' ribbon choker is part of the iconic 30 Montaigne collection featuring a range of classic easy to wear pieces. The black grosgrain ribbon choker has an iconic 'CD' signature charm in an antique gold finish. An iconic House piece, it can be worn with a feminine dress."	,	1	,	961.89	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	25402	,	254	,	"Dior"	,	"30 Montaigne Chain Bag"	,	"The 30 Montaigne line, inspired by the historic, emblematic address, presents essential pieces that portray the iconic codes of the House. This handbag is crafted in metallic gold calfskin imprinted with Microcannage texture for an elegant and timeless look. The flap is embellished with a pale gold-finish metal 'CD' clasp, inspired by the seal of a Christian Dior perfume bottle."	,	1	,	285.13	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	25502	,	255	,	"Dior"	,	"30 Montaigne Case for AirPods Pro"	,	"The case for the AirPods Pro, crafted in blue Dior Oblique jacquard with topstitched leather edges, is an elegant storage accessory. An ideal piece for transporting headphones, it features a leather strap and a zipped closure adorned with the 'CD' signature. The case may be attached to a 30 Montaigne bag handle for a coordinated look."	,	1	,	516.12	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	25501	,	255	,	"Dior"	,	"Lady Dior Cover for iPhone 11 Pro Max"	,	"The dark denim blue cover for the iPhone 11 Pro Max is crafted from sumptuous lambskin with a Cannage motif. A chain allows it to be worn around the neck, while the 'D.I.O.R.' charm that accents the chain highlights one of the Lady Dior line's signature elements."	,	1	,	493.59	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	25401	,	254	,	"Dior"	,	"Small Dior Bobby Bag"	,	"The Dior Bobby is a hobo style showcasing sophisticated lines and harmonious proportions. The small shape is crafted from textured and flexible beige shearling, and features antique gold-finish metal hardware. Its removable and adjustable shoulder strap has a military-inspired buckle, and allows it to be carried by hand, worn over the shoulder or crossbody."	,	1	,	171.33	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	25102	,	251	,	"Dior"	,	"Dior Tribales Earrings"	,	"The emblematic Dior Tribales earrings are reimagined in miniature form. The signature resin pearls support two gold-finish chains, adorned with crystals, a crystal star and a 'CD' charm. Delicate and bold, they will add a contrasted touch to relaxed daily attire and will elevate evening looks."	,	1	,	303.46	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	25101	,	251	,	"Dior"	,	"J'Adior Earrings"	,	"The J'Adior ear crawlers use signature details on a new shape. Anchored by a crystal-studded heart, the iconic 'J'Adior' has an innovative shape that climbs up the ear. Pretty and statement-making, the antique gold-finish crawlers look best when dressed up with sophisticated evening wear."	,	1	,	115.07	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	25201	,	252	,	"Dior"	,	"CD Navy Necklace"	,	"The necklace is part of the new CD Navy line. The gold-finish metal links are crafted of a minimalist version of the 'CD' signature, and are finished with a toggle clasp at the front. Modern and sleek, this necklace can be paired with other CD Navy styles."	,	1	,	464.39	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	25301	,	253	,	"Zara"	,	"BAND TRIM WOVEN HAT"	,	"Woven hat with wide brim and matching band."	,	1	,	740.53	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15402	,	154	,	"Givenchy"	,	"Paris logo-embroidered beanie hat"	,	"A beanie with a little extra. This piece from Givenchy is here to wrap you up in style. Keep warm, look hot."	,	1	,	311.86	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	15302	,	153	,	"Tateossian"	,	"Globe cage' cufflinks"	,	"Blue rhodium plated sterling silver 'Globe cage' cufflinks from Tateossian. Made in United Kingdom."	,	1	,	300.81	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15502	,	155	,	"Thom Browne"	,	"Business Bag in Black Pebble Grain"	,	"If you're looking to elevate your workwear game, then this bag means business. Featuring a pebbled leather texture, round top handles, a detachable and adjustable shoulder strap, a hanging luggage tag, a front embossed logo stamp, a front slip pocket, a back slip pocket, a top zip fastening and RWB tab to the front. "	,	1	,	806.79	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15401	,	154	,	"Givenchy"	,	"logo-print baseball cap"	,	"Master the art of hiding in plain sight with this baseball cap from Givenchy. Whether you're dodging a certain someone or just looking to fly under the radar, this piece makes the perfect partner in crime. Just pair with a newspaper with eye-hole cut-outs."	,	1	,	437	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	15301	,	153	,	"Versace"	,	"Medusa head cufflinks"	,	"The Italian brand's Medusa head rests at the centre of these textured cufflinks. Supported by a gleaming gold-tone plating, these Medusa head cufflinks will make a cool addition to any man's outfit."	,	1	,	198.95	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15201	,	152	,	"Tissot"	,	"TISSOT GENTLEMAN"	,	"The Tissot Gentleman is a multi-purpose watch, both ergonomic and elegant in any circumstance. It is equally suitable for wearing in a business environment, where conventional dress codes apply, as at the weekend, when it adapts easily to leisure activities."	,	1	,	76.77	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	15202	,	152	,	"Tissot"	,	"TISSOT SEASTAR 1000"	,	"The Tissot Seastar 1000 merges style and performance without compromising either. The diving inspiration shapes both the appearance and the functionality of this watch. It maintains its performance to a pressure of 30 bar (300m/1,000ft), combining underwater sports and a preference for a sophisticated Swiss timepiece."	,	1	,	158.96	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15501	,	155	,	"Saint Laurent"	,	"City backpack"	,	"This black logo zipped backpack from Saint Laurent features a top handle, adjustable shoulder straps, a two way zip fastening, a front zip fastening, leather trims, a leather logo patch to the back and a silver-tone logo detail to the front."	,	1	,	667.45	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	15102	,	151	,	"Hermes"	,	"Tie 7 Horseshoes tie"	,	"Tie in hand-sewn heavy silk (100% silk). Four-leaf clover or horseshoe? Which of the motifs hiding behind our tie 7s will be your lucky charm? Made in France."	,	1	,	369.6	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	15101	,	151	,	"Hermes"	,	"Tie 7 Tete au Carre tie"	,	"Tie in hand-sewn silk twill (100% silk). A tie made for an equestrian tete-a-tete. Made in France. Designed by Philippe Mouquet."	,	1	,	349.8	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22302	,	223	,	"Adidas"	,	"Mesh Shorts"	,	"All about versatility, these adidas shorts are game for your styling explorations. That means total playtime. Slip on a metallic bodysuit, clash with wild patterns and colours or just keep it simple in monochrome. There are no limits or rules with these shorts."	,	3	,	681.91	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22101	,	221	,	"Zara"	,	"HI-RISE VINTAGE SKINNY JEANS TRF"	,	"Faded hi-rise jeans made of stretchy fabric with holding power technology. Featuring a vintage style, five-pocket design and zip fly and metal top button fastening."	,	3	,	853.04	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22102	,	221	,	"Zara"	,	"Z1975 JEANS WITH SLIPT HEMS"	,	"Faded high-waist jeans with a five-pocket design. Flared raw-cut hems with side vents. Zip fly and metal top button fastening."	,	3	,	952.42	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22402	,	224	,	"Dorothy Perkins"	,	"Cord Cotton Blend Skirt"	,	"Green Cord Skirt With Front Pocket Detailing. 98% Cotton, 2% Elastane."	,	3	,	408.24	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22401	,	224	,	"Dorothy Perkins"	,	"Luxe Jacquard Skirt"	,	"Jacquard Prom Skirt With Zip Back. Wearing Length Is 73Cm. 56% Polyester, 23% Nylon, 21% Metallised Fibre."	,	3	,	88.99	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	22202	,	222	,	"Puma"	,	"Logo High Waist 7/8 Women's Training Leggings"	,	"Make your training staples statement pieces with our Logo High Waist 7/8 Training Leggings. These trendy bottoms feature a cheeky 7/8 length and an ultra high-rise waistline, so you can be sure that no matter how you move, these tights will move with you."	,	3	,	346.96	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22501	,	225	,	"Dorothy Perkins"	,	"Grid Checked Ankle Grazers"	,	"Pink Grid Checked Ankle Grazer Trousers With Side Back Pocket Detail And Split Hem Detail. 64% Polyester, 34% Viscose, 2% Elastane."	,	3	,	978.18	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	22502	,	225	,	"Dorothy Perkins"	,	"Shimmer Tailored Trousers"	,	"Shimmer Fabric Tailored Trousers With Belt, Side Pockets And Front Fly Opening. 84% Viscose, 16% Polyester."	,	3	,	743.21	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	22201	,	222	,	"Nike"	,	"Nike Sculpt Icon Clash"	,	"The Nike Sculpt Icon Clash Leggings are made from soft knit fabric that has minimal seam lines for a smooth, sculpted look. Sweat-wicking power helps you stay dry and comfortable."	,	3	,	256.79	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	22301	,	223	,	"Adidas"	,	"3-Stripes Shorts"	,	"Why mess with a good thing? Rooted in sport, the adidas 3-Stripes Shorts celebrate their heritage with a classic look. Because sometimes simple is what stands out the most."	,	3	,	135.99	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	12102	,	121	,	"Abercrombie & Fitch"	,	"Straight Jeans"	,	"Classic stretch jeans in a white wash with straight fit through hip and thigh."	,	3	,	64.1	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	12302	,	123	,	"Abercrombie & Fitch"	,	"The A&F Denim Jogger"	,	"Denim jogger in light wash with elastic waist and cuffs. Includes functional drawstrings, pockets. This product utilizes Repreve Fiber made from 5 recycled bottles to create an eco-friendly garment."	,	3	,	160.46	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	12301	,	123	,	"Abercrombie & Fitch"	,	"Cargo Joggers"	,	"Lightweight joggers in a comfortable stretch fabric with self-cuff detail, cargo pockets and drawstring waist."	,	3	,	287.29	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	12201	,	122	,	"Abercrombie & Fitch"	,	"Traveler Skinny 5-Pocket Pants"	,	"Our Traveler pants in a skinny fit and 5-pocket construction with a tapered leg and shorter length that's designed to hit right at the top of the shoe. Featuring a concealed coil zipper pocket on the back pocket big enough to store your phone, passport or boarding pass."	,	3	,	643.24	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	12101	,	121	,	"Abercrombie & Fitch"	,	"Athletic Skinny Jeans"	,	"Previously our athletic slim fit, the silhouette is roomy through the thigh and tapered toward the ankle with refined details for a look and feel that's better than ever. Built-in stretch provides comfort and flexibility. FYI: Product tag may still be labeled as athletic slim."	,	3	,	534.61	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	12202	,	122	,	"Abercrombie & Fitch"	,	"Skinny Chinos"	,	"Previously our slim fit, the silhouette is the slim from top to bottom with refined details for a look and feel that's better than ever. Built-in stretch provides comfort and flexibility. Leg opening circumference 14 inches. FYI: Product tag may still be labeled as slim. Interior details may vary."	,	3	,	158.57	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	12402	,	124	,	"DIOR"	,	"DIOR AND SHAWN Track Shorts"	,	"The navy blue running shorts feature a DIOR AND SHAWN boucle signature embroidered on the front. They are cut with a mid-rise drawstring waist and fit in a medium length. The shorts can be worn with the matching the track jacket, for a relaxed style."	,	3	,	364.07	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	12401	,	124	,	"Abercrombie & Fitch"	,	"Stretch Chino Shorts"	,	"Trend-forward plainfront shorts in a soft and comfortable fabric with 7"" inseam and pockets."	,	3	,	180.41	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23101	,	231	,	"Charles & Keith"	,	"Gold Buckle Detail Sandals"	,	"A little shine can go a long way in giving your outfit a fresh and modern vibe. Make these chocolate brown gold buckle sandals your new go-tos to top off a casual look."	,	4	,	711.07	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23201	,	232	,	"Charles & Keith"	,	"Two-Tone Cylindrical Heel Sandals"	,	"Crisp and clean with just a hint of colour thanks to the two-tone white-and-brown finish, these heeled sandals are the perfect embodiment of casual elegance. Amp up your chic factor with the head-turning cylindrical heel that is equal parts sturdy and stylish. A classic piece that can see you through the weekdays and into the weekend, we're loving how they look with a silk blouse, a wrap-around maxi skirt and a bucket bag."	,	4	,	233.8	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23301	,	233	,	"Charles & Keith"	,	"Satin V-Cut Slingback Platforms"	,	"Dress to kill in these black sky-high platforms. Featuring a peep toe design to show off your pedicure, reach for them on your next dinner date and top off your look with a v-neck wrap dress."	,	4	,	125.95	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23102	,	231	,	"Charles & Keith"	,	"Textured Ballerina Flats"	,	"Dressing up in the morning cannot not get any easier with these ballerina flats. Rendered in a textured finish that adds refinement to even casual outfits, the taupe colour keeps it effortlessly versatile so as to offer you multiple styling options. A classic piece that every woman needs to have in her wardrobe, let them complete a wide legged trousers and off shoulder blouse ensemble."	,	4	,	985.85	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23401	,	234	,	"Zara"	,	"LEATHER AND JUTE WEDGES"	,	"Ecru leather wedges. Leather upper. Strap across the front and back. Wide ankle strap. Jute-lined wedge. Buckle fastening on the ankle strap."	,	4	,	310.5	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	23202	,	232	,	"Charles & Keith"	,	"Bow Stiletto Pumps"	,	"Put a spring in your step with these lovely stiletto pumps adorning your feet. Decorated with a bow embellishment that offers a delicate feminine touch to your outfits, these gems are sufficiently versatile to be worn everyday no matter the season. Made in black with a sleek stiletto heel that effortlessly elongates your stature, match this pair with a chiffon collared blouse tucked into a plaid pencil skirt for a Monday-ready look."	,	4	,	112.76	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23302	,	233	,	"Aldo"	,	"Lacla Peep Toe Ankle Strap Platform Heels"	,	"Solid tone snake textured strappy platform heels"	,	4	,	566.99	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	23402	,	234	,	"Dior"	,	"D-Dior Wedge Sandal"	,	"The D-Dior wedge sandal offers a striking appearance complete with its 7 cm rope platform. An antique gold-finish signature 'D' buckle and decorative eyelets are featured on its upper while a thick ankle strap displays a leather-covered buckle. Made with off-white calfskin, it can be effortlessly worn during warmer weather occasion."	,	4	,	328.59	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	13301	,	133	,	"Zara"	,	"SPORTY SANDALS WITH AIR CUSHION"	,	"Black sporty sandals. Technical fabric straps on the upper. Chunky sole with raised detail and air cushion. Sporty ankle strap fastening."	,	4	,	508.13	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	13402	,	134	,	"Nike"	,	"Jordan Zoom Trunner Ultimate"	,	"Breathable and ultralight, Jordan Zoom Trunner Ultimate features full-length cushioning and an extra forefoot unit to give you more responsiveness. A diamond-like cage provides side-to-side stability and works with the cushioning to help you feel faster."	,	4	,	910.96	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	13201	,	132	,	"Zara"	,	"LEATHER SNEAKERS"	,	"Dark blue leather sneakers with a split suede finish. Facing with five pairs of eyelets. Contrast white and brown sole. Sporty-casual look."	,	4	,	664.67	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	13202	,	132	,	"New Balance"	,	"Leather 1100"	,	"Featuring an oxford-style silhouette constructed with leather suede, it helps support you through days in the office and busy commutes while offering all-day comfort provided by a performance-inspired EVA midsole and a PU die cut footbed with a leather top."	,	4	,	858.54	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	13302	,	133	,	"Puma"	,	"Leadcat FTR Suede Classic Sandals"	,	"Lead the fashion pack in our Leadcat Sandals, a reinvention of one of our most iconic slides. This new vision of our classic silhouette features an ultra plush moulded footbe."	,	4	,	238.91	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	13102	,	131	,	"Zara"	,	"LEATHER LOAFERS WITH APPLIQUE - LIMITED EDITION"	,	"Leather loafers with contrast colours on the upper. Decorative trim on the instep with metal applique. Chunky black welt sole. Leather insole. Rounded toe."	,	4	,	868.99	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	13401	,	134	,	"Under Armour"	,	"Men's UA HOVR Machina LT Running Shoes"	,	"Run with a clear mind, clear data, and even... clear shoes. Get the energy return and propulsion plate speed of UA HOVR Machina with a translucent top. Connect to UA MapMyRun for coaching tips that bring extra clarity as you run."	,	4	,	36.22	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	13101	,	131	,	"Zara"	,	"SMART BROWN LEATHER SHOES"	,	"Smart brown lace-up shoes made of leather with a shiny finish. Five-eyelet facing. Semi-pointed toe. Classic look."	,	4	,	239.72	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	13203	,	132	,	"New Balance"	,	"Numeric 379 Mid"	,	"The New Balance Numeric NM379 Mid is a resilient skate shoe made to survive the wear-and-tear that comes from choice shredding. Designed for performance first, these shoes have a reinforced upper, impact-resistant insert and durable outsole that provides a close feel between feet and board."	,	4	,	739.55	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	24301	,	243	,	"Megane"	,	"Red Romance Felicity Maxi Romper"	,	"Buttoned romper with cape overlay"	,	2	,	627.11	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	24201	,	242	,	"Zara"	,	"WOOL BLEND CHECK COAT"	,	"Coat in a wool blend. Lapel collar and long sleeves with hook-and-loop cuffs. Front pockets. Side vents at the hem. Double-breasted front with metal button fastening."	,	2	,	928.27	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	24101	,	241	,	"Abercrombie & Fitch"	,	"Ruffle Hem Shirt Dress"	,	"Elevated button-up shirtdress with collared neckline, cuffed long sleeves, ruffle hem, pockets and delicate back tie for the perfect fit."	,	2	,	116.04	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	24302	,	243	,	"L'zzie"	,	"LZZIE CHERRY ROMPER - PINK"	,	"Have a cherry-on-top kinda day with our cute and lovely Cherry Romper! Look dainty and sweet with the unique layered ruffle sleeves and a ribbon-tie around the collar area to exude a sense of femininity and style!"	,	2	,	166.35	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	24102	,	241	,	"Forever New"	,	"Tamara Ruched Midi Dress"	,	"In a sophisticated silhouette, this white ruched midi dress is perfect for corporate events or formal occasions. Style yours with drop earrings and stiletto heels for a polished ensemble."	,	2	,	965.54	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	24202	,	242	,	"Zara"	,	"LIMITED EDITION EXTRA LONG COAT"	,	"Long sleeve coat with a lapel collar. Front flap pockets. Back vent at the hem. Lining. Button-up fastening at the front."	,	2	,	756.16	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21102	,	211	,	"Zara"	,	"PRINTED BLOUSE WITH METALLIC THREAD"	,	"Blouse with a johnny collar featuring long sleeves with ruffle and elastic cuffs. Tied fastening to one side."	,	2	,	627.9	,	1	,	1	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21302	,	213	,	"Zara"	,	"SPECIAL EDITION WOOL BLEND CARDIGAN WITH DIAMONDS"	,	"Cardigan made of a wool blend. Featuring a round neckline, long sleeves and front button fastening."	,	2	,	362.66	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21501	,	215	,	"Puma"	,	"Modern Sports Women's Hoodie"	,	"Casual looks cute in the Modern Sports Hoodie. Featuring a loose, flowy silhouette with rounded hems for an extra-flattering fit, plus dryCELL technology to keep you cool and comfortable, you'll feel feminine while rocking your relaxed look."	,	2	,	559.07	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21201	,	212	,	"Zara"	,	"TEXTURED CROP TOP TRF"	,	"Crop top with a round neckline and long sleeves."	,	2	,	226.29	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21202	,	212	,	"Love, Bonito"	,	"Nolnin High Neck Cropped T-shirt"	,	"Experience comfort and versatility with this our high neck cropped tee. Match yours with dress shorts and mules for a killer weekend look."	,	2	,	23.36	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	21402	,	214	,	"Zara"	,	"FAUX SUEDE JACKET"	,	"Jacket with a hood and long sleeves. Featuring front patch pockets, side vents at the hem and a belt in the same fabric."	,	2	,	495.68	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21401	,	214	,	"Zara"	,	"LEATHER BIKER JACKET"	,	"Long sleeve jacket with a lapel collar. Featuring front pockets with metal zip, shoulder tabs and metal zip fastening at the front."	,	2	,	573.49	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	21301	,	213	,	"Zara"	,	"CABLE-KNIT CARDIGAN"	,	"Open cardigan with long sleeves and ribbed trims."	,	2	,	798.91	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	21101	,	211	,	"Zara"	,	"PRINTED CROPPED BLOUSE"	,	"Short blouse with a round neckline. Balloon sleeves falling below the elbow. Hem with an elastic interior. Button-up fastening in the front."	,	2	,	388.81	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	21502	,	215	,	"Nike"	,	"Nike AeroSwift"	,	"The Nike AeroSwift Crop Top delivers lightweight mobility for your run. Its cropped design helps keep you in the race with a body-hugging fit for snug support."	,	2	,	334.09	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11202	,	112	,	"Abercrombie & Fitch"	,	"Icon Oxford Shirt"	,	"Classic button-up oxford shirt in our signature fit with tonal icon detail and curved hem."	,	2	,	865.76	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	11201	,	112	,	"Abercrombie & Fitch"	,	"Icon Poplin Shirt"	,	"Classic poplin dress shirt with curved hem and embroidered icon at left-chest."	,	2	,	878.39	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11401	,	114	,	"Abercrombie & Fitch"	,	"Wool-Blend Topcoat"	,	"Classic topcoat in a tailored fit with modern details, button-up front, welt pockets and interior pocket for added convenience."	,	2	,	162.02	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11302	,	113	,	"Abercrombie & Fitch"	,	"Sherpa Collar Vegan Suede Jacket"	,	"Classic vintage-inspired jacket in our soft vegan suede fabric with button-up front, cozy sherpa collar and lining, insulated sleeves and pockets throughout."	,	2	,	395.73	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11103	,	111	,	"Abercrombie & Fitch"	,	"Long-Sleeve City Graphic Tee"	,	"Comfortable crewneck long-sleeve t-shirt in our softAF fabric with straight hem, printed chest logo and back city graphic."	,	2	,	140.34	,	1	,	0	,	0	,	CURRENT_TIMESTAMP	,	NULL	),
(	11101	,	111	,	"Abercrombie & Fitch"	,	"Elevated Logo Tee"	,	"Comfortable tee in our softAF 100% cotton fabric with crew neckline and elevated embroidered logo graphic on chest."	,	2	,	654.22	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11301	,	113	,	"Abercrombie & Fitch"	,	"Denim Logo Jacket"	,	"Rigid denim jacket in a medium blue wash with button-up front, pockets, trend logo detail in back and logo leather patch."	,	2	,	884.21	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11102	,	111	,	"Abercrombie & Fitch"	,	"Pima Cotton Textural Knit Tee"	,	"Tailored look, textured stitch tee in 100% pima cotton with roll neck detail and banded hem."	,	2	,	59.21	,	1	,	1	,	1	,	CURRENT_TIMESTAMP	,	NULL	),
(	11402	,	114	,	"Abercrombie & Fitch"	,	"Ultra Parka"	,	"Warm parka in a wind- and water-resistant fabric with down insulation, fleece-lined pockets and heat trapping ribbed cuffs. Features removable faux fur trim on the hood, adjustable waist draw cords, two-way zipper and convenient pockets throughout."	,	2	,	661.85	,	1	,	0	,	1	,	CURRENT_TIMESTAMP	,	NULL	);


DROP   TABLE IF     EXISTS stocks;
CREATE TABLE IF NOT EXISTS stocks
(
    product_id INT UNSIGNED           NOT NULL,
    stock_qty  INT UNSIGNED DEFAULT 0 NOT NULL,
    sold_qty   INT UNSIGNED DEFAULT 0 NOT NULL,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (product_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Sample product stocks
INSERT INTO stocks
    VALUES
        (25302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (25202, 200, 30,  CURRENT_TIMESTAMP, NULL),
        (25402, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (25502, 200, 10,  CURRENT_TIMESTAMP, NULL),
        (25501, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (25401, 200, 40,  CURRENT_TIMESTAMP, NULL),
        (25102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (25101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (25201, 200, 20,  CURRENT_TIMESTAMP, NULL),
        (25301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15402, 200, 3,   CURRENT_TIMESTAMP, NULL),
        (15302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15502, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15401, 200, 3,   CURRENT_TIMESTAMP, NULL),
        (15301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15201, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15202, 200, 3,   CURRENT_TIMESTAMP, NULL),
        (15501, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (15102, 200, 4,   CURRENT_TIMESTAMP, NULL),
        (15101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22102, 200, 8,   CURRENT_TIMESTAMP, NULL),
        (22402, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22202, 200, 2,   CURRENT_TIMESTAMP, NULL),
        (22501, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22502, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (22201, 200, 8,   CURRENT_TIMESTAMP, NULL),
        (22301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (12102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (12302, 200, 46,  CURRENT_TIMESTAMP, NULL),
        (12301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (12201, 200, 34,  CURRENT_TIMESTAMP, NULL),
        (12101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (12202, 200, 145, CURRENT_TIMESTAMP, NULL),
        (12402, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (12401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23201, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23202, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (23402, 200, 120, CURRENT_TIMESTAMP, NULL),
        (13301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13402, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13201, 200, 2,   CURRENT_TIMESTAMP, NULL),
        (13202, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13302, 200, 4,   CURRENT_TIMESTAMP, NULL),
        (13102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (13203, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24201, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (24202, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21501, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21201, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21202, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21402, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (21502, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11202, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11201, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11401, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11302, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11103, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11101, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11301, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11102, 200, 0,   CURRENT_TIMESTAMP, NULL),
        (11402, 200, 0,   CURRENT_TIMESTAMP, NULL);


DROP   TABLE IF     EXISTS product_sales;
CREATE TABLE IF NOT EXISTS product_sales
(
    product_sale_id INT         UNSIGNED            NOT NULL AUTO_INCREMENT,
    sale_id         INT         UNSIGNED            NOT NULL               ,
    customer_id     INT         UNSIGNED            NOT NULL               ,
    product_id      INT         UNSIGNED            NOT NULL               ,
    sale_qty        INT         UNSIGNED DEFAULT 0  NOT NULL               ,
    sale_unit_price DEC(9,2)    UNSIGNED DEFAULT 0  NOT NULL               ,
    total           DEC(9,2)    UNSIGNED DEFAULT 0  NOT NULL               ,
    product_size    VARCHAR(16)          DEFAULT '' NOT NULL               ,

    created_at TIMESTAMP DEFAULT   '0000-00-00 00:00:00',
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    ,

    PRIMARY KEY (product_sale_id),
    FOREIGN KEY (sale_id)    REFERENCES sales(sale_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);



SET FOREIGN_KEY_CHECKS=1;
