
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `alumnus_bio` (
  `id` int(30) NOT NULL,
  `idnum` varchar(10) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `course` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Unverified, 1= Verified',
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE graduate_survey_form(
  id INT(255) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id INT(30) NOT NULL,
  name VARCHAR(255),
  address VARCHAR(255),
  email VARCHAR(255),
  contact INT(15),
  civil_status ENUM('single','married','widow','single_parent','separated'),
  elementary VARCHAR(255),
  elementary_year date,
  elementary_award VARCHAR(255),
  highschool VARCHAR(255),
  highschool_year date,
  highschool_award VARCHAR(255),
  college VARCHAR(255),
  college_year date,
  college_award VARCHAR(255),
  studies VARCHAR(255),
  studies_year date,
  studies_earned VARCHAR(255),
  employment_status ENUM('employed', 'unemployed'),
  present_occupation VARCHAR(255),
  date_hired date,
  present_company_name VARCHAR(255),
  present_company_address VARCHAR(255),
  job VARCHAR(255),
  job_year date,
  job_company_name VARCHAR(255)
);

ALTER TABLE graduate_survey_form
ADD KEY users_user_id_fk1(user_id);

INSERT INTO `alumnus_bio` (`id`, `idnum`, `firstname`, `middlename`, `lastname`, `course`, `email`, `status`, `date_created`, `contact`) VALUES
 ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')


CREATE TABLE studies (
   studies_id INT PRIMARY KEY,
   studies_name VARCHAR(255),
   studies_year INT,
   studies_earned FLOAT(10,2)
);
INSERT INTO studies (studies_id, studies_name, studies_year, studies_earned)
VALUES (1, 'studies 1', 2020, 1000.00),
       (2, 'studies 2', 2021, 2000.00),
       (3, 'studies 3', 2022, 3000.00);

CREATE TABLE graduates (
    id INT(255) PRIMARY KEY NOT NULL,
    batch_year varchar(255),
    graduates int(255),
    date_added datetime NOT NULL DEFAULT current_timestamp()
);

INSERT INTO `graduates`(`id`, `batch_year`, `graduates`, `employed`, `unemployed`, `not_tracked`,`date_added`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')


CREATE TABLE `forum_comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `forum_topics` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Graduate Employment Tracking System', 'graduateemploymenttrackingsyst@gmail.com', '+639810095685', '1674529740_graduation-05-920x518.jpg', 'Description');

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `course` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Alumni officer, 3= alumnus',
  `auto_generated_pass` text NOT NULL,
  `alumnus_id` int(30) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `idnum`, `name`, `course`, `username`, `password`, `type`, `auto_generated_pass`, `alumnus_id`, `contact`) VALUES
(20, '', 'Administrator', '', 'admin@sample.com', 'admin', 1, '', 20, ''),


ALTER TABLE `alumnus_bio`
  ADD PRIMARY KEY (`id`)

ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `alumnus_bio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `forum_comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `forum_topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;
