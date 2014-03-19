CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(40) NOT NULL,
  `district` varchar(40) NOT NULL,
  `country` varchar(28) NOT NULL,
  `zip` smallint(10) unsigned NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `city`, `district`, `country`, `zip`) VALUES
(1, 'Pokhara', 'Kaski', 'Nepal', 977),
(2, 'Kathmandu', 'Kathmandu', 'Nepal', 977),
(3, 'Bharatpur', 'Chitwan', 'Nepal', 977),
(4, 'Dharan', 'Dhangadi', 'Nepal', 977),
(5, 'Laltipur', 'Lalitpur', 'Nepal', 977),
(6, 'Bhaktapur', 'Bhaktapur', 'Nepal', 977);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Beauty and SPA'),
(2, 'Tours and Travels'),
(3, 'Foods'),
(4, 'Health and Fitness'),
(5, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` char(18) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` char(18) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_dealFK` (`deal_id`),
  KEY `comments_userFK` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `deal_id`, `created`, `user_id`, `body`) VALUES
(1, 'dLhbMHu0kdrG4lNJIy', '2014-01-16 11:51:28', 'USGWjMJefi8a36B8e3', 'Wow great '),
(2, '6GDdy9FMSo3TxQRLir', '2014-01-19 09:59:55', 'USGWjMJefi8a36B8e3', 'im admin'),
(5, 'YmaQ7gdqYZvaOue1o0', '2014-01-19 07:29:58', 'Mk28ZeUS3Vlg6tnB2Q', 'i like it'),
(6, '6GDdy9FMSo3TxQRLir', '2014-01-20 06:07:43', 'Mk28ZeUS3Vlg6tnB2Q', 'wow\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` char(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `office_no` bigint(10) unsigned NOT NULL,
  `mobile_no` bigint(10) unsigned NOT NULL,
  `join_date` datetime NOT NULL,
  `address` int(10) unsigned NOT NULL,
  `email` varchar(42) NOT NULL,
  `total_users` smallint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `company_addressFK` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `office_no`, `mobile_no`, `join_date`, `address`, `email`, `total_users`) VALUES
('cYpMDs0GDD0xc9QTFd', 'Gandaki Electronics', 61463456, 9806473927, '2014-01-16 11:18:16', 1, 'gandaki.electronic@gmail.com', 3),
('ECSDaI5C8GiNopQjeE', 'Panchase Fitness', 61464234, 9806233424, '2014-01-16 11:32:52', 1, 'panchase.fitness@gmail.com', 3),
('jfhK8KSn38kfuwKEj', 'normal users', 0, 0, '2013-12-01 06:13:12', 1, 'normaluser@normal.com', 0),
('lb5Gl1iXfTgmblFEZ7', 'Ours Food', 614648736, 9802800692, '2014-01-19 19:17:05', 1, 'ours.food@gmail.com', 3),
('o0CA4bjtgADuXMHNLE', 'Kanchi Restaurant', 614648736, 9806537234, '2014-01-16 11:28:15', 1, 'kanchi.foods@gmail.com', 3),
('sheo8IQ1QsvZsefi9C', 'admins', 0, 0, '2013-12-02 00:00:00', 1, 'admins@admins.com', 0),
('suho8IQ1QatZwtxi9C', 'Panchase travels and tours', 61460654, 9856021436, '2013-10-19 00:00:00', 1, 'panchase@panchase.com', 3),
('wLfKvz4pU5iOe5v4Tk', 'Gandaki Beauty Parlour', 614650654, 9807638276, '2014-01-16 11:12:09', 1, 'gandakibeautyparlour@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `coupon_no` char(18) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `deal_id` char(18) NOT NULL,
  `user_id` char(18) NOT NULL,
  PRIMARY KEY (`coupon_no`),
  KEY `coupon_dealFK` (`deal_id`),
  KEY `coupon_userFK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_no`, `date`, `status`, `deal_id`, `user_id`) VALUES
('1RVzyN9RT8', '2014-01-17', 0, 'j4kl9DwyosJsl4x5iF', 'Nfi43JoB18vfWihvnV'),
('4H78LL1q3r', '2014-01-19', NULL, 'YFIPu69uYvCyysEXRA', '4MxHwZimILz4im74JM'),
('5EZFy8HNqA', '2014-01-19', NULL, 'zp3krr3HAXUlxCnVQ7', '4MxHwZimILz4im74JM'),
('7qCkzS2hXF', '2014-01-18', NULL, 'j4kl9DwyosJsl4x5iF', 'Nfi43JoB18vfWihvnV'),
('7RkkywtIvo', '2014-01-19', NULL, '6GDdy9FMSo3TxQRLir', 'Nfi43JoB18vfWihvnV'),
('cOSoiHNce8', '2014-01-19', NULL, 'YmaQ7gdqYZvaOue1o0', 'Mk28ZeUS3Vlg6tnB2Q'),
('Dvj9kZchKN', '2014-01-17', 0, 'j4kl9DwyosJsl4x5iF', 'Nfi43JoB18vfWihvnV'),
('ECh4xXM8db', '2014-01-17', 0, 'dLhbMHu0kdrG4lNJIy', 'Nfi43JoB18vfWihvnV'),
('FkxRyQJfDO', '2014-01-19', NULL, 'zp3krr3HAXUlxCnVQ7', '4MxHwZimILz4im74JM'),
('FZhB5piM2a', '2014-01-19', NULL, 'zp3krr3HAXUlxCnVQ7', '4MxHwZimILz4im74JM'),
('mRjl3Gty71', '2014-01-19', NULL, 'YFIPu69uYvCyysEXRA', '4MxHwZimILz4im74JM'),
('ovhB8TDAWP', '2014-01-19', NULL, 'zp3krr3HAXUlxCnVQ7', '4MxHwZimILz4im74JM'),
('sPDWPMhikl', '2014-01-17', 0, 'dLhbMHu0kdrG4lNJIy', 'Nfi43JoB18vfWihvnV'),
('yjsOTUrEv0', '2014-01-19', NULL, 'zp3krr3HAXUlxCnVQ7', '4MxHwZimILz4im74JM');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` char(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `actual_price` int(9) unsigned NOT NULL,
  `actual_price_in_dollar` int(9) NOT NULL,
  `offered_price` int(9) unsigned NOT NULL,
  `offered_price_in_dollar` int(9) NOT NULL,
  `paid_price` int(9) unsigned DEFAULT NULL,
  `final_price` int(9) unsigned DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `minimum_purchase_requirement` int(11) unsigned NOT NULL,
  `maximum_purchase_requirement` int(11) unsigned NOT NULL,
  `total_people` smallint(4) unsigned DEFAULT NULL,
  `coupon_start_date` date NOT NULL,
  `coupon_end_date` date NOT NULL,
  `Description` text NOT NULL,
  `company_id` char(18) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `user_id` char(18) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`deal_id`),
  KEY `deal_companyFK` (`company_id`),
  KEY `deal_categoryFK` (`category_id`),
  KEY `deal_imageFK` (`image_id`),
  KEY `deal_userFK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`deal_id`, `name`, `actual_price`, `actual_price_in_dollar`, `offered_price`, `offered_price_in_dollar`, `paid_price`, `final_price`, `start_date`, `end_date`, `minimum_purchase_requirement`, `maximum_purchase_requirement`, `total_people`, `coupon_start_date`, `coupon_end_date`, `Description`, `company_id`, `category_id`, `image_id`, `user_id`, `status`) VALUES
('0cSroBQVOJqe8ju8mJ', 'Bangkok Trip', 50000, 50000, 38000, 38000, NULL, NULL, '2014-02-02', '2014-02-07', 12, 15, 0, '2014-02-21', '2014-02-28', 'Bangkok is the capital and the most populous city of Thailand. It is known in Thai as Krung Thep Maha Nakhon (à¸à¸£à¸¸à¸‡à¹€à¸—à¸žà¸¡à¸«à¸²à¸™à¸„à¸£, pronounced [krÅ«Å‹ tÊ°ÃªËp mahÇŽË nÃ¡kÊ°É”Ì„Ën] ( listen)) or simply About this sound Krung Thep (helpÂ·info). The city occupies 1,568.7 square kilometres (605.7 sq mi) in the Chao Phraya River delta in Central Thailand, and has a population of over eight million, or 12.6 percent of the country''s population. Over fourteen million people (22.2 percent) live within the surrounding Bangkok Metropolitan Region, making Bangkok an extreme primate city, dwarfing Thailand''s other urban centres in terms of importance.', 'suho8IQ1QatZwtxi9C', 2, 28, NULL, 0),
('6GDdy9FMSo3TxQRLir', 'Tasty Day', 1000, 10, 600, 60, NULL, NULL, '2014-03-03', '2014-03-11', 39, 46, 2, '2014-03-20', '2014-03-24', 'A restaurant (/ËˆrÉ›stÉ™rÉ™nt/ or /ËˆrÉ›stÉ™rÉ’nt/; French: [Ê€É›s.to.ÊÉ‘Ìƒ] ( listen)) is a business establishment which prepares and serves food and drink to customers in return for money, either paid before the meal, after the meal, or with a running tab. Meals are generally served and eaten on premises, but many restaurants also offer take-out and food delivery services. ', 'o0CA4bjtgADuXMHNLE', 3, 32, NULL, 0),
('Cia2sPglevKWjcweKA', 'Gandaki SPA Saloon', 8000, 80, 5000, 50, NULL, NULL, '2014-02-11', '2014-02-20', 15, 20, 0, '2014-03-11', '2014-03-26', 'At Santorini Premium Spa, we pamper your body and spirit in a place where ancient rejuvenating techniques blend seamlessly with modern amenities to energize and beautify you from the inside out.\r\nSantorini Premium Spa offers so much more than simply a spa vacation. We deliver a health-renewing experience with lasting effects - you can breathe fresh air, relax your mind and body, and be pampered beyond your wildest dreams. But most importantly, you will return home with more energy, greater focus, and an enhanced sense of balance. Santorini is proud to offer this amazing spa to enrich your life.', 'wLfKvz4pU5iOe5v4Tk', 1, 25, NULL, 0),
('dLhbMHu0kdrG4lNJIy', 'Karbonn A12', 14000, 140, 10000, 10, NULL, NULL, '2014-01-17', '2014-01-30', 15, 20, 2, '2014-02-05', '2014-02-12', 'Karbonn A12 Great phone to have', 'sheo8IQ1QsvZsefi9C', 5, 18, NULL, 0),
('j4kl9DwyosJsl4x5iF', 'IPhone 5c', 45000, 450, 35000, 350, NULL, NULL, '2014-01-31', '2014-02-06', 20, 25, 3, '2014-02-12', '2014-02-26', 'kjhkj', 'cYpMDs0GDD0xc9QTFd', 5, 19, NULL, 0),
('KFAOMrWXqm3mcPzHUj', 'Samsung Galaxy S4', 125000, 125000, 900000, 900000, NULL, NULL, '2014-01-30', '2014-02-10', 10, 15, 0, '2014-02-17', '2014-02-24', 'The Samsung Galaxy S4 is an Android smartphone produced by Samsung Electronics. First unveiled on March 13, 2013 at Samsung Mobile Unpacked in New York City, it is a successor to the Galaxy S III which maintains a similar design, but with upgraded hardware and an increased focus on software features that take advantage of its hardware capabilitiesâ€”such as the ability to detect when a finger is hovered over the screen, and expanded eye tracking functionality', 'cYpMDs0GDD0xc9QTFd', 5, 33, NULL, 0),
('kqTgJczrQEGj0r1002', 'Annapurna Trek', 200000, 2000, 150000, 1500, NULL, NULL, '2014-01-17', '2014-01-30', 15, 20, 0, '2014-02-12', '2014-02-20', 'sadfsadf', 'sheo8IQ1QsvZsefi9C', 2, 17, NULL, 0),
('LOPmkA6Ne7kgcZsoDQ', 'Goa Holidays', 40000, 400, 29000, 290, NULL, NULL, '2014-01-24', '2014-01-29', 18, 25, 0, '2014-02-04', '2014-02-11', 'With 6 days holiday package in Goa, experience the beauty of Goa', 'suho8IQ1QatZwtxi9C', 2, 20, NULL, 0),
('nIwRggT7Odj8QzBW79', 'Couple Nights', 3000, 3000, 2100, 2100, NULL, NULL, '2014-01-20', '2014-02-09', 22, 28, 0, '2014-02-15', '2014-02-17', 'A restaurant (/ËˆrÉ›stÉ™rÉ™nt/ or /ËˆrÉ›stÉ™rÉ’nt/; French: [Ê€É›s.to.ÊÉ‘Ìƒ] ( listen)) is a business establishment which prepares and serves food and drink to customers in return for money, either paid before the meal, after the meal, or with a running tab. Meals are generally served and eaten on premises, but many restaurants also offer take-out and food delivery services. ', 'o0CA4bjtgADuXMHNLE', 3, 31, NULL, 0),
('NZHjif3JCAYfqaD6jG', 'Kanchi Special', 1500, 15, 900, 9, NULL, NULL, '2014-02-01', '2014-02-15', 35, 40, 0, '2014-02-21', '2014-03-01', 'A restaurant (/ËˆrÉ›stÉ™rÉ™nt/ or /ËˆrÉ›stÉ™rÉ’nt/; French: [Ê€É›s.to.ÊÉ‘Ìƒ] ( listen)) is a business establishment which prepares and serves food and drink to customers in return for money, either paid before the meal, after the meal, or with a running tab. Meals are generally served and eaten on premises, but many restaurants also offer take-out and food delivery services. ', 'o0CA4bjtgADuXMHNLE', 3, 30, NULL, 0),
('pHiFWwvBUZR09dS06M', 'KTM Tour', 10000, 100, 7500, 75, NULL, NULL, '2014-02-03', '2014-02-10', 15, 20, 0, '2014-03-16', '2014-03-21', 'Kathmandu (Nepali: à¤•à¤¾à¤ à¤®à¤¾à¤¡à¥Œà¤‚ [kÉ‘ÊˆÊ°mÉ‘É³É–u]; Nepal Bhasa: à¤¯à¥‡à¤ à¤¦à¥‡à¤¯à¥â€Œ) is the capital and largest urban agglomerate of Nepal. The agglomerate consists of Kathmandu Metropolitan City at its core, and its sister cities Patan, Kirtipur, Thimi, and Bhaktapur. It also includes the recently recognized urban areas of Shankhapur, Karyabinayak, and Champapur.[4] Banepa, Dhulikhel, and Panauti are satellite urban areas of Kathmandu located just outside the Kathmandu vall', 'suho8IQ1QatZwtxi9C', 2, 27, NULL, 0),
('SJX7Q7Zp7PBCBtIbuE', 'Pokhara Tour', 8000, 80, 5500, 55, NULL, NULL, '2014-01-22', '2014-01-30', 15, 18, 0, '2014-02-06', '2014-02-12', 'Pokhara Sub-Metropolitan City (Nepali: à¤ªà¥‹à¤–à¤°à¤¾ à¤‰à¤ª-à¤®à¤¹à¤¾à¤¨à¤—à¤°à¤ªà¤¾à¤²à¤¿à¤•à¤¾ Pokhara Upa-Mahanagarpalika) is the second largest city of Nepal with area 55.22 km2 and population of 264,991 [1] inhabitants and is situated about 200 km west of the capital Kathmandu.[2] It serves as the headquarters of Kaski District, Gandaki Zone and the Western Development Region.[3] Pokhara is one of the most popular tourist destinations in Nepal. Three out of the ten highest mountains in the world â€” Dhaulagiri, Annapurna I and Manaslu â€” are situated within 30 miles (linear distance) of the city, so that the northern skyline of the city offers a very close view of the Himalayas', 'suho8IQ1QatZwtxi9C', 2, 29, NULL, 0),
('t7bLk6FEGMTx9x7vRI', 'Princess SPA', 20000, 200, 15000, 150, NULL, NULL, '2014-02-06', '2014-02-16', 20, 30, 0, '2014-02-27', '2014-03-08', 'At Santorini Premium Spa, we pamper your body and spirit in a place where ancient rejuvenating techniques blend seamlessly with modern amenities to energize and beautify you from the inside out.\r\nSantorini Premium Spa offers so much more than simply a spa vacation. We deliver a health-renewing experience with lasting effects - you can breathe fresh air, relax your mind and body, and be pampered beyond your wildest dreams. But most importantly, you will return home with more energy, greater focus, and an enhanced sense of balance. Santorini is proud to offer this amazing spa to enrich your life.', 'wLfKvz4pU5iOe5v4Tk', 1, 24, NULL, 0),
('XElIma3z6POP4aDIjP', 'Organic SPA', 6000, 60, 4000, 40, NULL, NULL, '2014-02-26', '2014-03-04', 20, 35, 0, '2014-03-12', '2014-03-19', 'Gandaki Organic Spa became one of the first organic spas to open in New Jersey. Special detail was taken into account when creating this store using such materials as carbonized bamboo flooring and non-toxic paint. The furniture is made of recycled materials, including the pedicure bowls and towels. To add to the completely organic and non-toxic environment, Karma incorporates fresh flowers, herbs and fruits into their services', 'wLfKvz4pU5iOe5v4Tk', 1, 23, NULL, 0),
('xujB6LhbuujsVHZYxQ', 'Gandaki MakeOver', 40000, 40, 25000, 25, NULL, NULL, '2014-01-30', '2014-02-12', 30, 40, 0, '2014-02-18', '2014-02-28', 'At Santorini Premium Spa, we pamper your body and spirit in a place where ancient rejuvenating techniques blend seamlessly with modern amenities to energize and beautify you from the inside out.\r\nSantorini Premium Spa offers so much more than simply a spa vacation. We deliver a health-renewing experience with lasting effects - you can breathe fresh air, relax your mind and body, and be pampered beyond your wildest dreams. But most importantly, you will return home with more energy, greater focus, and an enhanced sense of balance. Santorini is proud to offer this amazing spa to enrich your life.', 'wLfKvz4pU5iOe5v4Tk', 1, 26, NULL, 0),
('YFIPu69uYvCyysEXRA', 'IPhone 5s', 65000, 650, 50000, 500, NULL, NULL, '2014-01-27', '2014-02-03', 18, 25, 2, '2014-02-12', '2014-02-19', 'iPhone 5s features a new fingerprint identity sensor, a powerful 64-bit chip, a faster, better camera, ultra fast LTE, the amazing iOS 7, and more. Get the classic IPhone in your hand. ', 'cYpMDs0GDD0xc9QTFd', 5, 21, NULL, 0),
('YmaQ7gdqYZvaOue1o0', 'Ours Food', 1500, 150, 900, 90, NULL, NULL, '2014-01-28', '2014-02-06', 20, 30, 2, '2014-02-25', '2014-02-27', 'test', 'lb5Gl1iXfTgmblFEZ7', 1, 38, NULL, 0),
('zp3krr3HAXUlxCnVQ7', 'Power GYM', 10000, 100, 6000, 60, NULL, NULL, '2014-02-12', '2014-02-21', 25, 35, 5, '2014-03-07', '2014-03-13', 'It is very important to exercises on daily basis.Gymnasium is the place where you will can exercise correctly and get the results that you deserve. Unfortunately the price of such gym is very high. We presents a offer to grab one year full membership of our great gym.', 'ECSDaI5C8GiNopQjeE', 4, 22, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{\r\n"admin": 1\r\n}'),
(2, 'Sub Administrator', '{\r\n"sub-admin" : 1\r\n}'),
(3, 'Standard user', '{\r\n"normal_user" : 1\r\n}'),
(4, 'Merchant', '{\r\n"mer_admin" : 1\r\n}'),
(5, 'Merchant moderator', '{\r\n"moderator":1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cover_image` blob,
  `image1` blob,
  `image2` blob,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `cover_image`, `image1`, `image2`) VALUES
(17, 0x53637265656e73686f742066726f6d20323031332d31302d32372031393a33353a35302e706e67, 0x53637265656e73686f742066726f6d20323031332d31322d31332031303a33363a35352e706e67, 0x53637265656e73686f742066726f6d20323031332d31322d31392031323a34343a30372e706e67),
(18, 0x6b6172626f6e6e2d4131322d363530783430302e6a7067, 0x6b6172626f6e6e6131322e6a7067, 0x6b6172626f6e6e2d736d6172742d31322d363135783339352e6a7067),
(19, 0x6970686f6e6535632d6865616465722e6a7067, 0x6970686f6e6535632e6a7067, 0x6970686f6e652d3563632e6a7067),
(20, 0x686f74616c726f6f6d2e6a7067, 0x484f54454c2e6a7067, 0x524f4f4d2e6a7067),
(21, 0x696f732d372d322d786c2e6a7067, 0x6970686f6e6535732e6a7067, 0x6970686f6e655f35735f6170706c655f73746f72655f6865726f5f302e6a7067),
(22, 0x4269675f47796d5f76732e5f536d616c6c5f53747564696f2e6a7067, 0x636f6d6d65726369616c2d67796d2d312e6a7067, 0x73706f7274792d6d616e2d696e2d7468652d67796d2d63656e7472652d31303234783638332e6a7067),
(23, 0x4f7267616e69632d436f74746f6e2d5370612d57726170732d666f722d53756d6d65722d536561736f6e2e6a7067, 0x5370612d4f7574646f6f72732e6a7067, 0x5370612d426c6f672d50686f746f2e6a7067),
(24, 0x73616e746f72696e692d7072696e636573732d73706134322e6a7067, 0x73616e746f72696e692d7072696e636573732d73706133382e6a7067, 0x73616e746f72696e692d7072696e636573732d73706134302e6a7067),
(25, 0x4162686173612d5370612d4d6173736167652e6a7067, 0x6865616465725f7370612e6a7067, 0x5370612d4a6163757a7a692e6a7067),
(26, 0x6d616b6575702e6a7067, 0x6265617574797061726f6c6f722e6a7067, 0x7061726f75722e6a7067),
(27, 0x38303070782d4e657761726946657374303133302e4a5047, 0x38303070782d4b6174686d616e64755f70616c6163652e6a7067, 0x38303070782d52616e69706f6b686172695f6b6174686d616e64752e6a7067),
(28, 0x6d6f6465726e686f74656c2e6a7067, 0x6c755f6c755f72657374617572616e742e6a7067, 0x524f4f4d2e6a7067),
(29, 0x506f6b686172612d436974792e6a7067, 0x4d6f756e7461696e5f4d757365756d5f506f6b686172615f46726f6e742e6a7067, 0x706f6b686172612e6a7067),
(30, 0x72657374617572616e742e6a706567, 0x72657374617572616e74322e6a7067, 0x727374617572616e742e6a7067),
(31, 0x5265766974616c697a652d596f75722d52657374617572616e742e6a7067, 0x38303070782d52657374617572616e742e4a5047, 0x4469706177616c695f323031335f6f665f4b6174686d616e64752e6a7067),
(32, 0x666f6f642e6a7067, 0x62675f72657374617572616e742e6a7067, 0x524f4f4d484f74616c2e6a7067),
(33, 0x73616d73756e672d67616c6178792d73342d626c61636b2d77686974652e6a7067, 0x73616d73756e672d67616c6178792d73342d73637265656e2e6a7067, 0x73616d73756e672d67616c6178792d73342d736964652e6a7067),
(38, 0x72657374617572616e74732e6a7067, 0x72657374617572612e6a7067, 0x72657374617572616e74735f726576696577732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` char(18) NOT NULL,
  `username` varchar(10) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `gender` char(1) NOT NULL,
  `contact_no` bigint(10) unsigned NOT NULL,
  `address` int(10) unsigned NOT NULL,
  `email` varchar(42) NOT NULL,
  `join_date` datetime NOT NULL,
  `company` char(18) NOT NULL,
  `groups` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_groupsFK` (`groups`),
  KEY `user_addressFK` (`address`),
  KEY `user_companyFK` (`company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `password`, `salt`, `gender`, `contact_no`, `address`, `email`, `join_date`, `company`, `groups`) VALUES
('4MxHwZimILz4im74JM', 'aashish.gh', 'Aashish', 'Ghale', 'c0185c50c3167d861be73801d5c2ad5c516cf83ae7b10128610dd12063756b79', 'ø "ˆ•ž>I%J8‘³"œªÍ:“”žõ¾oÍì“£™', 'M', 9806534837, 1, 'aashish.ghale@gmail.com', '2014-01-19 00:00:00', 'jfhK8KSn38kfuwKEj', 3),
('5AGa1uz2ElGXQsCdte', 'gandaki.el', 'gandaki.electronic', 'gandaki.electronic', '3a106eca28a44d61bd0be75e62397bc2020c9de29a7231691ec6b78bc4c78edf', 'Øw)êÖÕ¶¤Neæ„ë¸y§ýž8h?I]K°Fxí', 'M', 61463456, 1, 'gandaki.electronic@gmail.com', '2014-01-16 11:18:16', 'cYpMDs0GDD0xc9QTFd', 4),
('BCReFvijtNSW06hKJ9', 'salik.adhi', 'Bikram', 'Adhikari', '2a173ad36c4d13cb22afff0a72a83cca14dfa1fdce8394f462e6946104e2b5d3', '9ì®Í®‘œ‰DËIš‰¿¸Ì\rg''ãîà/"Ý"qÐî', 'M', 9802800692, 1, 'salik.adhikari@gmail.com', '2014-01-15 12:26:52', 'jfhK8KSn38kfuwKEj', 3),
('dVbqQLMsGuDTVByfc4', 'panchase.f', 'panchase.fitness', 'panchase.fitness', '69b171f0f7badf8891954aa59ffcfc868f29a833961d621dcdddb2c99447340f', 'pr¯FtB[yÙ™SÖ5¥¨bà Óvm\r6º¼£¿±D°', 'M', 61464234, 1, 'panchase.fitness@gmail.com', '2014-01-16 11:32:52', 'ECSDaI5C8GiNopQjeE', 4),
('Ezb2rT1iCPtEDUh3Fq', 'piyushthap', 'piyush', 'thapa', 'de6d50094db279a226393688a34f5e7702389e9d997baa92aaaa0f72a1401799', '®wZŸÖ²,Rï†mˆ)0n¾KÜoæ1æDóò¡í÷', 'M', 534534566, 1, 'piyushthapa74@gmail.com', '2014-01-16 12:14:33', 'jfhK8KSn38kfuwKEj', 3),
('hrQVE23yfz1RwnjHZy', 'kanchi.foo', 'kanchi.foods', 'kanchi.foods', '8374b5073034a638bad47b695f4bb1bbf27ff69112c6025310cffe51b8c021a4', 'écÃglõèªzl…$wÁíkó•ÅxQnÕq6å:H', 'M', 614648736, 1, 'kanchi.foods@gmail.com', '2014-01-16 11:28:15', 'o0CA4bjtgADuXMHNLE', 4),
('kcUOfetuRpi1S1jHYI', 'gandakibea', 'gandakibeautyparlour', 'gandakibeautyparlour', '3e4dbd6aed8a93a5fe64f2b607bd5602c4079083074f659c8bb3c43e31145fdb', 'Œ§³R_¡‰&SPOÞ9x(°€)bþã#ç\\%¯x', 'M', 614650654, 1, 'gandakibeautyparlour@gmail.com', '2014-01-16 11:12:09', 'wLfKvz4pU5iOe5v4Tk', 4),
('mIh5V7wsHE7LAfS90I', 'aacssh', 'Aashish', 'Gurung', '03366149b44833e8682b00b477c2d7f9f1dd53c1cab8e948614e5f916726a52c', 'nØ9þhNY©÷\\q ì>N	*&¯j<i¸[¸îK', 'M', 61460654, 1, 'aacssh@hotmail.com', '2013-12-21 10:30:04', 'sheo8IQ1QsvZsefi9C', 2),
('Mk28ZeUS3Vlg6tnB2Q', 'aakash.gha', 'Aakash', 'Ghale', '045c58e8b4e63f21ee85378d75bcc3810e40e64b7118c776c04cd98be7fb902b', 'åFÛ€§dÊÐÖOdÁ<ýs¤5ê¾Õ¯\\8ªò', 'M', 9804172178, 1, 'aakash.ghale17@gmail.com', '2014-01-19 00:00:00', 'jfhK8KSn38kfuwKEj', 3),
('Nfi43JoB18vfWihvnV', 'sadip', 'Sadip', 'Acharya', '8f5eb689841f57836f2d665d3ae50ccc4ee589bdc29d13aee2af5918ebe248a7', '~ôýÚ½[,¨ÞüM—†ú7îÊ§¦Îhe1–"', 'M', 9806596991, 1, 'sadip.acharya@gmail.com', '2014-01-11 13:38:59', 'jfhK8KSn38kfuwKEj', 3),
('OBsDtZhr0yL4h3FqSR', 'ram.gurung', 'Ram', 'Gurung', '2fa1cd8026430979607ab8094c4dd94e3e6973a9054f23cd1774519bcc4c81cf', '˜''þ¦1äIX8gýÏiZÜ~.°"ñ–%§šòxÎ§”', 'M', 9806534837, 1, 'ram.gurung@gmail.com', '2014-01-21 00:00:00', 'jfhK8KSn38kfuwKEj', 3),
('oelBIkSEXwaKX6PQpr', 'dealramro', 'Ramro', 'Deal', 'ca6cf93071128b5e658aeda1ab50ef77bf0d85bcaeeed2e71722dd137a01bea2', '™3Æ`ÒmöU«A™è7²\0žÄVæ¡tQç)%¸ÞÅû', 'M', 9806534837, 1, 'dealramro@gmail.com', '2014-01-15 08:59:42', 'sheo8IQ1QsvZsefi9C', 2),
('S0SFRAzzLW5kIpE3fV', 'ours.food', 'ours.food', 'ours.food', 'e8abcf97d5b22a5fa322772ec2928f50ea8a7fbc1bcecc971ea063e7af09d1f7', 'œ=•€è[sé.-ü†_ÛÖ_	Öô&‡µ÷®òÿ', 'M', 614648736, 1, 'ours.food@gmail.com', '2014-01-19 19:17:05', 'lb5Gl1iXfTgmblFEZ7', 4),
('s3NYWzJnZsFzmXN3PF', 'panchase', 'Panchase', 'Panchase', '231de7b0189c6dd41ef2ddaf71651f2e5a24170022853c0a84c7dd2e21a5e15f', 'p¥ãtÐf¾I”r„ö9º/»&"øþš¡BE¹òÝ%', 'M', 61460654, 1, 'panchase@panchase.com', '2013-12-21 09:32:09', 'suho8IQ1QatZwtxi9C', 4),
('USGWjMJefi8a36B8e3', 'admin', 'Aashish', 'Ghale', '6ad54a36ede509fd96d3655bc2752e849be1345f142affbaebbb123324dcc09d', '¯OÀ\nZZ¢1v8LÚÁ1N,¯=;\\z¤ÏªS', 'M', 9806534837, 1, 'admin@ramrodeal.com', '2014-01-15 08:26:38', 'sheo8IQ1QsvZsefi9C', 1),
('yS2BJVySZHu0URYTQl', 'rishikhana', 'Rishi', 'Khanal', 'b4b7c852493b379546e9378a89f1a29a6b1fa1d297482c88f6218368bc23add9', '¶?š»‹Å|\\6k¸ïò ëï[ò+÷R€•ó´Õáï', 'M', 9846299077, 1, 'rishikhanal892@gmail.com', '2014-01-16 14:40:37', 'jfhK8KSn38kfuwKEj', 3),
('z0WePlHGEjeUt1LWzz', 'rojina', 'Rojina', 'Subedi', 'bb9d313bdb308b87a688593ae55212c702ac82dabc60d55cb191f1b4e9814326', 'žsç±lGHã³^\r»¦6ãÇÿ''iûªd:†F¨\\òœ', 'F', 9846299077, 1, 'rojina@gmail.com', '2014-02-20 00:00:00', 'jfhK8KSn38kfuwKEj', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(18) NOT NULL,
  `hash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_dealFK` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`deal_id`),
  ADD CONSTRAINT `comments_userFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_addressFK` FOREIGN KEY (`address`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_dealFK` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`deal_id`),
  ADD CONSTRAINT `coupon_userFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `deal_categoryFK` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `deal_companyFK` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `deal_imageFK` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`),
  ADD CONSTRAINT `deal_userFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_addressFK` FOREIGN KEY (`address`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `user_companyFK` FOREIGN KEY (`company`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `user_groupsFK` FOREIGN KEY (`groups`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
