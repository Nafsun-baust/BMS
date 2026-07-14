-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_no` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `at_code` int(11) DEFAULT NULL,
  `balance` float DEFAULT 0,
  `pin_code` int(11) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `debit_card_no` varchar(50) DEFAULT NULL,
  `debit_exp_date` date DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `iscard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_no`, `customer_id`, `at_code`, `balance`, `pin_code`, `opening_date`, `closing_date`, `status`, `debit_card_no`, `debit_exp_date`, `cvv`, `iscard`) VALUES
(100001, 100006, 2, 88, 1234, '2024-02-14', NULL, 'active', NULL, NULL, NULL, 0),
(100002, 100007, 2, 16000, 1234, '2023-10-15', NULL, 'active', '5879 6547 8541 2369', '2024-03-30', 698, 0),
(100003, 100008, 1, 3700, 4567, '2022-02-15', NULL, 'active', NULL, NULL, NULL, 0),
(100004, 100009, 1, 0, 5678, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100005, 100010, 2, 2300, 6789, '2023-12-01', NULL, 'active', NULL, NULL, NULL, 0),
(100006, 100011, 2, 1600, 7890, '2023-06-21', NULL, 'active', NULL, NULL, NULL, 0),
(100007, 100012, 2, 2200, 8901, '2024-03-27', NULL, 'active', '', '2024-03-30', 587, 0),
(100008, 100013, 1, 2000, 9012, '2024-01-01', '2024-02-17', 'closed', NULL, NULL, NULL, 0),
(100009, 100014, 1, 5500, 123, '2024-01-14', NULL, 'active', NULL, NULL, NULL, 0),
(100010, 100015, 2, 3500, 1234, '2023-05-20', NULL, 'active', NULL, NULL, NULL, 0),
(100011, 100005, 2, 0, 2345, '2024-04-01', NULL, 'active', '587554589956558', '2024-04-26', 254, 0),
(100012, 100006, 3, 14740, 3456, '2023-10-20', NULL, 'active', NULL, NULL, NULL, 0),
(100013, 100007, 1, 0, 4567, '2024-03-27', NULL, 'active', NULL, NULL, NULL, 0),
(100014, 100008, 3, 12500, 5678, '2023-06-13', '2024-02-19', 'closed', NULL, NULL, NULL, 0),
(100015, 100019, 1, 0, 6789, '2024-04-01', NULL, 'active', '5874986525475589', '2027-07-22', 587, 0),
(100016, 100010, 1, 13300, 7890, '2023-11-15', NULL, 'active', NULL, NULL, NULL, 0),
(100120, 100083, 2, 0, 1425, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100122, 100083, 3, 0, 1111, '2024-03-21', NULL, 'active', NULL, NULL, NULL, 0),
(100123, 100084, 2, 0, 6987, '2024-04-23', NULL, 'active', '2589774856986523', '2024-04-27', 589, 0),
(100124, 100085, 3, 0, 1254, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100126, 100092, 2, 0, 1234, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100127, 100093, 1, 0, 1234, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100128, 100094, 2, 0, 1234, NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(100130, 100101, 2, 0, 9999, NULL, NULL, 'pending', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acc_type`
--

CREATE TABLE `acc_type` (
  `at_code` int(11) NOT NULL,
  `acc_name` text DEFAULT NULL,
  `service_charge` float NOT NULL,
  `interest_rate` float NOT NULL,
  `trx_limit` int(11) NOT NULL,
  `withdraw_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_type`
--

INSERT INTO `acc_type` (`at_code`, `acc_name`, `service_charge`, `interest_rate`, `trx_limit`, `withdraw_limit`) VALUES
(1, 'Savings Account', 1000, 5, 0, 2000000),
(2, 'Current Account', 1000, 0, 0, 5000000),
(3, 'Student Account', 0, 2, 10, 30000),
(492, 'adsfasdfasdf', 2000, 5, 10, 60000),
(493, 'asdfasdf', 3452, 4, 45, 3452345);

-- --------------------------------------------------------

--
-- Table structure for table `atm_booth`
--

CREATE TABLE `atm_booth` (
  `atm_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `district` text NOT NULL,
  `division` text NOT NULL,
  `address` text DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `atmc_name` text NOT NULL,
  `start_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `add_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atm_booth`
--

INSERT INTO `atm_booth` (`atm_id`, `name`, `district`, `division`, `address`, `postal_code`, `capacity`, `atmc_name`, `start_time`, `closing_time`, `add_info`) VALUES
(100063, 'atm6', 'rangpur', 'Saidpur', 'rangpur', 2039, 10000000, 'Nazim Uddin', '17:53:00', '19:53:00', 'sbgy'),
(100068, 'dfadsfa', 'adsfadsf', 'asdfadsf', 'asdfadf', 23452435, 2456346, '', '15:26:00', '21:48:00', 'asdfasdf asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_name` varchar(255) NOT NULL,
  `bank_sort_name` varchar(10) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `logo` varchar(20) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `call_center` varchar(20) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `mission` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_name`, `bank_sort_name`, `tagline`, `logo`, `rating`, `address`, `phone`, `email`, `fax`, `call_center`, `facebook`, `linkedin`, `twitter`, `youtube`, `about_us`, `vision`, `mission`) VALUES
('Nexus Capital Bank Limited', 'NCBL', 'Building Trust, Empowering Futures', NULL, 0, 'Shadhinata Tower, Bir Srestha Shaheed Jahangir Gate Dhaka Cantonment, Dhaka-1206.', '+88-02-55478856-6', 'ncbl@gmail.com', '+1-258-589-6587', '16247', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://twitter.com/', 'https://youtube.com/', '\nNexus Trust Bank, a prominent financial institution within Bangladesh, stands as a testament to innovation and reliability in the country\'s banking sector. Established in [year], Nexus Trust Bank quickly emerged as a leading player in the industry, distinguishing itself through a blend of cutting-edge services, customer-centric solutions, and a commitment to fostering financial inclusivity.\n\nAt the heart of Nexus Trust Bank\'s operations lies a dedication to meeting the diverse needs of its clientele. The bank offers a comprehensive range of banking products and services tailored to individuals, businesses, and institutions alike. From traditional savings and checking accounts to sophisticated investment opportunities and corporate banking solutions, Nexus Trust Bank caters to the full spectrum of financial requirements with professionalism and expertise.\n\nOne of Nexus Trust Bank\'s defining characteristics is its embrace of technological advancement to enhance the banking experience. Through robust online and mobile banking platforms, customers can conveniently manage their accounts, conduct transactions, and access a suite of digital services anytime, anywhere. Moreover, Nexus Trust Bank remains at the forefront of digital innovation, leveraging technologies such as artificial intelligence and blockchain to streamline operations and ensure the highest standards of security and efficiency.\n\nBeyond its commitment to delivering superior financial services, Nexus Trust Bank is deeply invested in contributing to the socioeconomic development of Bangladesh. The bank actively engages in corporate social responsibility initiatives, supporting education, healthcare, environmental sustainability, and community welfare programs across the nation. By fostering partnerships with local organizations and government agencies, Nexus Trust Bank plays a pivotal role in driving positive change and empowering communities to thrive.\n\nIn conclusion, Nexus Trust Bank exemplifies excellence in the banking sector, combining innovation, reliability, and social responsibility to create lasting value for its customers and the broader society. With a steadfast focus on customer satisfaction, technological advancement, and community engagement, Nexus Trust Bank continues to chart a path of growth and success, enriching the lives of millions across Bangladesh.', 'Nexus Trust Bank envisions becoming a beacon of reliability and innovation in the banking sector of Bangladesh. Striving for excellence, it aims to foster financial empowerment by offering tailored solutions that meet the diverse needs of its customers. With a commitment to integrity and transparency, Nexus Trust Bank seeks to cultivate lasting relationships built on trust and mutual respect. Embracing technological advancements, it aspires to revolutionize banking experiences, ensuring seamless accessibility and efficiency. Through strategic partnerships and community engagement, Nexus Trust Bank envisions contributing positively to societal development, ultimately emerging as a leading institution driving progress and prosperity across Bangladesh.', 'At Nexus Trust Bank, our mission is to empower individuals and businesses by providing innovative financial solutions that foster growth and prosperity. We strive to build lasting relationships based on trust, integrity, and excellence in service delivery. Our commitment to customer satisfaction drives us to continuously enhance our products and services, ensuring accessibility and inclusivity for all. By leveraging cutting-edge technology and a dedicated team of professionals, we aim to be a leading force in driving economic development and financial stability within Bangladesh and beyond. At Nexus Trust Bank, we are dedicated to helping our clients achieve their financial goals and dreams.');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `source_acc_no` int(11) DEFAULT NULL,
  `ben_acc_no` int(11) DEFAULT NULL,
  `ben_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`source_acc_no`, `ben_acc_no`, `ben_name`) VALUES
(100002, 100012, 'James'),
(100002, 100016, 'Daniel'),
(100002, 100003, 'dfgsfgsdfg'),
(100002, 100007, 'Sumon');

-- --------------------------------------------------------

--
-- Table structure for table `board_of_director`
--

CREATE TABLE `board_of_director` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `picture` text NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_of_director`
--

INSERT INTO `board_of_director` (`name`, `gender`, `position`, `picture`, `designation`, `qualification`, `information`) VALUES
('Brigadier General Md Kaisar Hasan Malik', 'male', 3, '', 'Director', 'SGP, ndc, psc', 'Brigadier General Md Kaisar Hasan Malik, SGP, ndc, psc was commissioned in the Corps of Infantry on 20 December 1991. He had the distinction of serving in command, staff and instructional appointments. He commanded reputed 51 Infantry Brigade in Sylhet and BGB North West Region which controlled 40% of Bangladesh Border. He also commanded 27 BIR both in Chittagong Hill Tracts (Bilaichari Zone) and Mymensing Cantonment. In staff capacity, currently he is the Director of Movement & Quartering Directorate in AHQ and also served as Director of Inspection and Technical Development Directorate in AHQ. He served as the pioneer Colonel Staff of newly raised 10 Infantry Division and contributed significantly for raising of the new division. He was also Brigade Major of 71 Infantry Brigade in Savar. He has the rare opportunity to serve as General Staff Officer Grade 3 in Operations both in 309 Infantry Brigade and 66 Infantry Division. As instructor, he was a Directing Staff in Defence Services Command and Staff College, Mirpur. He also served as a distinguished instructor in the Tactics Wing of the School of Infantry and Tactics. As a Peacekeeper, he served as Military Planning Officer, in, DPKO, UN HQ, New York, USA for more than 3 years, where he conducted strategic level planning on current and new missions. He also served in the UN Missions in Sierra Leone (UNAMSIL). Brigadier General Kaisar attended number of courses at home and abroad. He completed his ndc from National Defence College, Mirpur in 2019. He is a graduate from Defence Services Command and Staff College, Bangladesh and Armed Forces Staff College, Malaysia. He obtained Master’s in Social Science in Security and Development from Bangladesh University of Professionals. He also earned Master’s Degree on Defense and Strategic studies from National University of Bangladesh. Additionally, he obtained diploma in Defence Studies from University of Malaya, Kuala Lampur, Malaysia. He participated as key note speaker in seminars conducted in DSCSC to speak on Conflict Dynamics and UN planning Process. He also conducted a Joint Warfare Training Package for students in Sri Lankan Staff College in Colombo. He has also participated in Indo-Bangla Joint Exercise SHAMPRITI VII conducted in India. He is married to Mrs Amatun Noor and has a lovely daughter. Brigadier General Kaisar finds interest in playing golf and loves reading books.'),
('Brigadier General Md Munirul Islam', 'male', 3, '', 'Director', 'SGP, psc, Ph.D', 'Brigadier General Md Munirul lslam, SGP, psc, Ph.D is commissioned with 28 BMA Long Course in the Corps of Ordnance on 18 June1993. In his long 28 years carrier, he is basically performing as a logistician in general but Supply Chain and Procurement Specialist in particular.\r\n\r\nPresently he is working as the Director, Personnel Services and Provost Marshal of Bangladesh Army Headquarters. Previously, he worked as G-2 and G-1 (Procurement) in the Prime Ministers Office, Armed Forces Division, Assistant Director Ordnance Services in Army Headquarters, Assistant Director Purchase in Directorate General Defence Purchase. He commanded two logistics unit of Bangladesh Army in the capacity of Lieutenant Colonel and Major. In his long carrier as a logistician he also served in the mother logistics depot; Central Ordnance Depot of Bangladesh Army. He was a trainer in Ordnance Centre and School (A Logistics Institute of Bangladesh Army). He was also a part time faculty member of South-East University, where he used to impart lessons on Strategic Management and International Contract Law in regular MBA Programme.\r\n\r\nThe General has completed his Ph.D. from Jahangirnagar University. His research topic was \"Public Procurement in Bangladesh-A Study in the Health Sector\". In research he mainly worked on the prevailing Public Procurement System in Bangladesh. In that, he tried to bring out the strength and limitations of Public Procurement Act (PPA)-2006 and Public Procurement Regulations (PPR)-2008. He also completed his Masters on Explosive Ordnance from Bangladesh University of Professionals , diploma on Supply Chain Management, training on L/C procedure for Export Operation and Effective Negotiation Skills to Win from Dhaka Chamber of Commerce and Institute, Warehouse and Inventory Management from Bell Helicopter, Singapore, International Defence Management course from Naval Post Graduate School, USA, US Procurement and Financing system from USA, Advanced Arbitration Training from International Law Institute, USA, Accreditation course on Mediation and TOT to the Mediations from UK. He is also an accredited mediator on Alternative Dispute Resolutions in Bangladesh International Arbitration Centre (BIAC).\r\n\r\nHe worked as a negotiation committee member in different high value defence procurement with Russia, China, Turkey, Hungary and India. He served as a peace keeper under blue helmet in Ivory Coast, Ethiopia and Eretria.\r\n\r\nHe is married with Shakh Shamima Akhter and the happy couple is blessed with three sons, Muhammad Farhan Munir, Muhammad Fahmid Munir and Muhammad Faiyaz Munir.'),
('Brigadier General Md Nishatul Islam Khan', 'male', 3, '', 'Director', 'ndc, afwc, psc', 'Brig Gen Md Nishatul Islam Khan, ndc, afwc, psc was commissioned on 18 June 1993, with 28th  BMA Long Course. He served in four Infantry Regiments, three Headquarters and two training institutions where he held various command, staff and instructional appointments. He served as General Staff Officer Grade-3 in an Infantry Brigade in CHT, Brigade Major in an Infantry Brigade, Deputy Assistant Military Secretary in Military Secretary Branch, Army Headquarters and General Staff Officer-1 Training in National Defence College. Besides, he served as Assistant Director in Special Security Force, General Staff Officer-1 in the Headquarters, Directorate General of Forces Intelligence and Deputy Commander in President Guard Regiment. He commanded an Infantry Regiment in 19 Infantry Division and an infantry brigade in 11 Infantry Division, Bogura.\r\n\r\nBrig Gen Nishat attended number of professional courses at home and abroad. He is a graduate of Defence Services Command and Staff College, Mirpur. He attended the Higher Defence Management Course in UK Defence Academy. He is also a graduate of the National Defence College, Mirpur. He completed National Defence Course from NDC, Tanzania and did his Masters in Security and Strategic Studies (MSSS) from Dar-es-Salam University, Tanzania.\r\n\r\n>In the instructional domain, he served as the Directing Staff of the Armed Forces War Course in the National Defence College.\r\n\r\nBrig Gen Nishat participated as a contingent member in United Nations Mission in Sierra Leone (UNAMSIL) and as a Staff Officer at the Force Headquarters of United Nations Assistance Mission in Darfur, Sudan (UNAMID). He visited a total of 32 countries in both official and personal capacity, covering most of the continents of the world.\r\n\r\nBrig Gen Nishat is married and blessed with two daughters. Presently he is serving as Director, Internal Affairs Bureau in HQ DGFI.\r\n\r\n'),
('Brigadier General Md Sajjad Hossain', 'male', 3, '', 'Director', 'SUP, ndc, afwc, psc', 'Brig Gen Sajjad of Bangladesh Army, was born on 22 November 1972 in Rangamati district.\r\nHe is the eldest among the three sons of his parents. He completed his SSC in Rangamati Govt High School and done his HSC from Chittagong Govt College. He was commissioned on 16 December 1993 in Bangladesh Army.\r\n\r\nHe has completed Master in Strategy and Development Studies from Bangladesh University of Professionals and Master in Defense Studies from Bangladesh National University. He is also a graduate from Chittagong University, National Defense College and Defense Services Command and Staff College. He has obtained diploma on Supply Chain Management, Services Management, Operations Management and Modern Human Resources Management from Alison. He has also completed certification program on Project Management Professional (PMP) ® Exam Prep, Fundamentals of using six sigma in supply chains, Environmental Management Systems (EMS), Change Management, Strategic Management, International and Strategic Human Resource Management, Enterprise Resource Planning and Management under the same platform. He has completed Strategic Leadership Program and Overseas Joint Operations Planning Course conducted by Integrated Training Solutions (Global) UK. He has completed Senior Staff Course on Public Administration from BPATC.\r\n\r\nHe has 30 years of progressive experiences in the field of operations, administration, logistics operations, human resources management, supply and support services. He has commanded Army Supply and Transport Battalion and provided supplies, logistics and services supports to the entire forces of Bangladesh. He was a focal point in Army Headquarters on operations, administration, services delivery and program/project management of Defense Forces as Deputy Assistant Director. He also served as Secretary to Chief of Army Staff, in the field of operations, administration, logistics, resources management and support services of Bangladesh Army. As Colonel Administration and Chief of logistics, He has planned, monitored and supervised the logistics, administrative, supply and services support affairs and provided required guidance to 55 field units for the effective supply and services support system.\r\n\r\nHe has progressive experiences to serve three different UN field missions in various capacities. He served as pioneer Staff Officer of UNOCI during the rapid deployment and mission start-up phase, where He ensured effective functioning of all sections and units and served as focal point for all administrative management and operations. As senior staff officer of UNMIS, He was the focal point to develop hybrid administrative support plan for Referendum Support Bases and was also involved in mission transition from Sudan to South Sudan.  As section chief of UNMIL, He organized and managed the training, administration and operational role for the uniformed personnel within the mission area including their administrative services. He was also the focal point from FHQs for the mission draw down/liquidation. He is happily married to Shahela Sajjad. She is housewife. They have one grown-up son.'),
('Brigadier General Mohammad Moazzem Hossain', 'male', 3, '', 'Director', 'ndc, afwc, psc, G, MPhil', 'Brigadier General Mohammad Moazzem Hossain, ndc, afwc, psc, G, MPhil was commissioned in the Corps of Artillery on 20 December 1992. During his long illustrious career he served in various important appointments of Bangladesh Army.\r\n\r\nHe has attended several professional training both at home and abroad. He is a graduate of Defence Services Command and Staff College (DSCSC), Mirpur, Dhaka. He has completed National Defence Course (ndc) and Armed Forces War Course (afwc) from National Defence College, Mirpur, Dhaka. He has attended courses and military exercises in abroad. He is a graduate of Nanging Artillery Academy China and  School of Artillery, Pakistan. He has two master degrees : Master of Defence Studies (MDS) and Masters in Science (Technical)  from National University Bangladesh. He has obtained his M Phil degree from Bangladesh University of Professionals, Mirpur.\r\n\r\nBrig Gen Mohammad Moazzem Hossain has served in various command, staff and instructional appointments in Bangladesh Army. He has commanded two artillery brigades and two artillery regiments.  He has also served as Platoon commander in Bangladesh Military Academy and Senior Instructor Gunnery in Artillery Center and School. In staff appointment, he has served as Grade-3 Staff Officer (Operation) in HQ 9 Artillery Brigade, Grade-1 Staff Officer in AHQ, Military Training Directorate and Colonel Staff of 17 Infantry Division.\r\n\r\nPresently he is serving as Director, Army Headquarters, General Staff Branch, Budget Directorate.\r\n\r\nBrigadier General Mohammad Moazzem Hossain served in UN Mission for Two times as Staff Officer & Deputy Contingent Commander.  He was awarded with “National Suddachar award” in 2019.\r\n\r\nHe is married with Mahfuza Rahman and the happy couple is blessed with two Daughters, Saiyara Nusaiba, Shafia Nusaiba.'),
('Brigadier General Rakibul Karim Chowdhury', 'male', 3, '', 'Director', 'ndc, afwc, psc', 'Brigadier General Rakibul Karim Chowdhury, ndc, afwc, psc was born on 02 November 1973 in a reputed Muslim family in Faridpur. He was commissioned with 30 BMA Long Course on 17 June 1994 in the Corps of Signals. He attended a number of professional courses both at home and abroad. He is a graduate of Computer Science and Engineering (CSE). Brigadier General Rakib is also a graduate of Defence Services Command and Staff College, Mirpur; and got Masters in Information Technology (MICT) from Bangladesh University of Professionals. He completed the Armed Forces War Course from National Defence College, Mirpur and National Defence Course from Egyptian National Defence College, Cairo.\r\n\r\nBesides serving in various Signal Regiments, Brigadier General Rakib also served as an instructor at the School of Signals, Platoon Commander at Bangladesh Military Academy, General Staff Officer Grade-2 (Plans and Coordination) in Defence Services Command & Staff College, General Staff Officer Grade-1 (FTEB) at Headquarters Army Training & Doctrine Command (ARTDOC) and Colonel Staff of Staff Duties Directorate in Army Headquarters. He participated in United Nations Peace Keeping Operation as a contingent member in Sierra Leone (UNAMSIL) and as the Chief of the Communication & Information Technology Branch at the Force Headquarters in the Democratic Republic of Congo (MONUSCO).\r\n\r\nAs a part of the government duties and personal tours, Brigadier General Rakib visited several countries like Belgium, Egypt, France, Germany, Japan, Kenya, KSA, Malaysia, Myanmar, Singapore, South Korea, Thailand, Turkey, UAE, Uganda, UK, USA etc. He served as the Commanding Officer of the prestigious 1 Signal Battalion. He also served in Border Guard Bangladesh as the Region Commander of the North-West Region, Rangpur. At present, he is posted to Army Headquarters as Director, Information Technology Directorate. In his personal life, Brigadier General Rakib is happily married to Mrs Farzana Khan and blessed with a son and a daughter.\r\n\r\n'),
('Brigadier General S M Zia-Ul-Azim', 'male', 3, '', 'Director', 'ndc, afwc, psc', 'Brigadier General S M Zia-Ul-Azim was commissioned in the Corps of Electrical and Mechanical Engineers from Bangladesh Military Academy on 21 December 1990. He belongs to 23rd BMA Long Course. The Gen completed B.Sc. in Electrical and Electronics Engineering from BUET in 1997. He completed Masters in Defence Studies, MBA in Finance and M.Sc. Engineering. He also completed Masters in Security and Development Studies in 2020. He is a graduate of Defence Services Command & Staff College and National Defence College.\r\n\r\nIn his service career, he is equipped with a balanced composition of command, staff and instructional assignments at different capacities in Bangladesh Army. In his unit service he has served 118, 115 & 137 Field Workshop Company EME in different appointments including Officer Commanding. He also served as Commanding Officer Production in 901 Central Workshop and Chief Inspector in IV&EE and IE&I. He has served in Army Headquarters, EME Directorate as staff officer. He was Instructor Class B in Electrical and Mechanical Engineering Centre and School and DS in School of Infantry & Tactics (SI&T).  He was DS in Armed Forces War Course wing of National Defence College. He was also served as Commandant in Electrical and Mechanical Engineering Centre and School.\r\n\r\nHe has served in different UN missions. As contingent member he served in Siearra Leone. As Military observer he served in Liberia and Syria and as Staff officer in the Force Headquarters in Mali.  He has attended several courses at home and abroad.\r\n\r\nHe has travelled different countries of the world such as USA, China, France, Germany, Turkey, Iran, Malaysia, Cambodia and United Arab Emirates. He has also performed Hazz and Umrah.\r\n\r\nOn 05 Jan 2021 before joining in EME Directorate as Director of Electrical and Mechanical Engineers he was the Course Member of National Defence College 2020.\r\n\r\nHe likes to travel with family and read books. He is married. His wife is a Banker. He is a proud father of one daughter and one son.'),
('General S M Shafiuddin Ahmed', 'male', 1, '', 'Chairman', 'SBP (BAR), OSP, ndu, psc, PhD', 'General S M Shafiuddin Ahmed, SBP (BAR), OSP, ndu, psc, PhD has taken over the Command of Bangladesh Army as the 17th Chief of Army Staff on 24 June 2021.\r\n\r\nThe General was born on 01 December 1963 in a reputed Muslim and Freedom Fighter Family in Khulna. He was commissioned with 9th BMA Long Course in the Corps of Infantry on 23 December 1983 in Bangladesh Army. He has been maintaining a phenomenal military career having the blend of Command, Staff and Instructional experiences at different levels with Bangladesh Armed Forces and Overseas Peacekeeping Mission.\r\n\r\nHis diversified command credential at Army level includes commanding Army Training and Doctrine Command (ARTDOC); at Division and Brigade level, he commanded the only Logistics Formation of Bangladesh Army, an Infantry Division and an Infantry Brigade. Besides, he also commanded an Infantry Battalion and the 1st Bangladesh Battalion (only one of its kinds) at Bangladesh Military Academy. He also has an iconic experience of commanding multinational forces in a start-up peacekeeping mission as the pioneer Deputy Force Commander in the United Nations Multidimensional Integrated Stabilization Mission in the Central African Republic (MINUSCA).\r\n\r\nIn his long illustrious career, he has served as the Director General of Bangladesh Institute of International and Strategic Studies (BIISS), and Senior Directing Staff (Army) of National Defence College (NDC), Bangladesh. General Shafiuddin has served as Brigade Major of an Infantry Brigade and Grade-l Staff Officer at the Formation Headquarters. He was also the Adjutant of Barishal Cadet College. The General has also served as the Chief of Doctrine Division in ARTDOC and Director of Military Training Directorate at the Army Headquarters.\r\n\r\nGeneral Shafiuddin has attended several military courses both at home and abroad. He is a graduate of Defence Services Command and Staff College (DSCSC), Mirpur, Bangladesh. He attended International Symposium Course in National Defence University (NDU), China and Defence and Strategic Studies Course at the same University. He is also a NESA graduate from NDU, Washington DC. Besides, General Shafiuddin led military delegations to USA, China, India, Japan, Kuwait, Indonesia, Nepal, Singapore and Sri Lanka, and held bilateral talks with the senior military leaderships on regional security and defence cooperation.\r\n\r\nGeneral Shafiuddin attained three Master Degrees on varied disciplines. He was awarded MPhil degree with First Class on Development and Security Studies from Bangladesh University of Professionals (BUP). He obtained Masters in Defence Studies (MDS) from National University, Bangladesh. He has also obtained Masters of Business Administration (MBA) from Dhaka University where he secured 1st position and received MIST Gold Medal. He obtained a Doctor of Philosophy from Bangladesh University of Professionals (BUP) through his research on Development and Security Studies.\r\n\r\nGeneral Shafiuddin is a widely travelled person who has visited many countries around the globe. The Sports loving General is a keen Golfer. Happily married to Noorjahan Ahmed, the General is a proud father of two daughters, Dr. Sheikh Rubaiya Ahmed and Sheikh Rufaida Fatima.'),
('Humaira Azam', 'female', 5, '', 'MD & CEO', 'MD & CEO', 'Humaira Azam has been appointed as the new Managing Director & Chief Executive Officer of Trust Bank Limited by breaking another \'Glass Ceiling\' as her latest appointment happens to be the first-ever for female banker in the commercial banking industry of Bangladesh in 50 years.\r\n\r\nPrior to her new role, she has served Trust Bank as the Additional Managing Director & Chief Risk Officer since 2018 until the Board choose her to confer the responsibility to lead the Bank in an extremely challenging market.\r\n\r\nBefore joining TBL, Humaira Azam served Bank Asia as Deputy Managing Director and had been holding the postion of Chief Risk Officer of the bank. She was the first woman to head a private commercial financial institution in Bangladesh (Managing Director & CEO, IPDC Bangladesh from 2009 to 2012).\r\n\r\nAfter completing Masters in Social Science (International Relations), Humaira Azam started her career in 1990 as a Management Trainee in ANZ Grindlays Bank. Since then she has been involved in various leadership roles entailing problem solving in a multicultural challenging environment. She directly worked with Mr. Mr. Muhammad A. (Rumee) Ali and grew the Local Corporate business in ANZ Bank as early as in 1993. She joined HSBC Bangladesh in its inception in 1996 and laid a very strong framework for Corporate Banking/ OBU, Custodian and Institutional Banking including formulation of 10 years’ strategy in Bangladesh. She helped Standard Chartered Bank (SCB) in Bangladesh in their four most critical years to cover for the shortfall in country budget through successful recovery. She was the first ever female member of the Country Management Committee (MANCO) of SCB Bangladesh. She played a critical role in the Country Strategy and restructured and broadened the role of financial institutions in SCB. She turned around IPDC, Bangladesh by restoring the capital and made significant progress in business and operational growth both in terms of quantity and quality through developing a strong deposit base, reducing dependency on banks for funding, rolling out specific policy to allow managed and sustainable credit growth including composition of branches. She built the internal framework for the systems and rolled them out along with final implementation during her tenure with Bank Asia including building a strong credit risk management (CRM) & risk management (RMD) team. Since joining in TBL, she is looking after strategy, policy roll out, risk and overall business. She has contributed significantly and participated in key decision-making processes of the bank (Strategic Planning, Capital Planning, Liquidity Planning, New Products and Services, Compensation Design & Operation\r\n\r\nHumaira Azam has attended in a good number of professional trainings, development programmes, workshops and seminars both at home & abroad. She has been Featured in the 300 most influential women in Islamic business and finance in the world in WOMANi 2020 annual report by Cambridge IFA. Junior Chamber International (JCI) Bangladesh has presented Mrs. Azam with the \'Woman of Inspiration Award 2020\' for her magnificent display of skill and irrefutable success in financial sector of Bangladesh. She was honored with “Top Women Bankers Award” by Brac Bank Limited, Bangladesh. She received “BOLD (Bangladesh Organization for Learning & Development) Women of Inspiration Awards 2017” under pinnacle career achiever sub category for her outstanding contribution in Banking. Earlier, she was awarded with “Hexagon Sales Award” by HSBC, Bangladesh for her outstanding achievement.\r\n\r\nHumaira Azam, a scholastic & an anthophile, was born on 03 December 1964 in a respectable muslim family of Dhaka. She is happily married with Mr. Ershadul Haque Khandker and blessed with one daughter. She has successfully led and worked with different teams over the last 31 years and delivered excellent results.'),
('Major General Md Jubayer Salehin', 'male', 2, '', 'Vice Chairman', 'SUP, ndu, psc', 'Major General Md Jubayer Salehin, SUP, ndu, psc was born on 1st February 1970. He got commissioned in the Corps of Engineers of Bangladesh Army on 23rd December 1988 with 19th  Bangladesh Military Academy (BMA) Long Course. During his training in BMA, he held appointments of Corporal and Company Senior Under Officer. Major General Jubayer Salehin is a graduate of Defence Services Command and Staff College of Bangladesh. He is also a graduate of Bangladesh University of Engineering and Technology in Civil Engineering. Major General Jubayer Salehin completed Masters of Business Administration from Jahangirnagar University and Masters in Defense Studies from National University of Bangladesh. He also earned Masters in National Security Strategy from National Defence University of USA.\r\n\r\nMajor General Jubayer Salehin is a Sapper officer with diversified knowledge on various fields of the military profession. He has completed a number of post commission military training both at home and abroad. He attended Officers’ Weapon Course, Engineer Officers’ Basic Course, Junior Officers’ Command and Staff Course, Officers’ Signal Course, Counter Insurgency Intelligence Course, Platoon Commanders’ Course, Unit Command Course and Higher Defense Orientation Course. He participated in seminars on Crisis Action Planning organized by United States Army, on Counter Terrorism organized by United Kingdom Army, on Laws of Armed Conflict organized by International Red Cross and Red Crescent, and on Military and the Media organized by Bangladesh Army.\r\n\r\nMajor General Jubayer Salehin has served in different command, staff and instructional appointments in a number of Units, Headquarters and Training Institutions. He was a Platoon Commander in Bangladesh Military Academy. He was a Brigade Major in an Engineer Brigade. He was a faculty member in School of Infantry and Tactics and also in the Defense Services Command and Staff College of Bangladesh. He served as Reconnaissance Officer, Platoon Commander, Adjutant, Planning Officer, Company Commander, and Second in Command in Engineer Units. He was a lead member of Bangladesh Engineer Contingent in Kuwait for clearance of explosive ordnance devices after the 1st Gulf War. He commanded Engineer Units twice in Bangladesh and once in United Nations Mission in Sudan. As a Brigadier General, he commanded an Engineer Construction Brigade and an Infantry Brigade. He also served as Chief Engineer of Dhaka North City Corporation. As Major General, he commanded an Infantry Division as General Officer Commanding and he also served in Defence Services Command and Staff College of Bangladesh as its Commandant.  Before assuming his present appointment, he served in Engineer in Chief at Army Headquarters. At present, he is serving as the Adjutant General at Army Headquarters.\r\n\r\nMajor General Jubayer Salehin has visited many countries of Asia, Europe, North America and Africa. He is happily married and blessed with two daughters.'),
('Mr. Anisuddin Ahmed Khan', 'male', 4, '', 'Independent Director', 'Qualification', 'Mr. Anisuddin Ahmed Khan, also known as Anis A. Khan is a Fellow of the Institute of Bankers, Bangladesh. He is former Managing Director & CEO of Mutual Trust Bank Limited (MTB), where he served for nearly eleven years from April 2009 till his retirement on November 30, 2019. Prior to joining MTB, he headed IDLC Finance Limited for six years. A career banker, he served earlier for 21 years with the then Grindlays Bank plc and its successor banks - ANZ Grindlays Bank and Standard Chartered Bank (SCB), both in Bangladesh and abroad.  \r\n\r\nHe has sound knowledge in corporate banking, credit appraisals and credit operations, banking operations and systems, trade finance, risk management, syndicated and structured finance, merchant banking and stock brokerage services, leasing, factoring, legal and compliance, mergers and acquisitions, business process re-engineering and transformation and up-gradation of information technology platforms, acquired in Bangladesh, India, UAE, UK, Australia and South Africa. He has presented a paper on “Financing the Transformation of the Bangladesh Garments Industry” at the School of South Asian Studies, University of Harvard, Cambridge, Massachusetts, USA and ‘Achieving SDGs: Financial Inclusion, Bangladesh Perspective’ at the Bangladesh Development Conference held there in June 2015. Similarly, he presented another paper on ‘Financial Inclusion’ at Kennedy Law School, University of Harvard in June 2017. He presented a paper on investment in Bangladesh at Yale University in March 2019.  \r\n\r\nMr. Khan has attended training courses on leadership, corporate governance  and strategic management at the University of Cambridge, United Kingdom; INSEAD, Fontainebleau, France; University of California, Berkeley, California, USA and at the London School of Economics, London, United Kingdom.  \r\n\r\nHe has served as the first ever Senior Vice President of the Metropolitan Chamber of Commerce & Industry, Dhaka (MCCI) and continues to be a director of the organisation. He is a  Life Member of the SAARC Chamber of Commerce and Industry and a Director of the Bangladesh Association of Publicly Listed Companies (BAPLC). He serves as Chairman of Valor of Bangladesh, Independent Trustee of the CSR Centre, Senior Vice President of the Bangladesh Cancer Aid Trust (BANCAT) and as a member of the Management Committee of Ispahani Islamia Eye Institute & Hospital (IIEI&H), Dhaka. He has served as Chairman of both the Association of Bankers, Bangladesh Limited (ABB) and Primary Dealers Bangladesh Limited (PDBL). While at MTB, he was Vice Chairman of MTB Securities Limited and MTB Capital Limited and Director of MTB Exchange (UK) Limited.   \r\n\r\nHe served earlier as a director of Eastern Bank Limited, Credit Rating Agency of Bangladesh Limited, Chittagong Stock Exchange Limited, Bangladesh Rating Agency Limited (BDRAL), Vice President of the Bangladesh Association of Publicly Listed Companies (BAPLC) and as Vice Chairman, Independent Director and Chairman of the Board Audit Committee of Industrial and Infrastructure Development Finance Company Limited (IIDFC).  \r\n\r\nHe is currently an Adjunct Professor at the School of Business and Entrepreneurship of Independent University Bangladesh (IUB). He also serves as Independent Director and Chairman of the Board Audit Committee and Nomination & Remuneration Committee of Berger Paints Bangladesh Ltd. He is an Independent Director of Summit Power Limited, Summit Alliance Port Limited (SAPL), Container Terminal Services Limited and Ananta Apparels Limited. A director of W&W Grains Corporation, Mr. Khan is also on the board of Central Counterparty Bangladesh Limited (CCBL), a company formed recently by the Government for the automated clearing operations of the stock exchanges.  \r\n\r\nInternationally, he serves as a Global Advisory Board member of 360tf, a newly formed fin-tech company based in Singapore.\r\n\r\nHe was presented the ‘Business & Entrepreneur Excellence Award 2016’ by the UK Bangladesh Catalysts of Commerce & Industry in the category of “Inspirational Leader of the Year” in November 2018.  '),
('Nusrat Khan', 'female', 4, '', 'Independent Director', 'Qualification', 'Nusrat Khan is a charismatic, hard working and role model leader in her arena. She not only works to achieve her aim to the fullest but also motivates her peers to go along with her and reach the coveted destination. Nusrat Khan has set exemplary standards in her path of work which are idolized by many. She has always thrived to work harder and harder to meet ends in the most befitting and workable manner.\r\n\r\nNusrat Khan started her career as Lecturer in Business Administration department of East West University. There she served from 2009 to 2010. Then she joined the Department of Finance of University of Dhaka as Lecturer on 2010. She also has working experience as adjunct faculty for North South and Stamford University. At present she is serving as Associate Professor of Department of Finance of University of Dhaka. Nusrat Khan has numerous journals published against her name. She is also working as an independent director of Bangladesh Welding Electrodes Ltd.\r\n\r\nNusrat Khan has an excellent educational background as well. She has brilliant achievement in every certificate exam in her academic career. She completed her Master of Science in Management of Risks with distinction from Peter J Tobin College of Business, St. John’s University, New York, USA. She received the most prestigious Fulbright Scholarship which is coordinated by the Bureau of Educational and Cultural Affairs (ECA) of the U.S. Department of State under policy guidelines established by the Fulbright Foreign Scholarship Board (FSB), with the help of 50 bi-national Fulbright commissions, U.S. embassies, and cooperating organizations in the U.S. She also received dean’s award from Peter J Tobin College of Business, St. John’s University, New York, USA for her remarkable achievement during her MSc degree. She was recognized as Beta Gamma Sigma business honor society member due to being among the top 5% of her business school in USA.\r\n\r\nNusrat Khan was born on 13 March 1983 in a respectable Muslim family in Dhaka. In her personal life Nusrat Khan is happily married and is blessed with a boy and a girl. In her 14 years of experience she has lead from the front and derived exemplary results in her work.');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_code`) VALUES
(100000),
(100003),
(100006),
(100007),
(100008),
(100010),
(100089),
(100091),
(100000),
(100003),
(100006),
(100007),
(100008),
(100010),
(100089),
(100091);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `details` text NOT NULL,
  `replay` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `account_no`, `name`, `email`, `subject`, `details`, `replay`, `date`) VALUES
(1, 100002, 'Md Mominul Islam', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23'),
(2, 100002, 'Robius Sany Siam', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23'),
(3, 100002, 'Tanvirul ISlam', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23'),
(4, 100002, 'Siddhanto Kundu', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '', '2024-04-23'),
(5, 100002, 'Labib Ahsan', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23'),
(6, 100002, 'Sumon Ahmed', 'adfffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23'),
(7, 100002, 'Abdullah Al Mamun', 'adfffffmin@gmail.com', 'Complaint Regarding Overdrafted Charges on Account 587545896', 'I am writing to complain about a series of overdraft charges that were applied to my checking account ending in XXXX on [Date].\r\nI understand that I am responsible for maintaining sufficient funds in my account to cover debits. However, I believe these overdraft charges were unfair due to the following reasons:\r\nUnaware of Minimum Balance Requirement: I recently switched to your bank and was not informed about a minimum balance requirement to avoid overdraft charges. I reviewed the account opening documents I received and could not find any mention of this policy.\r\nACH Debit Not Reflected Before Point-of-Sale Transaction: A recurring automatic debit of $[Amount] for [Service] was scheduled to withdraw from my account on [Date]. Unfortunately, this ACH withdrawal did not appear to be reflected in my available balance before I made a debit card purchase for $[Amount] at [Store Name] on the same date. If the ACH withdrawal had been processed first, as I expected, the point-of-sale transaction would not have caused an overdraft.\r\nI kindly request that you review my account history and consider waiving the overdraft charges totaling $[Amount].I have since reviewed my account settings and adjusted my recurring debits to ensure this does not happen again.\r\nThank you for your time and attention to this matter. I look forward to your response.', '0', '2024-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nid`, `first_name`, `last_name`, `picture`, `email`, `phone`, `gender`, `address`, `division`, `district`, `dob`) VALUES
(100000, '12345678901234567', 'John', 'Doe', NULL, 'john.doe@example.com', '01699875478', 'Male', 'House #01, Road #02, Gulshan, Dhaka', 'Dhaka', 'Dhaka', NULL),
(100001, '23456789012345678', 'Jane', 'Smith', NULL, 'jane.smith@example.com', '01699875478', 'Female', 'Flat #02, Building #03, Agrabad, Chittagong', 'Chittagong', 'Chittagong', NULL),
(100002, '34567890123456789', 'Mike', 'Johnson', NULL, 'mike.johnson@example.com', '01699875478', 'Male', 'Plot #03, Block #04, Sonadanga, Khulna', 'Khulna', 'Khulna', NULL),
(100003, '45678901234567890', 'Emily', 'Brown', NULL, 'emily.brown@example.com', '01699875478', 'Female', 'House #04, Road #05, Boalia, Rajshahi', 'Rajshahi', 'Rajshahi', NULL),
(100004, '56789012345678901', 'David', 'Williams', NULL, 'david.williams@example.com', '01699875478', 'Male', 'Apartment #05, Block #06, Ambarkhana, Sylhet', 'Sylhet', 'Sylhet', '2024-04-25'),
(100005, '67890123456789012', 'Sarah', 'Miller', NULL, 'sarah.miller@example.com', '01699875478', 'Female', 'House #06, Road #07, Natun Bazar, Barisal', 'Barisal', 'Barisal', NULL),
(100006, '78901234567890123', 'James', 'Taylor', NULL, 'james.taylor@example.com', '01699875478', 'Male', 'Flat #07, Building #08, Kandirpar, Comilla', 'Comilla', 'Chittagong', NULL),
(100007, '89012345678901234', 'Emma', 'Wilson', NULL, 'emma.wilson@example.com', '01699875478', 'Female', 'House #08, Road #09, Choto Bazar, Mymensingh', 'Mymensingh', 'Mymensingh', NULL),
(100008, '90123456789012345', 'Michael', 'Anderson', NULL, 'michael.anderson@example.com', '01699875478', 'Male', 'Plot #09, Block #10, Dhap, Dinajpur', 'Dinajpur', 'Rangpur', NULL),
(100009, '01234567890123456', 'Olivia', 'Martinez', NULL, 'olivia.martinez@example.com', '01699875478', 'Female', 'House #10, Road #11, Chowgacha, Jessore', 'Jessore', 'Khulna', '2024-04-12'),
(100010, '12348678901234567', 'Daniel', 'Thomas', NULL, 'daniel.thomas@example.com', '01699875478', 'Male', 'Flat #11, Building #12, Chandona Chowrasta, Narayanganj', 'Narayanganj', 'Dhaka', NULL),
(100011, '23456689012345678', 'Sophia', 'Garcia', NULL, 'sophia.garcia@example.com', '01699875478', 'Female', 'House #12, Road #13, T&T Road, Tangail', 'Tangail', 'Dhaka', NULL),
(100012, '34567890123456788', 'William', 'Rodriguez', NULL, 'william.rodriguez@example.com', '01699875478', 'Male', 'Plot #13, Block #14, Mithapukur, Rangpur', 'Rangpur', 'Rangpur', NULL),
(100013, '45678901734567890', 'Isabella', 'Lopez', NULL, 'isabella.lopez@example.com', '01699875478', 'Female', 'Flat #14, Building #15, Shondhani Ghat, Narsingdi', 'Narsingdi', 'Dhaka', '2024-04-20'),
(100014, '54789012345678901', 'Ethan', 'Hernandez', NULL, 'ethan.hernandez@example.com', '01699875478', 'Male', 'House #15, Road #16, Ranihati, Bogra', 'Bogra', 'Rajshahi', '2024-04-26'),
(100015, '17890123456789012', 'Ava', 'Gonzalez', NULL, 'ava.gonzalez@example.com', '01699875478', 'Female', 'Apartment #16, Block #17, Rampura, Satkhira', 'Satkhira', 'Khulna', NULL),
(100016, '78901934567890123', 'Alexander', 'Perez', NULL, 'alexander.perez@example.com', '01699875478', 'Male', 'House #17, Road #18, Shantinagar, Faridpur', 'Faridpur', 'Dhaka', NULL),
(100017, '89012345278901234', 'Mia', 'Sanchez', NULL, 'mia.sanchez@example.com', '01699875478', 'Female', 'Plot #18, Block #19, Darbeshpur, Gaibandha', 'Gaibandha', 'Rangpur', NULL),
(100018, '90123456389012345', 'Benjamin', 'Ramirez', NULL, 'benjamin.ramirez@example.com', '01699875478', 'Male', 'House #19, Road #20, Baharbunia, Bagerhat', 'Bagerhat', 'Khulna', NULL),
(100019, '91434567890123456', 'Charlotte', 'Torres', NULL, 'charlotte.torres@example.com', '01699875478', 'Female', 'Flat #20, Building #21, Haji Mohsin Road, Pabna', 'Pabna', 'Rajshahi', '2024-04-26'),
(100020, '12345678931234567', 'Henry', 'Rivera', NULL, 'henry.rivera@example.com', '01699875478', 'Male', 'House #21, Road #22, Laboni Point, Coxs Bazar', 'Coxs Bazar', 'Chittagong', '2024-04-26'),
(100083, '25875466985478515', 'Md Mominul', 'Islam', NULL, 'mominulislam4095@gmail.com', '01951389721', 'Male', 'Balarhat,Mithapukur,Rangpur', 'Rangpur', 'Rangpur', NULL),
(100084, '256984558785451', 'madfadfadf', 'adsfadsfadsf', NULL, 'asdfasdfsdaf@gmail.com', '143141341', 'Male', 'asdfadsf', 'asdfadf', 'asdfadsf', NULL),
(100085, '56465464564665555', 'sdf', 'asdf', NULL, 'adffffffmin@gmail.com', '234234', 'Male', 'adsfasdf', 'adsfasdf', 'sdfasdf', NULL),
(100086, '654654654654654', 'adsfasdf', 'asdfasdf', NULL, 'adffffffmin@gmail.com', '0234523455', 'Male', 'adsfasdf', 'adsfasdf', 'ygyugu', NULL),
(100092, '321654646546545', 'Simron', 'Hetmair', NULL, 'adsfadsfdsf@gmail.com', '01877549965', 'Male', 'sadfasdfadsfasdf', 'asdfasdf', 'asdfasdf', NULL),
(100093, '589785854872526', 'Siam', 'Hasan', NULL, 'siamhasan@gmail.com', '01788965525', 'Male', 'asdfasdf', 'asdfasdf', 'asdfasdf', NULL),
(100094, '5465465465654669', 'Md Mominul', 'Islam', NULL, 'adfffmin@gmail.com', '0254352435', 'Male', 'adsfasdf', 'adsfasdf', 'asdfasdf', NULL),
(100095, '5465465465465645', 'Md Mominul', 'Islam', NULL, 'adfffmin@gmail.com', '8801737643235', 'Male', 'adsfasdf', 'sdfasdfadsf', 'asdfasdf', '2024-04-25'),
(100096, '34523452', 'sdfasdfadsf', 'asdfsdfasd', NULL, 'adfffddffmin@gmail.com', '8801788965447', 'Male', 'adsfasdf', 'sdfasdf', 'asdfasdf', '2024-04-24'),
(100097, '6546454654654654', 'Siam ', 'Hasan', NULL, 'adfffdfdsffmin@gmail.com', '8801758963324', 'Male', 'adsfasdf', 'sdfadsf', 'asdfadsf', '2024-04-25'),
(100098, '345245234', 'Md Mominul', 'Islam', NULL, 'adfffmin@gmail.com', '523452345234', 'Male', 'adsfasdf', 'degsdfgsd', 'sdfgsdfg', '2024-04-11'),
(100099, '65464646', 'asdfasdf', 'asdfasdf', NULL, 'adffdddfffmin@gmail.com', '8801987554785', 'Male', 'adsfasdf', 'asdfasdf', 'asdfasdf', '2024-04-25'),
(100100, '65464646', 'asdfasdf', 'asdfasdf', NULL, 'adffdddfffmin@gmail.com', '8801987554785', 'Male', 'adsfasdf', 'asdfasdf', 'asdfasdf', '2024-04-25'),
(100101, '654654654646546', 'Md Mominul', 'Islam', '', 'adfffmin@gmail.com', '0254352435', 'Male', 'adsfasdf', 'asdfasd', 'ASDfsafadfs', NULL),
(100102, '6546546546564565', 'Md Mominul', 'Islam', '', 'mominulislam4444@gmail.com', '0254352435', 'Male', 'adsfasdf', 'asdfasd', 'asdfasdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `division_id`, `district_name`) VALUES
(1, 1, 'BARGUNA'),
(2, 1, 'BARISAL'),
(3, 1, 'BHOLA'),
(4, 1, 'JHALOKATI'),
(5, 1, 'PATUAKHALI'),
(6, 1, 'PIROJPUR'),
(7, 2, 'BANDARBAN'),
(8, 2, 'BRAHMANBARIA'),
(9, 2, 'CHANDPUR'),
(10, 2, 'CHITTAGONG'),
(11, 2, 'COMILLA'),
(12, 2, 'COXS BAZAR'),
(13, 2, 'FENI'),
(14, 2, 'KHAGRACHHARI'),
(15, 2, 'LAKSHMIPUR'),
(16, 2, 'NOAKHALI'),
(17, 2, 'RANGAMATI'),
(18, 3, 'DHAKA'),
(19, 3, 'FARIDPUR'),
(20, 3, 'GAZIPUR'),
(21, 3, 'GOPALGANJ'),
(22, 3, 'JAMALPUR'),
(23, 3, 'KISHOREGONJ'),
(24, 3, 'MADARIPUR'),
(25, 3, 'MANIKGANJ'),
(26, 3, 'MUNSHIGANJ'),
(27, 3, 'MYMENSINGH'),
(28, 3, 'NARAYANGANJ'),
(29, 3, 'NARSINGDI'),
(30, 3, 'NETRAKONA'),
(31, 3, 'RAJBARI'),
(32, 3, 'SHARIATPUR'),
(33, 3, 'SHERPUR'),
(34, 3, 'TANGAIL'),
(35, 4, 'BAGERHAT'),
(36, 4, 'CHUADANGA'),
(37, 4, 'JESSORE'),
(38, 4, 'JHENAIDAH'),
(39, 4, 'KHULNA'),
(40, 4, 'KUSHTIA'),
(41, 4, 'MAGURA'),
(42, 4, 'MEHERPUR'),
(43, 4, 'NARAIL'),
(44, 4, 'SATKHIRA'),
(45, 5, 'BOGRA'),
(46, 5, 'JOYPURHAT'),
(47, 5, 'NAOGAON'),
(48, 5, 'NATORE'),
(49, 5, 'CHAPAI NABABGANJ'),
(50, 5, 'PABNA'),
(51, 5, 'RAJSHAHI'),
(52, 5, 'SIRAJGANJ'),
(53, 6, 'DINAJPUR'),
(54, 6, 'GAIBANDHA'),
(55, 6, 'KURIGRAM'),
(56, 6, 'LALMONIRHAT'),
(57, 6, 'NILPHAMARI'),
(58, 6, 'PANCHAGARH'),
(59, 6, 'RANGPUR'),
(60, 6, 'THAKURGAON'),
(61, 7, 'HABIGANJ'),
(62, 7, 'MAULVIBAZAR'),
(63, 7, 'SUNAMGANJ'),
(64, 7, 'SYLHET');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'BARISAL'),
(2, 'CHITTAGONG'),
(3, 'DHAKA'),
(4, 'KHULNA'),
(5, 'RAJSHAHI'),
(6, 'RANGPUR'),
(7, 'SYLHET');

-- --------------------------------------------------------

--
-- Table structure for table `dps`
--

CREATE TABLE `dps` (
  `dps_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `scheme_id` int(11) DEFAULT NULL,
  `current_balance` float DEFAULT NULL,
  `pin_code` int(50) NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `paid_installment` int(11) DEFAULT NULL,
  `nom_name` text NOT NULL,
  `nom_nid` int(11) NOT NULL,
  `nom_address` text NOT NULL,
  `nom_relation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dps`
--

INSERT INTO `dps` (`dps_id`, `customer_id`, `scheme_id`, `current_balance`, `pin_code`, `status`, `opening_date`, `closing_date`, `paid_installment`, `nom_name`, `nom_nid`, `nom_address`, `nom_relation`) VALUES
(100000, 100000, 1, 18000, 1234, 'active', '2023-09-13', NULL, 6, '', 0, '', ''),
(100001, 100001, 2, 0, 1234, 'closed', '2023-08-14', '2024-02-14', 6, '', 0, '', ''),
(100002, 100002, 3, 18000, 1234, 'active', '2023-09-20', NULL, 6, '', 0, '', ''),
(100003, 100003, 4, 30000, 1234, 'active', '2023-05-01', NULL, 10, '', 0, '', ''),
(100004, 100004, 5, 0, 1234, 'closed', '2022-03-15', '2024-03-15', 24, '', 0, '', ''),
(100005, 100005, 3, 21000, 1234, 'active', '2023-08-22', NULL, 7, '', 0, '', ''),
(100006, 100006, 2, 0, 1234, 'closed', '2023-08-21', '2024-02-21', 6, '', 0, '', ''),
(100007, 100007, 3, 12000, 1234, 'active', '2023-11-13', NULL, 4, '', 0, '', ''),
(100008, 100008, 4, 3000, 1234, 'active', '2024-02-05', NULL, 1, '', 0, '', ''),
(100009, 100009, 5, 3000, 1234, 'active', '2024-02-02', NULL, 1, '', 0, '', ''),
(100010, 100010, 1, 0, 1234, 'closed', '2023-12-03', '2024-03-03', 3, '', 0, '', ''),
(100011, 100011, 2, 6000, 1234, 'active', '2024-01-02', NULL, 2, '', 0, '', ''),
(100012, 100012, 3, 12000, 1234, 'active', '2023-11-14', NULL, 4, '', 0, '', ''),
(100013, 100013, 4, 0, 1234, 'closed', '2022-08-28', '2024-02-28', 18, '', 0, '', ''),
(100014, 100014, 5, 12000, 1234, 'active', '2023-07-12', NULL, 8, 'dfasdf', 2147483647, 'asdfasdf', 'asdfasdf'),
(100021, 100012, 3, 0, 1234, 'active', '2024-03-29', NULL, 0, '', 0, '', ''),
(100022, 100010, 3, 0, 1234, 'active', '2024-04-01', NULL, 0, '', 0, '', ''),
(100023, 100019, 2, 0, 1234, 'active', '2024-04-01', NULL, 0, '', 0, '', ''),
(100024, 100004, 2, 0, 1234, 'active', '2024-04-01', NULL, 0, 'Md Mominul Islam', 2147483647, 'adsfasdf', 'brother'),
(100025, 100009, 1, 0, 1234, 'active', '2024-04-01', NULL, 0, '', 0, '', ''),
(100026, 100009, 2, 0, 1234, 'active', '2024-04-01', NULL, 0, 'asdfasdfa asdfasd', 2147483647, 'asdfasdf', 'asdfasdfadsf'),
(100027, 100095, 4, 0, 1234, 'active', '2024-04-21', NULL, 0, 'Mahin Islam', 2147483647, 'adsfasdf asdfasdfasdf', 'Brother');

-- --------------------------------------------------------

--
-- Table structure for table `dps_scheme`
--

CREATE TABLE `dps_scheme` (
  `scheme_id` int(11) NOT NULL,
  `tenure` int(11) DEFAULT NULL,
  `total_installment` int(11) DEFAULT NULL,
  `maturity_amount` float DEFAULT NULL,
  `installment_amount` float DEFAULT NULL,
  `interest_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dps_scheme`
--

INSERT INTO `dps_scheme` (`scheme_id`, `tenure`, `total_installment`, `maturity_amount`, `installment_amount`, `interest_rate`) VALUES
(1, 3, 3, 9450, 3000, 5),
(2, 6, 6, 19440, 3000, 8),
(3, 12, 12, 39240, 3000, 9),
(4, 18, 18, 60480, 3000, 12),
(5, 24, 24, 82800, 3000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `employee_type` int(11) NOT NULL,
  `salary` float DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `nid`, `picture`, `phone`, `email`, `gender`, `address`, `city`, `state`, `designation`, `employee_type`, `salary`, `doj`, `dob`, `password`) VALUES
(100053, 'Md.', 'Rahman', '1234567890', NULL, '01712345678', 'rahman@example.com', 'Male', '123 Main Road, Dhaka', 'Dhaka', 'Dhaka', 'Manager', 1, 50000, '2023-06-15', NULL, '1234'),
(100054, 'Fatima', 'Akter', '2345678901', NULL, '01987654321', 'fatima@example.com', 'Female', '321 Sunset Boulevard, Rajshahi', 'Rajshahi', 'Rajshahi', 'Assistant Manager', 2, 40000, '2023-06-01', NULL, '1234'),
(100056, 'Sara', 'Ahmed', '4567890123', NULL, '01654321098', 'sara@example.com', 'Female', '876 Galaxy Street, Rangpur', 'Rangpur', 'Rangpur', 'Analyst', 2, 35000, '2023-06-16', NULL, '1234'),
(100057, 'Abdul', 'Karim', '5678901234', NULL, '01543210987', 'abdul@example.com', 'Male', '432 River View, Jessore', 'Khulna', 'Jessore', 'Customer Service Representative', 2, 30000, '2023-06-01', NULL, '1234'),
(100058, 'Nazma', 'Khatun', '6789012345', NULL, '01432109876', 'nazma@example.com', 'Female', '987 Hilltop Road, Narayanganj', 'Dhaka', 'Narayanganj', 'Clerk', 2, 25000, '2023-05-30', NULL, '1234'),
(100059, 'Imran', 'Hossain', '7890123456', NULL, '01321098765', 'imran@example.com', 'Male', '123 Street, Rajshahi', 'Rajshahi', 'Rajshahi', 'Manager', 2, 50000, '2023-06-05', NULL, '1234'),
(100060, 'Sabrina', 'Akhter', '8901234567', NULL, '01210987654', 'sabrina@example.com', 'Female', '456 Lane, Rajshahi', 'Rajshahi', 'Rajshahi', 'Assistant Manager', 2, 40000, '2023-06-11', NULL, '1234'),
(100061, 'Kamal', 'Hossain', '9012345678', NULL, '01109876543', 'kamal@example.com', 'Male', '789 Road, Dhaka', 'Dhaka', 'Dhaka', 'Senior Analyst', 2, 45000, '2023-05-24', NULL, '1234'),
(100062, 'Tahmina', 'Akter', '0123456789', NULL, '01098765432', 'tahmina@example.com', 'Female', '987 Lane, Rajshahi', 'Rajshahi', 'Rajshahi', 'Senior Analyst', 2, 35000, '2023-06-04', '2000-02-15', '1234'),
(100063, 'Faisal', 'Khan', '1234509876', NULL, '01987654321', 'faisal@example.com', 'Male', '654 Park, Mymensingh', 'Mymensingh', 'Mymensingh', 'Customer Service Representative', 2, 30000, '2023-05-23', NULL, '1234'),
(100064, 'Shabnam', 'Islam', '2345678901', NULL, '01876543210', 'shabnam@example.com', 'Female', '321 Road, Rangpur', 'Rangpur', 'Rangpur', 'Clerk', 2, 25000, '2023-05-24', NULL, '1234'),
(100065, 'Nasir', 'Ahmed', '3456789012', NULL, '01765432109', 'nasir@example.com', 'Male', '876 Lane, Jessore', 'Khulna', 'Jessore', 'Manager', 3, 50000, '2023-05-29', NULL, '1234'),
(100066, 'Rina', 'Khatun', '4567890123', NULL, '01654321098', 'rina@example.com', 'Female', '123 Avenue, Narayanganj', 'Dhaka', 'Narayanganj', 'Assistant Manager', 2, 40000, '2023-05-27', NULL, '1234'),
(100067, 'Rahim', 'Hossain', '5678901234', NULL, '01543210987', 'rahim@example.com', 'Male', '321 Street, Rajshahi', 'Rajshahi', 'Rajshahi', 'Senior Analyst', 3, 45000, '2023-05-30', NULL, '1234'),
(100068, 'Nusrat', 'Akhter', '6789012345', NULL, '01432109876', 'nusrat@example.com', 'Female', '987 Lane, Rajshahi', 'Rajshahi', 'Rajshahi', 'Analyst', 2, 35000, '2023-05-19', NULL, '1234'),
(100069, 'Aminul', 'Islam', '7890123456', NULL, '01321098765', 'aminul@example.com', 'Male', '456 Road, Dhaka', 'Dhaka', 'Dhaka', 'Customer Service Representative', 3, 30000, '2023-05-19', NULL, '1234'),
(100071, 'Mahmud', 'Khan', '9012345678', NULL, '01109876543', 'mahmud@example.com', 'Male', '654 Lane, Mymensingh', 'Mymensingh', 'Mymensingh', 'Manager', 2, 50000, '2023-06-06', NULL, '1234'),
(100072, 'Lubna', 'Islam', '0123456789', NULL, '01098765432', 'lubna@example.com', 'Female', '321 Avenue, Rangpur', 'Rangpur', 'Rangpur', 'Assistant Manager', 2, 40000, '2023-05-27', NULL, '1234'),
(100073, 'Akram', 'Ahmed', '1234509876', NULL, '01987654321', 'akram@example.com', 'Male', '876 Road, Jessore', 'Khulna', 'Jessore', 'Senior Analyst', 3, 45000, '2023-06-04', NULL, '1234'),
(100074, 'Fahmida', 'Khatun', '2345678901', NULL, '01876543210', 'fahmida@example.com', 'Female', '123 Street, Narayanganj', 'Dhaka', 'Narayanganj', 'Analyst', 3, 35000, '2023-06-13', NULL, '1234'),
(100075, 'Rahat', 'Hossain', '3456789012', NULL, '01765432109', 'rahat@example.com', 'Male', '321 Avenue, Rajshahi', 'Rajshahi', 'Rajshahi', 'Manager', 3, 30000, '2023-06-09', NULL, '1234'),
(100076, 'Sadaf', 'Akhter', '4567890123', NULL, '01654321098', 'sadaf@example.com', 'Female', '876 Lane, Rajshahi', 'Rajshahi', 'Rajshahi', 'Clerk', 3, 25000, '2023-06-17', NULL, '1234'),
(100077, 'Kamal', 'Hossain', '5678901234', NULL, '01543210987', 'kamal@example.com', 'Male', '789 Road, Dhaka', 'Dhaka', 'Dhaka', 'Manager', 2, 50000, '2023-06-09', NULL, '1234'),
(100078, 'Tahmina', 'Akter', '6789012345', NULL, '01432109876', 'tahmina@example.com', 'Female', '987 Lane, Rajshahi', 'Rajshahi', 'Rajshahi', 'Assistant Manager', 2, 40000, '2023-06-06', NULL, '1234'),
(100087, 'asdfasdf', 'asdfasdf', '6546546546465', NULL, '+8801954668974', 'adfffffmin@gmail.com', 'Male', 'adsfasdf', 'adsfasdf', 'adsf', 'Bank Clerk', 4, 50000, '2024-04-19', '2024-04-27', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendence`
--

CREATE TABLE `employee_attendence` (
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_reason` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `acceptorreject_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`leave_id`, `employee_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `apply_date`, `acceptorreject_date`) VALUES
(7, 100056, 'Family Tour', 'Due to [brief reason for leave], I am requesting a leave of absence from work for [number] days, from [start date] to [end date]. I have already completed all urgent tasks for my current projects and ensured everything will be caught up upon my return. I will have limited email access but can be reached for urgent matters at [phone number]. Thank you for your time and consideration.\r\n\r\nThis paragraph incorporates the key elements of a leave request into a concise and professional format. You can customize it further by adding details specific to your situation.', 'accept', '2024-03-12', '2024-03-30', '2024-02-28', NULL),
(10, 100056, 'asdfasd', 'Due to [brief reason for leave], I am requesting a leave of absence from work for [number] days, from [start date] to [end date]. I have already completed all urgent tasks for my current projects and ensured everything will be caught up upon my return. I will have limited email access but can be reached for urgent matters at [phone number]. Thank you for your time and consideration.\r\n\r\nThis paragraph incorporates the key elements of a leave request into a concise and professional format. You can customize it further by adding details specific to your situation.', 'pending', '2024-04-06', '2024-04-23', '2024-03-17', NULL),
(11, 100056, 'sdfsdf', 'Due to [brief reason for leave], I am requesting a leave of absence from work for [number] days, from [start date] to [end date]. I have already completed all urgent tasks for my current projects and ensured everything will be caught up upon my return. I will have limited email access but can be reached for urgent matters at [phone number]. Thank you for your time and consideration.\r\n\r\nThis paragraph incorporates the key elements of a leave request into a concise and professional format. You can customize it further by adding details specific to your situation.', 'pending', '2024-04-25', '2024-04-27', '2024-02-25', '2024-04-19'),
(12, 100054, 'dsfasdfasdf', 'Due to [brief reason for leave], I am requesting a leave of absence from work for [number] days, from [start date] to [end date]. I have already completed all urgent tasks for my current projects and ensured everything will be caught up upon my return. I will have limited email access but can be reached for urgent matters at [phone number]. Thank you for your time and consideration.\r\n\r\nThis paragraph incorporates the key elements of a leave request into a concise and professional format. You can customize it further by adding details specific to your situation.', 'pending', '2024-04-24', '2024-04-28', '2024-03-12', NULL),
(13, 100054, 'Study Leave', 'Due to [brief reason for leave], I am requesting a leave of absence from work for [number] days, from [start date] to [end date]. I have already completed all urgent tasks for my current projects and ensured everything will be caught up upon my return. I will have limited email access but can be reached for urgent matters at [phone number]. Thank you for your time and consideration.\r\n\r\nThis paragraph incorporates the key elements of a leave request into a concise and professional format. You can customize it further by adding details specific to your situation.', 'accept', '2024-05-01', '2024-04-30', '2024-04-20', '2024-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`, `create_date`) VALUES
(1, 'What are the requirements to open a bank account?', 'To open a bank account, you typically need identification documents such as a passport or driver\'s license, proof of address, and an initial deposit amount. Requirements may vary depending on the bank and account type.', '2024-04-21'),
(3, 'What should I do if my credit card is lost or stolen?', 'If your credit card is lost or stolen, you should immediately contact your bank\'s customer service hotline to report it. They will assist you in canceling the card and issuing a replacement.', '2024-04-21'),
(4, 'What is the difference between a savings account and a current account?', 'A savings account is typically used to save money over a period of time and earns interest on the balance, while a current account is used for day-to-day transactions and generally does not earn interest.', '2024-04-21'),
(5, 'How can I check my account balance?', 'You can check your account balance by logging into your online banking account, using a mobile banking app, visiting an ATM, or contacting your bank\'s customer service.', '2024-04-21'),
(6, 'What is the procedure for transferring money to another account?', 'To transfer money to another account, you can use online banking, mobile banking, or visit a bank branch. You\'ll need to provide the recipient\'s account details and specify the amount to be transferred.', '2024-04-21'),
(7, 'What are the benefits of using online banking?', 'Online banking offers convenience, allowing you to access your account anytime, anywhere. It also provides features such as bill payment, fund transfers, and account management tools.', '2024-04-21'),
(8, 'How can I protect my online banking account from fraud?', 'You can protect your online banking account by using strong, unique passwords, enabling two-factor authentication, avoiding public Wi-Fi for banking transactions, and regularly monitoring your account activity.', '2024-04-21'),
(9, 'What are the types of loans offered by banks?', 'Banks offer various types of loans, including personal loans, home loans, car loans, education loans, and business loans. Each type of loan has specific eligibility criteria and terms.', '2024-04-21'),
(10, 'What is the process for closing a bank account?', 'To close a bank account, you typically need to visit your bank branch, fill out an account closure form, and return any unused checks and debit cards associated with the account. Make sure to withdraw any remaining balance before closing the account.', '2024-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `fdr`
--

CREATE TABLE `fdr` (
  `fdr_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `scheme_id` int(11) DEFAULT NULL,
  `pin_code` int(50) NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `principle_amount` int(11) NOT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `nom_name` text NOT NULL,
  `nom_nid` int(11) NOT NULL,
  `nom_address` text NOT NULL,
  `nom_relation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdr`
--

INSERT INTO `fdr` (`fdr_id`, `customer_id`, `scheme_id`, `pin_code`, `status`, `principle_amount`, `opening_date`, `closing_date`, `nom_name`, `nom_nid`, `nom_address`, `nom_relation`) VALUES
(100000, 100002, 3, 1234, 'active', 10000, '2024-01-30', NULL, '', 0, '', ''),
(100001, 100003, 1, 1234, 'pending', 20000, NULL, NULL, '', 0, '', ''),
(100002, 100004, 4, 1234, 'closed', 50000, '2023-01-30', '2024-01-30', '', 0, '', ''),
(100003, 100005, 2, 1234, 'active', 15000, '2024-02-15', NULL, '', 0, '', ''),
(100004, 100006, 3, 1234, 'pending', 30000, NULL, NULL, '', 0, '', ''),
(100005, 100007, 1, 1234, 'active', 25000, '2024-03-01', NULL, '', 0, '', ''),
(100006, 100008, 4, 1234, 'closed', 40000, '2023-02-28', '2024-02-28', '', 0, '', ''),
(100007, 100009, 2, 1234, 'pending', 20000, NULL, NULL, '', 0, '', ''),
(100008, 100010, 3, 1234, 'active', 30000, '2024-01-15', NULL, '', 0, '', ''),
(100009, 100011, 1, 1234, 'closed', 45000, '2023-03-15', '2024-03-15', '', 0, '', ''),
(100010, 100012, 2, 1234, 'pending', 18000, NULL, NULL, '', 0, '', ''),
(100011, 100013, 4, 1234, 'active', 35000, '2024-02-10', NULL, '', 0, '', ''),
(100012, 100014, 3, 1234, 'pending', 25000, NULL, NULL, '', 0, '', ''),
(100013, 100015, 1, 1234, 'active', 28000, '2024-02-28', NULL, '', 0, '', ''),
(100014, 100016, 4, 1234, 'closed', 60000, '2023-02-07', '2024-02-07', '', 0, '', ''),
(100015, 100017, 2, 1234, 'pending', 22000, NULL, NULL, '', 0, '', ''),
(100016, 100018, 3, 1234, 'active', 32000, '2024-03-10', NULL, '', 0, '', ''),
(100018, 100020, 2, 1234, 'pending', 24000, NULL, NULL, '', 0, '', ''),
(100019, 100001, 4, 1234, 'active', 38000, '2024-02-15', NULL, '', 0, '', ''),
(100020, 100000, 3, 1234, 'pending', 27000, NULL, NULL, '', 0, '', ''),
(100021, 100005, 1, 1234, 'active', 30000, '2024-03-13', NULL, '', 0, '', ''),
(100022, 100006, 4, 1234, 'closed', 70000, '2023-02-02', '2024-02-02', '', 0, '', ''),
(100023, 100013, 2, 1234, 'pending', 26000, NULL, NULL, '', 0, '', ''),
(100024, 100009, 3, 1234, 'active', 35000, '2023-12-14', NULL, '', 0, '', ''),
(100025, 100014, 1, 1234, 'pending', 32000, NULL, NULL, '', 0, '', ''),
(100026, 100017, 4, 1234, 'active', 42000, '2024-06-10', NULL, '', 0, '', ''),
(100027, 100019, 2, 1234, 'pending', 28000, NULL, NULL, 'asdfasdf', 2147483647, 'asdfasdfad', 'sasdfasdf'),
(100028, 100020, 3, 1234, 'active', 40000, '2024-06-15', NULL, 'adsfasdf asdfasdf', 2147483647, 'adsfasdf', 'brother'),
(100029, 100013, 3, 1234, 'pending', 25000, NULL, NULL, 'Md Mominul Islam', 2147483647, 'adsfasdf', 'brother'),
(100030, 100016, 2, 1234, 'closed', 25000, NULL, NULL, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fdr_scheme`
--

CREATE TABLE `fdr_scheme` (
  `scheme_id` int(11) NOT NULL,
  `tenure` int(11) DEFAULT NULL,
  `interest_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdr_scheme`
--

INSERT INTO `fdr_scheme` (`scheme_id`, `tenure`, `interest_rate`) VALUES
(1, 1, 5),
(2, 3, 7),
(3, 6, 9),
(4, 12, 15);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `published_date` date DEFAULT NULL,
  `pdf` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `description`, `published_date`, `pdf`) VALUES
(3, 'MEMORANDUM : Official visit of Chief Executive Officer of Sonali Bank PLC to USA & Turkey', 'Memorandum: HRDD/Training/Overseas-01/2023/2907, Dated: 21/12/2023: 07 Executive/Officials have been nominated by the competent authority to carry out the Factory visit with Product Specific Training on \"Structured Cabling System and Over Head LAN for near Data Center (NDC) of Sonali Bank PLC\" in Berlin, Germany.', '2024-04-14', '../photo/ch14.pdf'),
(8, 'NOC for Anjuman Ara Moni, Index No G-45253, Senior Officer (Cash), Ramna Corporate Branch, Dhaka', '', '2024-04-14', '../photo/222.pdf'),
(9, 'NOC for Mr. Jahidul Islam, Index No (G-47223, Senior Officer (Cash), Rajoir Br. Madaripur', '', '2024-04-14', '../photo/333.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_code` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `salary_year` int(11) DEFAULT NULL,
  `salary_month` int(11) DEFAULT NULL,
  `salary_amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `paid_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_tution_fee`
--

CREATE TABLE `student_tution_fee` (
  `student_id` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `due2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tution_fee`
--

INSERT INTO `student_tution_fee` (`student_id`, `due`, `due2`) VALUES
(220201033, 47030, 3000),
(123456789, 25000, 5000),
(234567890, 21000, 5000),
(345678901, 22000, 5000),
(456789012, 23000, 5000),
(567890123, 24000, 5000),
(678901234, 26000, 5000),
(789012345, 27000, 5000),
(890123456, 28000, 5000),
(901234567, 29000, 5000),
(123456780, 30000, 5000),
(234567801, 31000, 5000),
(345678012, 32000, 5000),
(456780123, 33000, 5000),
(567801234, 34000, 5000),
(678012345, 35000, 5000),
(780123456, 36000, 5000),
(890123450, 37000, 5000),
(901234567, 38000, 5000),
(123456789, 39000, 5000),
(234567890, 40000, 5000),
(345678901, 41000, 5000),
(456789012, 42000, 5000),
(567890123, 43000, 5000),
(678901234, 44000, 5000),
(789012345, 45000, 5000),
(890123456, 46000, 5000),
(901234567, 47000, 5000),
(123456780, 48000, 5000),
(234567801, 49000, 5000),
(345678012, 50000, 5000),
(456780123, 51000, 5000),
(567801234, 52000, 5000),
(678012345, 53000, 5000),
(780123456, 54000, 5000),
(890123450, 55000, 5000),
(901234567, 56000, 5000),
(123456789, 57000, 5000),
(234567890, 58000, 5000),
(345678901, 59000, 5000),
(456789012, 60000, 5000),
(567890123, 61000, 5000),
(678901234, 62000, 5000),
(789012345, 63000, 5000),
(890123456, 64000, 5000),
(901234567, 65000, 5000),
(123456780, 66000, 5000),
(234567801, 67000, 5000),
(345678012, 68000, 5000),
(456780123, 69000, 5000),
(567801234, 70000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trx_code` int(11) NOT NULL,
  `account_no` int(11) DEFAULT NULL,
  `account_type` varchar(255) NOT NULL,
  `trx_type` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `trx_date_time` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trx_code`, `account_no`, `account_type`, `trx_type`, `amount`, `trx_date_time`, `customer_id`) VALUES
(100010, 100006, 'account', 'deposit', 5000, '2024-01-05 00:24:48', 100008),
(100011, 100006, 'account', 'withdraw', 1500, '2024-02-10 05:43:37', 100008),
(100012, 100006, 'account', 'withdraw', 2000, '2024-02-20 03:23:44', 100008),
(100013, 100007, 'account', 'deposit', 3000, '2024-01-07 23:47:47', 100007),
(100014, 100007, 'account', 'withdraw', 1000, '2024-02-12 12:47:44', 100007),
(100015, 100008, 'account', 'deposit', 4000, '2024-01-10 16:35:20', 100010),
(100016, 100008, 'account', 'withdraw', 2000, '2024-02-15 20:33:31', 100010),
(100017, 100010, 'account', 'deposit', 6000, '2024-01-15 05:01:32', 100010),
(100018, 100010, 'account', 'withdraw', 2500, '2024-02-25 11:27:09', 100010),
(100022, 100002, 'account', 'withdraw', 1500, '2023-10-20 18:11:08', 100004),
(100023, 100002, 'account', 'deposit', 5000, '2023-11-05 08:34:14', 100004),
(100024, 100003, 'account', 'deposit', 2000, '2022-02-20 12:17:48', 100005),
(100025, 100003, 'account', 'withdraw', 500, '2022-03-05 11:46:17', 100005),
(100026, 100005, 'account', 'deposit', 4000, '2023-12-10 21:58:02', 100007),
(100027, 100005, 'account', 'withdraw', 2000, '2024-01-02 02:31:19', 100007),
(100028, 100012, 'account', 'deposit', 3000, '2023-10-21 18:42:29', 100012),
(100029, 100012, 'account', 'withdraw', 500, '2023-11-05 13:58:27', 100012),
(100030, 100012, 'account', 'deposit', 2000, '2023-11-18 13:44:50', 100012),
(100031, 100012, 'account', 'withdraw', 1000, '2023-12-02 02:48:51', 100012),
(100032, 100012, 'account', 'deposit', 4000, '2023-12-20 20:49:44', 100012),
(100033, 100012, 'account', 'withdraw', 1500, '2024-01-07 23:42:07', 100012),
(100034, 100012, 'account', 'deposit', 3500, '2024-01-21 08:01:23', 100012),
(100035, 100012, 'account', 'withdraw', 2000, '2024-02-05 17:00:35', 100012),
(100036, 100012, 'account', 'deposit', 4500, '2024-02-18 12:58:45', 100012),
(100037, 100012, 'account', 'withdraw', 3000, '2024-03-02 13:52:03', 100012),
(100038, 100012, 'account', 'deposit', 5000, '2024-03-15 06:24:01', 100012),
(100039, 100014, 'account', 'deposit', 4000, '2023-06-15 14:23:55', 100016),
(100040, 100014, 'account', 'withdraw', 1000, '2023-07-01 04:47:32', 100016),
(100041, 100014, 'account', 'deposit', 2500, '2023-07-18 04:45:58', 100016),
(100042, 100014, 'account', 'withdraw', 2000, '2023-08-05 09:27:13', 100016),
(100043, 100014, 'account', 'deposit', 3500, '2023-08-20 08:58:10', 100016),
(100044, 100014, 'account', 'withdraw', 1500, '2023-09-07 16:29:14', 100016),
(100045, 100014, 'account', 'deposit', 3000, '2023-09-21 07:31:39', 100016),
(100046, 100014, 'account', 'withdraw', 2500, '2023-10-05 12:10:34', 100016),
(100047, 100014, 'account', 'deposit', 4500, '2023-10-18 14:17:54', 100016),
(100048, 100014, 'account', 'withdraw', 3000, '2023-11-02 10:57:50', 100016),
(100049, 100014, 'account', 'deposit', 5000, '2023-11-15 11:55:25', 100016),
(100050, 100016, 'account', 'deposit', 5000, '2023-12-01 02:43:37', 100018),
(100051, 100016, 'account', 'withdraw', 2000, '2023-12-15 01:51:53', 100018),
(100052, 100016, 'account', 'deposit', 3500, '2023-12-29 01:08:31', 100018),
(100053, 100016, 'account', 'withdraw', 1500, '2024-01-12 00:06:56', 100018),
(100054, 100016, 'account', 'deposit', 3000, '2024-01-26 21:09:10', 100018),
(100055, 100016, 'account', 'withdraw', 2500, '2024-02-09 09:25:02', 100018),
(100056, 100016, 'account', 'deposit', 4500, '2024-02-22 07:37:39', 100018),
(100057, 100016, 'account', 'withdraw', 3000, '2024-03-07 09:53:11', 100018),
(100058, 100016, 'account', 'deposit', 5500, '2024-03-15 02:32:57', 100018),
(100059, 100017, 'account', 'deposit', 6000, '2023-09-01 07:05:13', 0),
(100060, 100017, 'account', 'withdraw', 2500, '2023-09-15 03:47:15', 0),
(100061, 100017, 'account', 'deposit', 4000, '2023-09-29 21:40:35', 0),
(100062, 100017, 'account', 'withdraw', 1500, '2023-10-13 01:01:11', 0),
(100063, 100017, 'account', 'deposit', 3500, '2023-10-27 12:04:09', 0),
(100064, 100017, 'account', 'withdraw', 2000, '2023-11-10 09:17:13', 0),
(100065, 100017, 'account', 'deposit', 4500, '2023-11-24 10:13:40', 0),
(100066, 100017, 'account', 'withdraw', 3000, '2023-12-08 23:16:43', 0),
(100067, 100017, 'account', 'deposit', 5000, '2023-12-22 13:42:32', 0),
(100068, 100017, 'account', 'withdraw', 3500, '2024-01-05 22:42:32', 0),
(100069, 100017, 'account', 'deposit', 5500, '2024-01-19 00:25:06', 0),
(100180, 100000, 'dps', 'deposit', 3000, '2023-10-13 19:44:27', 100002),
(100181, 100000, 'dps', 'deposit', 3000, '2023-11-13 21:53:39', 100002),
(100182, 100000, 'dps', 'deposit', 3000, '2023-12-13 02:14:55', 100002),
(100183, 100000, 'dps', 'deposit', 3000, '2024-01-13 17:33:39', 100002),
(100184, 100000, 'dps', 'deposit', 3000, '2024-02-13 09:03:32', 100002),
(100185, 100000, 'dps', 'deposit', 3000, '2024-03-13 16:36:42', 100002),
(100186, 100001, 'dps', 'deposit', 3000, '2023-09-14 07:52:55', 100001),
(100187, 100001, 'dps', 'deposit', 3000, '2023-10-14 13:34:28', 100001),
(100188, 100001, 'dps', 'deposit', 3000, '2023-11-14 20:13:37', 100001),
(100189, 100001, 'dps', 'deposit', 3000, '2023-12-14 12:24:40', 100001),
(100190, 100001, 'dps', 'deposit', 3000, '2024-01-14 01:22:31', 100001),
(100191, 100001, 'dps', 'deposit', 3000, '2024-02-14 17:38:37', 100001),
(100192, 100002, 'dps', 'deposit', 3000, '2023-10-20 12:05:31', 100004),
(100193, 100002, 'dps', 'deposit', 3000, '2023-11-20 07:31:44', 100004),
(100194, 100002, 'dps', 'deposit', 3000, '2023-12-20 01:22:09', 100004),
(100195, 100002, 'dps', 'deposit', 3000, '2024-01-20 08:15:32', 100004),
(100196, 100002, 'dps', 'deposit', 3000, '2024-02-20 13:11:14', 100004),
(100197, 100002, 'dps', 'deposit', 3000, '2024-03-20 17:09:35', 100004),
(100198, 100003, 'dps', 'deposit', 3000, '2023-06-01 22:14:12', 100005),
(100199, 100003, 'dps', 'deposit', 3000, '2023-07-01 11:42:17', 100005),
(100200, 100003, 'dps', 'deposit', 3000, '2023-08-01 15:48:50', 100005),
(100201, 100003, 'dps', 'deposit', 3000, '2023-09-01 19:57:17', 100005),
(100202, 100003, 'dps', 'deposit', 3000, '2023-10-01 04:19:58', 100005),
(100203, 100003, 'dps', 'deposit', 3000, '2023-11-01 09:47:57', 100005),
(100204, 100003, 'dps', 'deposit', 3000, '2023-12-01 11:59:51', 100005),
(100205, 100003, 'dps', 'deposit', 3000, '2024-01-01 06:35:25', 100005),
(100206, 100003, 'dps', 'deposit', 3000, '2024-02-01 20:57:33', 100005),
(100207, 100003, 'dps', 'deposit', 3000, '2024-03-01 13:01:31', 100005),
(100208, 100004, 'dps', 'deposit', 3000, '2022-04-15 02:14:57', 100004),
(100209, 100004, 'dps', 'deposit', 3000, '2022-05-15 20:10:13', 100004),
(100210, 100004, 'dps', 'deposit', 3000, '2022-06-15 22:06:14', 100004),
(100211, 100004, 'dps', 'deposit', 3000, '2022-07-15 02:00:32', 100004),
(100212, 100004, 'dps', 'deposit', 3000, '2022-08-15 15:43:59', 100004),
(100213, 100004, 'dps', 'deposit', 3000, '2022-09-15 00:38:20', 100004),
(100214, 100004, 'dps', 'deposit', 3000, '2022-10-15 03:59:44', 100004),
(100215, 100004, 'dps', 'deposit', 3000, '2022-11-15 18:03:39', 100004),
(100216, 100004, 'dps', 'deposit', 3000, '2022-12-15 06:19:04', 100004),
(100217, 100004, 'dps', 'deposit', 3000, '2023-01-15 01:24:22', 100004),
(100218, 100004, 'dps', 'deposit', 3000, '2023-02-15 12:04:41', 100004),
(100219, 100004, 'dps', 'deposit', 3000, '2023-03-15 08:10:18', 100004),
(100220, 100004, 'dps', 'deposit', 3000, '2023-04-15 04:37:27', 100004),
(100221, 100004, 'dps', 'deposit', 3000, '2023-05-15 22:36:21', 100004),
(100222, 100004, 'dps', 'deposit', 3000, '2023-06-15 03:09:27', 100004),
(100223, 100004, 'dps', 'deposit', 3000, '2023-07-15 19:58:11', 100004),
(100224, 100004, 'dps', 'deposit', 3000, '2023-08-15 18:22:33', 100004),
(100225, 100004, 'dps', 'deposit', 3000, '2023-09-15 07:58:14', 100004),
(100226, 100004, 'dps', 'deposit', 3000, '2023-10-15 08:43:30', 100004),
(100227, 100004, 'dps', 'deposit', 3000, '2023-11-15 19:42:51', 100004),
(100228, 100004, 'dps', 'deposit', 3000, '2023-12-15 00:23:44', 100004),
(100229, 100004, 'dps', 'deposit', 3000, '2024-01-15 14:50:10', 100004),
(100230, 100004, 'dps', 'deposit', 3000, '2024-02-15 00:59:36', 100004),
(100231, 100004, 'dps', 'deposit', 3000, '2024-03-15 08:27:32', 100004),
(100232, 100005, 'dps', 'deposit', 3000, '2023-09-22 15:18:53', 100007),
(100233, 100005, 'dps', 'deposit', 3000, '2023-10-22 03:11:48', 100007),
(100234, 100005, 'dps', 'deposit', 3000, '2023-11-22 18:02:23', 100007),
(100235, 100005, 'dps', 'deposit', 3000, '2023-12-22 08:36:32', 100007),
(100236, 100005, 'dps', 'deposit', 3000, '2024-01-22 12:55:33', 100007),
(100237, 100005, 'dps', 'deposit', 3000, '2024-02-22 14:48:07', 100007),
(100238, 100005, 'dps', 'deposit', 3000, '2024-03-22 11:13:57', 100007),
(100239, 100006, 'dps', 'deposit', 3000, '2023-09-21 11:45:23', 100008),
(100240, 100006, 'dps', 'deposit', 3000, '2023-10-21 01:05:07', 100008),
(100241, 100006, 'dps', 'deposit', 3000, '2023-11-21 18:09:24', 100008),
(100242, 100006, 'dps', 'deposit', 3000, '2023-12-21 15:31:40', 100008),
(100243, 100006, 'dps', 'deposit', 3000, '2024-01-21 23:10:08', 100008),
(100244, 100006, 'dps', 'deposit', 3000, '2024-02-21 21:15:40', 100008),
(100245, 100007, 'dps', 'deposit', 3000, '2023-12-13 12:47:59', 100007),
(100246, 100007, 'dps', 'deposit', 3000, '2024-01-13 00:12:54', 100007),
(100247, 100007, 'dps', 'deposit', 3000, '2024-02-13 10:40:34', 100007),
(100248, 100007, 'dps', 'deposit', 3000, '2024-03-13 04:44:08', 100007),
(100249, 100008, 'dps', 'deposit', 3000, '2024-03-05 15:38:57', 100010),
(100250, 100009, 'dps', 'deposit', 3000, '2024-03-02 16:02:24', 100011),
(100251, 100010, 'dps', 'deposit', 3000, '2024-01-03 09:15:07', 100010),
(100252, 100010, 'dps', 'deposit', 3000, '2024-02-03 22:08:25', 100010),
(100253, 100010, 'dps', 'deposit', 3000, '2024-03-03 10:56:44', 100010),
(100254, 100011, 'dps', 'deposit', 3000, '2024-02-02 12:18:25', 100013),
(100255, 100011, 'dps', 'deposit', 3000, '2024-03-02 04:41:55', 100013),
(100256, 100012, 'dps', 'deposit', 3000, '2023-12-14 10:34:19', 100012),
(100257, 100012, 'dps', 'deposit', 3000, '2024-01-14 14:45:50', 100012),
(100258, 100012, 'dps', 'deposit', 3000, '2024-02-14 18:06:16', 100012),
(100259, 100012, 'dps', 'deposit', 3000, '2024-03-14 22:13:50', 100012),
(100260, 100013, 'dps', 'deposit', 3000, '2022-09-28 08:50:20', 100015),
(100261, 100013, 'dps', 'deposit', 3000, '2022-10-28 01:30:12', 100015),
(100262, 100013, 'dps', 'deposit', 3000, '2022-11-28 05:00:01', 100015),
(100263, 100013, 'dps', 'deposit', 3000, '2022-12-28 20:29:27', 100015),
(100264, 100013, 'dps', 'deposit', 3000, '2023-01-28 15:27:15', 100015),
(100265, 100013, 'dps', 'deposit', 3000, '2023-02-28 15:47:52', 100015),
(100266, 100013, 'dps', 'deposit', 3000, '2023-03-28 08:37:37', 100015),
(100267, 100013, 'dps', 'deposit', 3000, '2023-04-28 19:44:29', 100015),
(100268, 100013, 'dps', 'deposit', 3000, '2023-05-28 00:49:34', 100015),
(100269, 100013, 'dps', 'deposit', 3000, '2023-06-28 16:54:24', 100015),
(100270, 100013, 'dps', 'deposit', 3000, '2023-07-28 10:03:19', 100015),
(100271, 100013, 'dps', 'deposit', 3000, '2023-08-28 23:33:23', 100015),
(100272, 100013, 'dps', 'deposit', 3000, '2023-09-28 15:36:58', 100015),
(100273, 100013, 'dps', 'deposit', 3000, '2023-10-28 07:24:44', 100015),
(100274, 100013, 'dps', 'deposit', 3000, '2023-11-28 14:12:45', 100015),
(100275, 100013, 'dps', 'deposit', 3000, '2023-12-28 00:49:32', 100015),
(100276, 100013, 'dps', 'deposit', 3000, '2024-01-28 09:29:25', 100015),
(100277, 100013, 'dps', 'deposit', 3000, '2024-02-28 20:58:29', 100015),
(100278, 100014, 'dps', 'deposit', 3000, '2023-08-12 04:24:12', 100016),
(100279, 100014, 'dps', 'deposit', 3000, '2023-09-12 07:05:31', 100016),
(100280, 100014, 'dps', 'deposit', 3000, '2023-10-12 22:15:02', 100016),
(100281, 100014, 'dps', 'deposit', 3000, '2023-11-12 17:58:38', 100016),
(100282, 100014, 'dps', 'deposit', 3000, '2023-12-12 23:08:02', 100016),
(100283, 100014, 'dps', 'deposit', 3000, '2024-01-12 13:44:19', 100016),
(100284, 100014, 'dps', 'deposit', 3000, '2024-02-12 23:17:30', 100016),
(100285, 100014, 'dps', 'deposit', 3000, '2024-03-12 03:14:34', 100016),
(100286, 100001, 'dps', 'withdraw', 19260, '2024-02-14 18:20:21', 100001),
(100287, 100004, 'dps', 'withdraw', 82800, '2024-03-15 09:58:01', 100004),
(100288, 100006, 'dps', 'withdraw', 19260, '2024-02-21 18:49:03', 100008),
(100289, 100010, 'dps', 'withdraw', 9400, '2024-03-03 16:11:12', 100010),
(100290, 100013, 'dps', 'withdraw', 60480, '2024-02-28 00:28:52', 100015),
(100291, 100000, 'fdr', 'deposit', 10000, '2024-01-30 01:50:46', 100002),
(100292, 100002, 'fdr', 'deposit', 50000, '2023-01-30 07:47:14', 100004),
(100293, 100003, 'fdr', 'deposit', 15000, '2024-02-15 09:23:53', 100005),
(100294, 100005, 'fdr', 'deposit', 25000, '2024-03-01 23:37:42', 100007),
(100295, 100006, 'fdr', 'deposit', 40000, '2023-02-28 17:56:53', 100008),
(100296, 100008, 'fdr', 'deposit', 30000, '2024-01-15 18:51:21', 100010),
(100297, 100009, 'fdr', 'deposit', 45000, '2023-03-15 16:26:05', 100011),
(100298, 100011, 'fdr', 'deposit', 35000, '2024-02-10 01:36:24', 100013),
(100299, 100013, 'fdr', 'deposit', 28000, '2024-02-28 06:43:43', 100015),
(100300, 100014, 'fdr', 'deposit', 60000, '2023-02-07 04:49:25', 100016),
(100301, 100016, 'fdr', 'deposit', 32000, '2024-03-10 03:55:58', 100018),
(100302, 100017, 'fdr', 'deposit', 50000, '2023-01-09 05:11:33', 0),
(100303, 100019, 'fdr', 'deposit', 38000, '2024-02-15 14:09:54', 100001),
(100304, 100021, 'fdr', 'deposit', 30000, '2024-03-13 07:14:51', 100005),
(100305, 100022, 'fdr', 'deposit', 70000, '2023-02-02 17:44:34', 100006),
(100306, 100024, 'fdr', 'deposit', 35000, '2023-12-14 18:58:18', 100009),
(100307, 100002, 'fdr', 'withdraw', 57500, '2024-01-30 17:37:47', 100004),
(100308, 100006, 'fdr', 'withdraw', 46000, '2024-02-28 07:14:00', 100008),
(100309, 100009, 'fdr', 'withdraw', 47250, '2024-03-15 07:16:41', 100011),
(100310, 100014, 'fdr', 'withdraw', 69000, '2024-02-07 14:41:26', 100016),
(100311, 100017, 'fdr', 'withdraw', 52500, '2024-01-09 03:37:07', 0),
(100312, 100022, 'fdr', 'withdraw', 80500, '2024-02-02 22:01:20', 100006),
(100315, NULL, 'account', 'transfer', 100, '2024-03-23 21:13:38', 0),
(100318, NULL, 'account', 'transfer', 100, '2024-03-23 21:18:26', 0),
(100319, NULL, 'account', 'transfer', 4500, '2024-03-23 21:25:09', 0),
(100320, NULL, 'account', 'transfer', 500, '2024-03-23 21:27:07', 0),
(100321, NULL, 'account', 'transfer', 200, '2024-03-23 21:31:34', 0),
(100322, NULL, 'account', 'transfer', 200, '2024-03-23 21:38:22', 0),
(100323, NULL, 'account', 'transfer', 1, '2024-03-23 21:38:40', 0),
(100324, NULL, 'account', 'transfer', 200, '2024-03-23 21:39:43', 0),
(100325, NULL, 'account', 'transfer', 15, '2024-03-23 21:43:57', 0),
(100326, NULL, 'account', 'transfer', 15, '2024-03-23 21:44:04', 0),
(100327, NULL, 'account', 'transfer', 5, '2024-03-23 21:44:10', 0),
(100328, NULL, 'account', 'transfer', 10, '2024-03-23 21:44:50', 0),
(100329, NULL, 'account', 'transfer', 40, '2024-03-23 21:47:00', 0),
(100330, NULL, 'account', 'transfer', 2, '2024-03-23 21:47:31', 0),
(100331, NULL, 'account', 'transfer', 2, '2024-03-23 21:53:00', 0),
(100332, NULL, 'account', 'transfer', 6, '2024-03-23 21:54:57', 0),
(100333, NULL, 'account', 'transfer', 2, '2024-03-23 21:55:42', 0),
(100334, NULL, 'account', 'transfer', 10, '2024-03-23 21:55:56', 0),
(100335, NULL, 'account', 'transfer', 200, '2024-04-15 19:43:33', 0),
(100336, NULL, 'account', 'transfer', 200, '2024-04-15 19:55:16', 0),
(100337, NULL, 'account', 'transfer', 100, '2024-04-15 19:57:18', 0),
(100338, NULL, 'account', 'transfer', 100, '2024-04-15 20:08:32', 0),
(100339, NULL, 'account', 'transfer', 100, '2024-04-15 20:09:31', 0),
(100340, NULL, 'account', 'transfer', 100, '2024-04-15 20:09:38', 0),
(100341, NULL, 'account', 'transfer', 100, '2024-04-15 20:09:55', 0),
(100342, NULL, 'account', 'transfer', 100, '2024-04-15 20:09:58', 0),
(100343, NULL, 'account', 'transfer', 100, '2024-04-15 20:10:29', 0),
(100344, NULL, 'account', 'transfer', 20, '2024-04-15 20:10:44', 0),
(100345, NULL, 'account', 'transfer', 20, '2024-04-15 20:11:33', 0),
(100346, NULL, 'account', 'transfer', 20, '2024-04-15 20:11:40', 0),
(100347, NULL, 'account', 'transfer', 20, '2024-04-15 20:11:50', 0),
(100348, NULL, 'account', 'transfer', 20, '2024-04-15 20:11:57', 0),
(100349, NULL, 'account', 'transfer', 20, '2024-04-15 20:12:07', 0),
(100350, NULL, 'account', 'transfer', 20, '2024-04-15 20:12:16', 0),
(100351, NULL, 'account', 'transfer', 150, '2024-04-15 20:12:28', 0),
(100352, NULL, 'account', 'transfer', 150, '2024-04-15 21:43:06', 0),
(100353, NULL, 'account', 'transfer', 200, '2024-04-20 00:08:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_money`
--

CREATE TABLE `transfer_money` (
  `transfer_code` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `transfer_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer_money`
--

INSERT INTO `transfer_money` (`transfer_code`, `sender_id`, `receiver_id`, `amount`, `transfer_date_time`) VALUES
(100315, 100001, 100003, 100, '2024-03-23 21:13:38'),
(100318, 100001, 100006, 100, '2024-03-23 21:18:26'),
(100319, 100001, 100009, 4500, '2024-03-23 21:25:09'),
(100320, 100001, 100002, 500, '2024-03-23 21:27:07'),
(100321, 100001, 100002, 200, '2024-03-23 21:31:34'),
(100322, 100001, 100002, 200, '2024-03-23 21:38:22'),
(100323, 100001, 100002, 1, '2024-03-23 21:38:40'),
(100324, 100001, 100002, 200, '2024-03-23 21:39:43'),
(100325, 100001, 100002, 15, '2024-03-23 21:43:57'),
(100326, 100001, 100002, 15, '2024-03-23 21:44:04'),
(100327, 100001, 100002, 5, '2024-03-23 21:44:10'),
(100328, 100001, 100002, 10, '2024-03-23 21:44:50'),
(100329, 100001, 100002, 40, '2024-03-23 21:47:00'),
(100330, 100001, 100002, 2, '2024-03-23 21:47:31'),
(100331, 100001, 100002, 2, '2024-03-23 21:53:00'),
(100332, 100001, 100002, 6, '2024-03-23 21:54:57'),
(100333, 100001, 100002, 2, '2024-03-23 21:55:42'),
(100334, 100001, 100002, 10, '2024-03-23 21:55:56'),
(100335, 100002, 100016, 200, '2024-04-15 19:43:33'),
(100336, 100002, 100016, 200, '2024-04-15 19:55:16'),
(100337, 100002, 100016, 100, '2024-04-15 19:57:18'),
(100338, 100002, 100012, 100, '2024-04-15 20:08:32'),
(100339, 100002, 100012, 100, '2024-04-15 20:09:31'),
(100340, 100002, 100012, 100, '2024-04-15 20:09:38'),
(100341, 100002, 100012, 100, '2024-04-15 20:09:55'),
(100342, 100002, 100012, 100, '2024-04-15 20:09:58'),
(100343, 100002, 100012, 100, '2024-04-15 20:10:29'),
(100344, 100002, 100012, 20, '2024-04-15 20:10:44'),
(100345, 100002, 100012, 20, '2024-04-15 20:11:33'),
(100346, 100002, 100012, 20, '2024-04-15 20:11:40'),
(100347, 100002, 100012, 20, '2024-04-15 20:11:50'),
(100348, 100002, 100012, 20, '2024-04-15 20:11:57'),
(100349, 100002, 100012, 20, '2024-04-15 20:12:07'),
(100350, 100002, 100012, 20, '2024-04-15 20:12:16'),
(100351, 100002, 100016, 150, '2024-04-15 20:12:28'),
(100352, 100002, 100016, 150, '2024-04-15 21:43:06'),
(100353, 100002, 100007, 200, '2024-04-20 00:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `university_bill_payment`
--

CREATE TABLE `university_bill_payment` (
  `payment_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `payment_type` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `university_name` text DEFAULT NULL,
  `hall_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_bill_payment`
--

INSERT INTO `university_bill_payment` (`payment_id`, `account_no`, `payment_type`, `student_id`, `university_name`, `hall_name`, `department`, `batch`, `amount`, `date_time`) VALUES
(1, 100002, 'hall', 63546354, 'BAUST', 'Zikrul Haque Hall', NULL, NULL, 5000, NULL),
(2, 100002, 'tution', 0, 'BAUST', NULL, 'CSE', 15, 90000, NULL),
(4, 100002, 'Tution Fee', 220201033, 'BAUST', NULL, 'CSE', 15, 3000, '2024-04-22 21:34:14'),
(5, 100002, 'Hall Fee', 220201033, 'BAUST', 'Zikrul Haque Hall', NULL, NULL, 2000, '2024-04-22 22:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `uni_hall`
--

CREATE TABLE `uni_hall` (
  `university_name` text DEFAULT NULL,
  `university_logo` text NOT NULL,
  `hall_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uni_hall`
--

INSERT INTO `uni_hall` (`university_name`, `university_logo`, `hall_name`) VALUES
('BUET', '../photo/buet_logo.png', 'Titumir Hall'),
('BUET', '../photo/buet_logo.png', 'Ahsan Ullah Hall (North)'),
('BUET', '../photo/buet_logo.png', 'Kazi Nazrul Islam Hall'),
('BUET', '../photo/buet_logo.png', 'Sher-e-Bangla Hall'),
('BUET', '../photo/buet_logo.png', 'Ahsan Ullah Hall (North)'),
('BUET', '../photo/buet_logo.png', 'Dr. M. A. Rashid Hall'),
('BUET', '../photo/buet_logo.png', 'Suhrawardy Hall'),
('BUET', '../photo/buet_logo.png', 'Sabekun Nahar Sony Hall'),
('BAUST', '../photo/baust_logo.png', 'Abbas Uddin Hall'),
('BAUST', '../photo/baust_logo.png', 'Zikrul Haque Hall'),
('BAUST', '../photo/baust_logo.png', 'Taramon Bibi Hall'),
('DU', '../photo/du_logo.jpeg', 'Zahurul Haq Hall'),
('DU', '../photo/du_logo.jpeg', 'Shahidullah Hall (Dhaka Hall)'),
('DU', '../photo/du_logo.jpeg', 'Jagannath Hall'),
('DU', '../photo/du_logo.jpeg', 'Salimullah Muslim Hall'),
('DU', '../photo/du_logo.jpeg', 'Muktijoddha Ziaur Rahman Hall'),
('DU', '../photo/du_logo.jpeg', 'Amar Ekushey Hall'),
('DU', '../photo/du_logo.jpeg', 'Begum Fazilatun Nesa Mujib Hall'),
('DU', '../photo/du_logo.jpeg', 'Kabi Sufia Kamal Hall'),
('DU', '../photo/du_logo.jpeg', 'Bijoy Ekattor Hall'),
('DU', '../photo/du_logo.jpeg', 'Masterda Surja Sen Hall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `Customer_Id` (`customer_id`),
  ADD KEY `at_Code` (`at_code`);

--
-- Indexes for table `acc_type`
--
ALTER TABLE `acc_type`
  ADD PRIMARY KEY (`at_code`);

--
-- Indexes for table `atm_booth`
--
ALTER TABLE `atm_booth`
  ADD PRIMARY KEY (`atm_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_name`);

--
-- Indexes for table `board_of_director`
--
ALTER TABLE `board_of_director`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`,`nid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `dps`
--
ALTER TABLE `dps`
  ADD PRIMARY KEY (`dps_id`),
  ADD KEY `Customer_Id` (`customer_id`),
  ADD KEY `Scheme_Id` (`scheme_id`);

--
-- Indexes for table `dps_scheme`
--
ALTER TABLE `dps_scheme`
  ADD PRIMARY KEY (`scheme_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_attendence`
--
ALTER TABLE `employee_attendence`
  ADD PRIMARY KEY (`employee_id`,`date`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `Employee_Id` (`employee_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `fdr`
--
ALTER TABLE `fdr`
  ADD PRIMARY KEY (`fdr_id`),
  ADD KEY `Customer_Id` (`customer_id`),
  ADD KEY `Scheme_Id` (`scheme_id`);

--
-- Indexes for table `fdr_scheme`
--
ALTER TABLE `fdr_scheme`
  ADD PRIMARY KEY (`scheme_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_code`),
  ADD KEY `Customer_Id` (`customer_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `Employee_Id` (`employee_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trx_code`),
  ADD KEY `Account_No` (`account_no`);

--
-- Indexes for table `transfer_money`
--
ALTER TABLE `transfer_money`
  ADD PRIMARY KEY (`transfer_code`);

--
-- Indexes for table `university_bill_payment`
--
ALTER TABLE `university_bill_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100132;

--
-- AUTO_INCREMENT for table `acc_type`
--
ALTER TABLE `acc_type`
  MODIFY `at_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=494;

--
-- AUTO_INCREMENT for table `atm_booth`
--
ALTER TABLE `atm_booth`
  MODIFY `atm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100069;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100103;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dps`
--
ALTER TABLE `dps`
  MODIFY `dps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100029;

--
-- AUTO_INCREMENT for table `dps_scheme`
--
ALTER TABLE `dps_scheme`
  MODIFY `scheme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100088;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fdr`
--
ALTER TABLE `fdr`
  MODIFY `fdr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100033;

--
-- AUTO_INCREMENT for table `fdr_scheme`
--
ALTER TABLE `fdr_scheme`
  MODIFY `scheme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trx_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100354;

--
-- AUTO_INCREMENT for table `university_bill_payment`
--
ALTER TABLE `university_bill_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`at_code`) REFERENCES `acc_type` (`at_code`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`);

--
-- Constraints for table `dps`
--
ALTER TABLE `dps`
  ADD CONSTRAINT `dps_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `dps_ibfk_2` FOREIGN KEY (`scheme_id`) REFERENCES `dps_scheme` (`scheme_id`);

--
-- Constraints for table `employee_attendence`
--
ALTER TABLE `employee_attendence`
  ADD CONSTRAINT `employee_attendence_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD CONSTRAINT `employee_leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
