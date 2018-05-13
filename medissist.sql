-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 10:48 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medissist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_detail`
--

CREATE TABLE `tbl_admin_detail` (
  `ID` int(2) NOT NULL,
  `NAME` varchar(150) DEFAULT NULL,
  `SLUG` varchar(150) DEFAULT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `ADMIN_TYPE` int(2) NOT NULL,
  `SPECIALIST_TYPE` varchar(150) DEFAULT NULL,
  `QUALIFICATION` text,
  `PAST_AFFILIATION` text,
  `OVERALL_MEMBERSHIP` text,
  `IMAGE` varchar(255) DEFAULT NULL,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `ONLINE_STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `PATIENT_MSG` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_detail`
--

INSERT INTO `tbl_admin_detail` (`ID`, `NAME`, `SLUG`, `USERNAME`, `PASSWORD`, `ADMIN_TYPE`, `SPECIALIST_TYPE`, `QUALIFICATION`, `PAST_AFFILIATION`, `OVERALL_MEMBERSHIP`, `IMAGE`, `STATUS`, `ONLINE_STATUS`, `CREATED_DATE`, `UPDATED_DATE`, `PATIENT_MSG`) VALUES
(1, 'Ujjwal Shrestha', 'ujjwal-shrestha', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, NULL, NULL, NULL, 'profile.jpg', 1, 0, '2018-04-20 03:02:55', '2018-04-21 23:42:23', 'The foundation of success in life is good health: that is the substratum fortune; it is also the basis of happiness. A person cannot accumulate a fortune very well when he is sick.'),
(3, 'Michael Cole', 'michael-cole', 'm@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'ENT (Ear, Nose, Throat)', '<p>M.B.B.S, MS.</p>\r\n', '<p>Nepal Medical College Teaching Hospital</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tilganga Institute of Ophthalmology</p>\r\n', '<p>Membership with health organizations/ associations: Nepal Medical Council, Nepal Medical Association</p>\r\n', '101.jpg', 1, 1, '2018-04-20 18:17:28', '2018-05-12 14:48:49', 'Good health is not something we can buy. However, it can be an extremely valuable savings account.'),
(8, 'Kevin Jones', 'kevin-jones', 'k@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Dermatalogist', '<p>M.B.B.S ( IMS, BHU, INDIA) ; MD,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dermatology ( Philippines)</p>\r\n', '', '<p>Society of Dermatologist, Venereologist &amp; Leprologists of Nepal (SODVELON)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nepal Medical Council</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Indian Medical Council</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>International Society of Dermatology</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Asian Dermatological Association</p>\r\n', '92.jpg', 1, 0, '2018-04-21 16:33:37', '2018-05-12 14:45:02', 'To enjoy good health, to bring true happiness to one\'s family, to bring peace to all, one must first discipline and control one\'s own mind. If a man can control his mind he can find the way to Enlightenment, and all wisdom and virtue will naturally come to him.\r\n'),
(5, 'William Johnson', 'william-johnson', 'w@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Gastroenterologist', '<p>MBBS BPKIHS, Dharan</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>MD&nbsp;(Internal Medicine), Manipal Hospital, Bangalore</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fellowship&nbsp;Long Term Training (Gastroenterology), AIIMS, Delhi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Short Term Training (Gastroenterology), AIG, Hyderabad</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DM (Gastroenterology), NAMS</p>\r\n', '<p>Kist Medical college</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Alka Hospital</p>\r\n', '<p>Life Member of Nepalese Association of Gastroenterologist</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Founding Member of Nepalese Association of Study of Liver disease (NASL)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Life Member of Society of Internal Medicine Of Nepal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '11.jpg', 1, 1, '2018-04-20 18:19:09', '2018-05-12 14:32:26', 'To keep the body in good health is a duty... otherwise we shall not be able to keep our mind strong and clear.'),
(11, 'Orli Dudley', 'orli-dudley', 'o@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Cardiologist', '<p>MBBS</p>\r\n\r\n<p><br />\r\nMS (General Surgery)</p>\r\n\r\n<p><br />\r\nMCh (Cardiothoracic and Vascular Surgery)</p>\r\n\r\n<p><br />\r\nRowan Nicks Fellowship in VATS and Advanced Bronchoscopy (Australia)</p>\r\n', '<p>Fellow in Thoracic Surgery at the Austin Hospital, Melbourne (2015/16)</p>\r\n\r\n<p><br />\r\nChief of Thoracic Surgery in Manmohan Cardiothoracic Vascular and Transplant Center (current)</p>\r\n\r\n<p><br />\r\nConsultant Thoracic, Vascular, Breast and Thyroid Surgery in Chirayu National Hospital (current)</p>\r\n', '<p>President of the Health Foundation Nepal</p>\r\n\r\n<p><br />\r\nSecretary (Founding and current)of the Thoracic Society of Nepal</p>\r\n\r\n<p><br />\r\nLife Member of Nepal Medical Council, Nepal Medical Association, Surgeons&#39; Society of Nepal</p>\r\n', 'profilepick.jpg', 1, 1, '2018-05-09 15:58:25', '2018-05-12 14:37:12', 'Our greatest happiness does not depend on the condition of life in which chance has placed us, but is always the result of a good conscience, good health, occupation, and freedom in all just pursuits.'),
(12, 'Lebron Conner', 'lebron-conner', 'conner@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Gynocologist', '<p>MBBS ( Pakistan) ; MD Gyne/Obs ( Institute of Medicine TUTH, Kathmandu, Nepal)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Infertility and IVF Training</p>\r\n', '<p>Patan Hospital, Nepal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Institute of Medicine (TUTH), Kathmandu, Nepal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Manmohan Memorial Hospital, Nepal</p>\r\n', '<p style="display: block; width: 0px; height: 0px; padding: 0px; border: 0px; margin: 0px; position: absolute; top: 0px; left: -9999px; opacity: 0; overflow: hidden;">&nbsp;</p>\r\n\r\n<p>Nepal Medical Council (NMC)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nepal Medical Association (NMA)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nepal Society of Obstetric and Gynecology</p>\r\n\r\n<p>&nbsp;\r\n<p style="display: block; width: 0px; height: 0px; padding: 0px; border: 0px; margin: 0px; position: absolute; top: 0px; left: -9999px; opacity: 0; overflow: hidden;">&nbsp;</p>\r\n</p>\r\n', '583.png', 1, 1, '2018-05-11 02:30:36', '2018-05-12 14:43:42', 'Money doesn\'t mean anything to me. I\'ve made a lot of money, but I want to enjoy life and not stress myself building my bank account. I give lots away and live simply, mostly out of a suitcase in hotels. We all know that good health is much more important.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_answers`
--

CREATE TABLE `tbl_forum_answers` (
  `ID` int(10) NOT NULL,
  `QUESTION_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `ANSWER` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_answers`
--

INSERT INTO `tbl_forum_answers` (`ID`, `QUESTION_ID`, `USER_ID`, `ANSWER`, `CREATED`) VALUES
(17, 4668, 3, 'How many days have you been through this... and how often do you drink water per day??', '2018-05-11 11:33:44'),
(19, 4668, 1, 'About 2-3 litre per day... its been almost 2 weeks ... its getting worse day by day..', '2018-05-11 11:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_questions`
--

CREATE TABLE `tbl_forum_questions` (
  `ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `QUESTION` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_questions`
--

INSERT INTO `tbl_forum_questions` (`ID`, `USER_ID`, `QUESTION`, `CREATED`) VALUES
(4668, 1, 'I am having a severe pain on my stomach though i have done checkup with the doctor as well... but its not really working for me... ', '2018-05-11 11:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_problems`
--

CREATE TABLE `tbl_health_problems` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SLUG` varchar(200) NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_ON` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_health_problems`
--

INSERT INTO `tbl_health_problems` (`ID`, `NAME`, `SLUG`, `DESCRIPTION`, `STATUS`, `CREATED_ON`, `UPDATED_ON`) VALUES
(1, 'Asthma', 'asthma', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Asthma is a chronic condition in which the airways that carry air to the lungs are inflamed and narrowed.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Inflamed airways are very sensitive, and they tend to react to things in the environment called triggers, such as substances that are inhaled. When the airways react, they swell and narrow even more, and also produce extra mucus, all of which make it harder for air to flow to the lungs. The muscles around the airways also tighten, which further restricts air flow.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt"><img alt="https://www.hamad.qa/EN/your%20health/Asthma/PublishingImages/000%20Home/Asthma_Banner1.jpg" src="https://www.hamad.qa/EN/your%20health/Asthma/PublishingImages/000%20Home/Asthma_Banner1.jpg" style="height:300px; width:100%" /></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>Asthma symptoms</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">When the airways react to asthma triggers, people can experience what&#39;s called an asthma flare-up or&nbsp;<a href="https://www.livescience.com/39205-asthma-attacks-back-school-kids.html" style="color:blue; text-decoration:underline">asthma attack</a>. Symptoms of an asthma attack include: coughing, chest tightness, wheezing and trouble breathing, according to the&nbsp;<a href="http://www.cdc.gov/ASTHMA/" style="color:blue; text-decoration:underline">Centers for Disease Control and Prevention</a>.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Some people have mild asthma symptoms, or only experience asthma symptoms in response to certain activities like exercising. Other people have more serve and frequent symptoms, which may need treatment with medication.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>What causes asthma?</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">The underlying cause of asthma is not known, but it&#39;s thought to be due to a combination of genetic and environmental factors. People with asthma may have genetic risk factors that make them more susceptible to the disease, and certain environmental factors, such as exposure to allergens or certain viral infections in infancy, may increase the risk of developing the disease,&nbsp;<a href="http://www.nhlbi.nih.gov/health/health-topics/topics/asthma/causes.html" style="color:blue; text-decoration:underline">according to the National Heart, Lung and Blood Institute (NHLBI)</a>.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Symptoms of asthma can be caused by triggers. Common asthma triggers include: tobacco smoke, dust mites, air pollution, pollen, mold, respiratory infections, physical activity, cold air and allergic reactions to some foods.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>Asthma diagnosis</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Asthma shows up in different ways in different people, said Dr. David Beuther, of the Division of Pulmonary, Critical Care and Sleep Medicine at National Jewish Health Hospital in Denver. People sometimes first discover they have asthma because they have a persistent cough or wheeze and shortness of breath that won&#39;t go away, which brings them to the doctor, Beuther said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Asthma can sometimes be missed because people think they are just getting frequent colds or other respiratory infections, but they actually have poorly controlled asthma, Beuther said. A patient who has frequent chest colds probably needs to be evaluated for asthma, he said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">In other cases, people are misdiagnosed with asthma when they actually don&#39;t have the condition, Beuther said.&nbsp; For example, people with&nbsp;<a href="https://www.livescience.com/34787-obesity-high-bmi-causes-diabetes-heart-disease.html" style="color:blue; text-decoration:underline">obesity</a>&nbsp;can have symptoms that mimic asthma, he said, because extra weight can make the chest stiffer and heavier, which in turn makes breathing more difficult. People with acid reflux or nasal allergies can also have symptoms that mimic asthma, he said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">To diagnose asthma, doctors perform a lung function test called spirometry, to see if there&#39;s a problem with the way the lungs are working, Beuther said. This test measures how much air people are able to blow out of the lungs, and how quickly they do this,&nbsp;<a href="http://www.lung.org/lung-disease/asthma/learning-more-about-asthma/symptoms-diagnosis-and-treatment.html" style="color:blue; text-decoration:underline">according to the American Lung Association</a>.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>Asthma treatment&nbsp;</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">There is no cure for asthma. People who experience asthma symptoms should speak with their doctor about how to best treat and manage their condition.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Managing asthma usually involves avoiding asthma triggers, and taking medications to prevent or treat symptoms.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">The goal of asthma therapy is for the patient to be symptom-free, Beuther said. &quot;We want you to be able to do what you want to do, without limitation,&quot; and with the fewest side effects from treatment, Beuther said. &quot;[People] feel like they have to suffer through symptoms, but our goal is to eliminate or nearly eliminate symptoms,&quot; he said.&nbsp;</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>Asthma medication</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">There are two types of medications to treat asthma: quick-relief medications and long-term medications.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Quick-relief medications provide relief from acute asthma symptoms. A common quick-relief medication is inhaled short-acting beta2-agonists, which help relax muscles around the airways, allowing more air to flow through them. People with asthma should have a quick-relief inhaler with them at all times to case they need it,&nbsp;<a href="http://www.nhlbi.nih.gov/health/health-topics/topics/asthma/treatment.html" style="color:blue; text-decoration:underline">according to the NHLBI</a>.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Long-term medications are typically taken daily to help prevent asthma symptoms from starting in the first place. A common medication is inhaled corticosteroids, which reduce airway inflammation and make airways less sensitive. Other long-term medications include omalizumab, a shot given one or two times a month to prevent the body from reacting to asthma triggers, and inhaled long-acting beta2-agonists, which help open airways, according to NHLBI.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">If patients are taking long-term medications, they should meet with their doctor frequently to assess how well the medications are working, or if the dose needs to be adjusted, Beuther said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">It&#39;s important that people who are taking long-term medications do not suddenly stop taking the medications if they feel well, because symptoms can return, Beuther said. People who consistently take their medication end up taking less over the long term because their condition improves, and the dose can be lowered, he said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in">&nbsp;</p>\r\n\r\n<h3 style="margin-left:0in; margin-right:0in"><span style="font-size:13.5pt"><strong><strong>Childhood asthma</strong></strong></span></h3>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Anyone can have asthma, but it most often starts in childhood. Of the 25 million asthma sufferers in the United States, 7 million are children,&nbsp;<a href="http://www.nhlbi.nih.gov/health/health-topics/topics/asthma/atrisk.html" style="color:blue; text-decoration:underline">according to the NHLBI</a>.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Most children with asthma develop it before age 5,&nbsp;<a href="http://www.aaaai.org/conditions-and-treatments/asthma.aspx" style="color:blue; text-decoration:underline">according to the American Academy of Allergy Asthma &amp; Immunology (AAAAI)</a>. In children, asthma can appear as wheezing or whistling sound when breathing, coughing, rapid or labored breathing, complaints of chest pain and feeling weak or tired, the academy says</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">In children, asthma is the leading cause of emergency room visits, hospitalizations and missed days of school,&nbsp;<a href="http://www.mayoclinic.org/diseases-conditions/childhood-asthma/basics/definition/con-20028628" style="color:blue; text-decoration:underline">according to the Mayo Clinic</a>. A child&#39;s asthma symptoms may continue into adulthood, the Mayo Clinic says.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Some children with asthma will &quot;grow out&quot; of it as they get older, meaning the condition goes away completely, Beuther said. This may happen because as people grow up, their lungs become larger and more open, he said, and people experience hormone changes that may also affect asthma risk. On the other hand, people who develop asthma as an adult tend to have the condition for life, he said.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">Some studies suggest that&nbsp;<a href="https://www.livescience.com/46850-asthma-medications-restrict-kids-growth.html" style="color:blue; text-decoration:underline">inhaled corticosteroids may slightly restrict children&#39;s growth</a>. A 2014 review study, published in the journal The Cochrane Library, found that children who took daily doses of the medication grew about 0.2 inches (0.5 cm) less during a year than those who took a placebo or nonsteroidal medications. However, the researchers said that this effect &quot;seems minor&quot; compared with the known benefits of the drugs.</span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:12pt">&quot;Without [these drugs], poorly controlled asthma is quite a big risk,&quot; said Beuther, who was not involved in the study. The NHLBI says that inhaled corticosteroids are generally safe when taken as prescribed.</span></p>\r\n', 1, '2018-05-10 00:44:59', '2018-05-11 22:15:53'),
(4, 'Scabies', 'scabies', '<p>Coming soon</p>\r\n', 1, '2018-05-10 03:32:20', '2018-05-11 16:12:50'),
(5, 'Leprosy', 'leprosy', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:28:24', NULL),
(6, 'Urinary Tract Infection ', 'urinary-tract-infection', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:29:05', NULL),
(7, 'Depression', 'depression', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:29:17', NULL),
(8, 'Botulism', 'botulism', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:29:31', NULL),
(9, 'Anorexia', 'anorexia', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:29:45', NULL),
(10, 'Sunburn', 'sunburn', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:29:56', NULL),
(11, 'Diarrhea', 'diarrhea', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:30:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicinal_product`
--

CREATE TABLE `tbl_medicinal_product` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SLUG` varchar(200) NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_ON` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicinal_product`
--

INSERT INTO `tbl_medicinal_product` (`ID`, `NAME`, `SLUG`, `DESCRIPTION`, `STATUS`, `CREATED_ON`, `UPDATED_ON`) VALUES
(3, 'Ibuprofen', 'ibuprofen', '<p>Coming soon...</p>\r\n', 1, '2018-05-10 16:39:21', '2018-05-11 17:11:37'),
(8, 'Omeprazole', 'omeprazole', '', 1, '2018-05-11 11:22:41', NULL),
(5, 'Amoxicillin', 'amoxicillin', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:40:51', '2018-05-11 17:06:42'),
(6, 'Clindamycin', 'clindamycin', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:41:17', '2018-05-11 17:06:55'),
(7, 'Viagra', 'viagra', '<p>Coming soon</p>\r\n', 1, '2018-05-11 10:42:05', '2018-05-11 17:07:17'),
(4, 'Antibiotic', 'antibiotic', '<p><strong><span style="font-size:12.0pt">Antibiotics, also known as antibacterials, are medications that destroy or slow down the growth of bacteria.</span></strong></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">They include a range of powerful drugs and are used to treat diseases caused by bacteria.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Infections caused by viruses, such as colds,&nbsp;<a href="https://www.medicalnewstoday.com/articles/15107.php" title="All you need to know about flu"><span style="color:blue">flu</span></a>, most coughs, and&nbsp;<a href="https://www.medicalnewstoday.com/articles/155412.php" title="Strep throat: Causes, diagnosis, and treatments"><span style="color:blue">sore throats</span></a>&nbsp;cannot be treated with antibiotics.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">In this article, we will explain what antibiotics are, how they work, any potential side effects, and discuss antibiotic resistance.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Fast facts on antibiotics</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Here are some key points about antibiotics. More detail and supporting information is in the main article.</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Alexander Fleming discovered&nbsp;<a href="https://www.medicalnewstoday.com/articles/216798.php" title="Penicillin: How Does Penicillin Work?"><span style="color:blue">penicillin</span></a>, the first natural antibiotic, in 1928.</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Antibiotics cannot fight viral infections.</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Fleming predicted the rise of antibiotic resistance we see today.</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Antibiotics either kill bacteria or slow its growth.</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Side effects can include&nbsp;<a href="https://www.medicalnewstoday.com/articles/158634.php" title="What you should know about diarrhea"><span style="color:blue">diarrhea</span></a>&nbsp;and feeling sick.</span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">What are antibiotics?</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><img alt="Alexander Fleming" src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAApAAD/4QMbaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjItYzAwMSA2My4xMzk0MzksIDIwMTAvMTAvMTItMDg6NDU6MzAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUwMTQ2QTVDMDIyQzExRTVBM0ExRUM3MzYzNUNBNkE2IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjUwMTQ2QTVCMDIyQzExRTVBM0ExRUM3MzYzNUNBNkE2IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9IjU1OTRDRjE0NTdBNzExREY0RjcxQTIwMzY3MjNGOUUxIiBzdFJlZjpkb2N1bWVudElEPSI1NTk0Q0YxNDU3QTcxMURGNEY3MUEyMDM2NzIzRjlFMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAwICAgJCAwJCQwRCwkLERQPDAwPFBcSEhQSEhcWERQTExQR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" style="height:263px; width:350px" /></span><br />\r\n<span style="font-size:12.0pt"><em>Alexander Fleming discovered penicillin in 1928.</em></span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Antibiotics are powerful medicines that fight certain infections and can save lives when used properly. Antibiotics either stop bacteria from reproducing or destroy them.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Before bacteria can multiply and cause symptoms, the body&#39;s immune system can usually kill them. Our white blood cells attack harmful bacteria and, even if symptoms do occur, our immune system can usually cope and fight off the infection.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">There are occasions, however, when it is all too much, and some help is needed; this is where antibiotics are useful.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">The first antibiotic was penicillin. Such penicillin-related antibiotics as ampicillin, amoxicillin, and benzylpenicillin are widely used today to treat a variety of infections - these antibiotics have been around for a long time.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">There are several&nbsp;<a href="http://www.nhs.uk/conditions/Antibiotics-penicillins/Pages/Introduction.aspx" target="_blank"><span style="color:blue">types of modern antibiotics</span></a>, and they are only available with a doctor&#39;s prescription in most countries.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">Resistance</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">There is concern worldwide that antibiotics are being overused. This overuse is contributing toward the growing number of bacterial infections that are becoming resistant to antibacterial medications.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">According to the CDC (Centers for Disease Control and Prevention), outpatient antibiotic overuse in the United States is a particular problem&nbsp;<a href="https://www.cdc.gov/hai/surveillance/ar-patient-safety-atlas.html" target="_blank"><span style="color:blue">in the Southeast</span></a>.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">The ECDC (European Centre for Disease Prevention and Control) says that antibiotic resistance continues to be a serious public health threat worldwide. In a statement issued in&nbsp;<a href="http://ecdc.europa.eu/en/press/press%20releases/european-antibiotic-awareness-day-2011.pdf" target="_blank"><span style="color:blue">November 2012</span></a>, the ECDC informed that an estimated&nbsp;<a href="http://ecdc.europa.eu/en/publications/Publications/0909_TER_The_Bacterial_Challenge_Time_to_React.pdf" target="_blank"><span style="color:blue">25,000</span></a>&nbsp;people die each year in the European Union from antibiotic-resistant bacterial infections.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">New ECDC data shows that there has been a considerable increase over the last few years of combined resistance to multiple antibiotics in&nbsp;<em>E. coli</em>&nbsp;and&nbsp;<em>Klebsiella pneumoniae</em>&nbsp;in over one-third of European Union and EEA (European Economic Area) nations.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Consumption of carbapenems, a major class of last-line antibiotics,&nbsp;<a href="https://www.ncbi.nlm.nih.gov/pubmed/22894617" target="_blank"><span style="color:blue">increased significantly</span></a>&nbsp;from 2007 to 2010.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Alexander Fleming, speaking in his Nobel Prize acceptance speech in 1945 said: &quot;Then there is the danger that the ignorant man may easily underdose himself and by exposing his microbes to non-lethal quantities of the drug, make them resistant.&quot;</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">As predicted, almost 70 years ago by the man who discovered the first antibiotic, drug resistance is upon us.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">How do antibiotics work?</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Although there are a number of different types of antibiotic, they all work in one of two ways:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">A bactericidal antibiotic (penicillin, for instance) kills the bacteria; these drugs usually interfere with either the formation of the bacterium&#39;s cell wall or its cell contents</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">A bacteriostatic stops bacteria from multiplying</span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">Uses</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><img alt="" src="http://netdoctor.cdnds.net/15/51/980x490/landscape-1450185850-g-antibiotics-496660071.jpg" style="height:300px; width:80%" /><br />\r\n<em><span style="font-size:12.0pt">Antibiotics do not work against viruses.</span></em></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">An antibiotic is given for the treatment of an infection caused by bacteria. It is not effective against viruses.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">If you have an infection, it is important to know whether it is caused by bacteria or a virus.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Most upper respiratory tract infections, such as the common cold and sore throats are&nbsp;<a href="http://www.nhs.uk/Conditions/Respiratory-tract-infection/Pages/Introduction.aspx" target="_blank"><span style="color:blue">caused by viruses</span></a>&nbsp;- antibiotics do not work against these viruses.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">If antibiotics are overused or used incorrectly, there is a risk that the bacteria will become resistant - the antibiotic becomes less effective against that type of bacterium.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">A broad-spectrum antibiotic can be used to treat a wide range of infections. A narrow-spectrum antibiotic is only effective against a few types of bacteria. Some antibiotics attack aerobic bacteria, while others work against anaerobic bacteria. Aerobic bacteria need oxygen, anaerobic bacteria do not.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">In some cases, antibiotics may be given to prevent rather than treat an infection, as might be the case before surgery. This is called &#39;prophylactic&#39; use of antibiotics. They are commonly used before bowel and orthopedic surgery.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">Side effects</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Below is a list of the most common side effects of antibiotics:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Diarrhea</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Feeling sick</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Fungal infections of the mouth, digestive tract, and vagina</span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Below is a list of rare side effects of antibiotics:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Formation of&nbsp;<a href="https://www.medicalnewstoday.com/articles/154193.php" title="How do you get kidney stones?"><span style="color:blue">kidney stones</span></a>&nbsp;(when taking sulphonamides)</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Abnormal blood clotting (when taking some cephalosporins)</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Sensitivity to sunlight (when taking tetracyclines)</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Blood disorders (when taking trimethoprim)</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><a href="https://www.medicalnewstoday.com/articles/249285.php" title="Deafness and hearing loss: Causes, symptoms, and treatments"><span style="color:blue">Deafness</span></a>&nbsp;(when taking erythromycin and the aminoglycosides)</span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Some patients, especially older adults, may experience inflamed bowels (a type of colitis), which can lead to severe bloody diarrhea. Clindamycin, an antibiotic used for the most serious infections, commonly has this side effect.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Penicillins, cephalosporins, and erythromycin can also produce this side effect, but it is much rarer.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">Allergy</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Some patients may develop an allergic reaction to antibiotics - especially penicillins. Side effects might include a rash, swelling of the tongue and face, and difficulty breathing.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Allergic reactions to antibiotics can be&nbsp;<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC2846744/" target="_blank"><span style="color:blue">immediate or delayed hypersensitivity</span></a>&nbsp;reactions.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Anyone who has an allergic reaction to an antibiotic must tell their doctor and/or pharmacist. Reactions to antibiotics can be very serious, and sometimes fatal - they are called anaphylactic reactions.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Antibiotics should be used with extreme caution for the following individuals:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Anyone with reduced liver or kidney function</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Anyone who is pregnant</span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Anyone who is breastfeeding</span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:13.5pt">Interactions</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Individuals taking an antibiotic, should not take other medicines or herbal remedies without speaking with a doctor first. OTC (over the counter, non-prescription) medicines might also interact with antibiotics.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Penicillins, cephalosporins, and some other antibiotics can undermine the effectiveness of oral contraceptives. If the antibiotic has caused diarrhea/vomiting the absorption of contraceptives may also be disrupted. Anyone taking these drugs should consider taking additional contraceptive precautions.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:18.0pt">How to use</span></strong></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Antibiotics are usually taken by mouth (orally); however, they can also be administered by injection or applied directly to the affected part of the body.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Most antibiotics start having an effect on an infection within a few hours. It is important to complete the whole course of medication to prevent the infection from coming back.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Stopping taking the medication before the end of the course means that there is a higher chance the bacteria will become resistant to future treatments. This is because the ones that survive have had some exposure to the antibiotic and may consequently have built up a resistance to it. Even if an individual feels better, they still need to complete the course of treatment.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Some antibiotics should not be consumed with certain foods and drinks. Others should be taken on an empty stomach - these would normally be taken about an hour before meals, or 2 hours after. It is crucial that patients follow the instructions correctly for the medication to be effective. People taking metronidazole should not consume alcohol.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Dairy products should not be consumed when taking tetracyclines, as they might affect the absorption of the medication.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2018-05-10 16:54:59', '2018-05-11 22:18:47'),
(9, 'Lexapro', 'lexapro', '', 1, '2018-05-11 11:23:12', NULL),
(10, 'Pantoprazole', 'pantoprazole', '', 1, '2018-05-11 11:23:44', NULL),
(11, 'Metoprolol', 'metoprolol', '', 1, '2018-05-11 11:27:05', NULL),
(12, 'Hydrochlorothiazide', 'hydrochlorothiazide', '', 1, '2018-05-11 11:27:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_5`
--

CREATE TABLE `tbl_pvt_msg_1_5` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `SEEN_STATUS` int(2) DEFAULT '0',
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_8`
--

CREATE TABLE `tbl_pvt_msg_1_8` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `SEEN_STATUS` int(2) DEFAULT '0',
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_11`
--

CREATE TABLE `tbl_pvt_msg_1_11` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `SEEN_STATUS` int(2) DEFAULT '0',
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialist_type`
--

CREATE TABLE `tbl_specialist_type` (
  `TYPEID` int(10) NOT NULL,
  `SPECIALIST_TYPE` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_specialist_type`
--

INSERT INTO `tbl_specialist_type` (`TYPEID`, `SPECIALIST_TYPE`) VALUES
(1, 'Cardiologist'),
(2, 'Gynocologist'),
(4, 'ENT (Ear, Nose, Throat)'),
(5, 'Gastroenterologist'),
(6, 'Dermatalogist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_detail`
--

CREATE TABLE `tbl_user_detail` (
  `ID` int(10) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `SLUG` varchar(150) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `BLOOD_GROUP` varchar(10) DEFAULT NULL,
  `CONTACTNO` varchar(15) DEFAULT NULL,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_ON` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_detail`
--

INSERT INTO `tbl_user_detail` (`ID`, `FIRSTNAME`, `LASTNAME`, `SLUG`, `EMAIL`, `PASSWORD`, `GENDER`, `BLOOD_GROUP`, `CONTACTNO`, `STATUS`, `CREATED_ON`, `UPDATED_ON`) VALUES
(1, 'Ujjwal', 'Shrestha', 'ujjwal-shrestha', 'ujjwalshrestha1996@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', 'O+ve', '', 1, '2018-04-10 01:10:38', '2018-05-13 16:12:56'),
(2, 'Gisela', 'Herring', 'gisela-herring', 'godak@mailinator.net', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'female', NULL, NULL, 1, '2018-04-10 01:12:01', NULL),
(3, 'John', 'Cena', 'john-cena', 'cena@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', NULL, NULL, 1, '2018-04-19 15:53:54', NULL),
(10, 'Haviva', 'Mendez', 'haviva-mendez', 'c@gmail.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'male', NULL, NULL, 1, '2018-04-24 00:14:22', NULL),
(9, 'Abel', 'Montgomery', 'abel-montgomery', 'cena@gmail.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'others', NULL, NULL, 1, '2018-04-24 00:13:13', NULL),
(8, 'Alma', 'Mendez', 'alma-mendez', 'godak@mailinator.net', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'others', NULL, NULL, 1, '2018-04-24 00:12:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_detail`
--
ALTER TABLE `tbl_admin_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_forum_answers`
--
ALTER TABLE `tbl_forum_answers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_forum_questions`
--
ALTER TABLE `tbl_forum_questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_health_problems`
--
ALTER TABLE `tbl_health_problems`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_medicinal_product`
--
ALTER TABLE `tbl_medicinal_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_5`
--
ALTER TABLE `tbl_pvt_msg_1_5`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_8`
--
ALTER TABLE `tbl_pvt_msg_1_8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_11`
--
ALTER TABLE `tbl_pvt_msg_1_11`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_specialist_type`
--
ALTER TABLE `tbl_specialist_type`
  ADD PRIMARY KEY (`TYPEID`);

--
-- Indexes for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_detail`
--
ALTER TABLE `tbl_admin_detail`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_forum_answers`
--
ALTER TABLE `tbl_forum_answers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_forum_questions`
--
ALTER TABLE `tbl_forum_questions`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4669;
--
-- AUTO_INCREMENT for table `tbl_health_problems`
--
ALTER TABLE `tbl_health_problems`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_medicinal_product`
--
ALTER TABLE `tbl_medicinal_product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_5`
--
ALTER TABLE `tbl_pvt_msg_1_5`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_8`
--
ALTER TABLE `tbl_pvt_msg_1_8`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_11`
--
ALTER TABLE `tbl_pvt_msg_1_11`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_specialist_type`
--
ALTER TABLE `tbl_specialist_type`
  MODIFY `TYPEID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
