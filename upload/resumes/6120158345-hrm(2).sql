-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2014 at 03:52 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE IF NOT EXISTS `allowances` (
`aid` int(11) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'Percentage',
  `allowances_type` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`aid`, `type`, `allowances_type`, `percentage`, `status`) VALUES
(1, 'Fixed', 'HRA', '2000', 'Enable'),
(2, 'Percentage', 'Travel Allowance', '10.0', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `assignemployee`
--

CREATE TABLE IF NOT EXISTS `assignemployee` (
`aid` int(11) NOT NULL,
  `app_emp_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE IF NOT EXISTS `claim` (
`clmid` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `claim` varchar(200) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`clmid`, `employee`, `claim`, `file`, `date`, `status`, `created_on`) VALUES
(1, 2, 'asdwqe', '411201413467-HRM.docx', '2014-10-22', 'Pending', '2014-11-04 12:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`cid` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE IF NOT EXISTS `deduction` (
`did` int(11) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'Percentage',
  `deduction_type` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`did`, `type`, `deduction_type`, `percentage`, `status`) VALUES
(1, 'Percentage', 'PF', '5', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`eid` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `employment_type_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NULL DEFAULT NULL,
  `basic` bigint(11) NOT NULL,
  `allowances` varchar(200) NOT NULL,
  `deductions` varchar(200) NOT NULL,
  `contact_number` bigint(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `skills` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `user_type_id`, `employment_type_id`, `first_name`, `last_name`, `start_date`, `end_date`, `basic`, `allowances`, `deductions`, `contact_number`, `address`, `email`, `resume`, `skills`, `user_name`, `password`, `status`) VALUES
(1, 2, 1, 'admin', 'last name', '2014-10-18 13:36:07', '2014-10-30 18:30:00', 10000, '', '', 8888999910, 'address', 'admin@gmail.com', '7102014143151-Status Report.docx', 'admin', 'admin', 'admin', 'Enable'),
(2, 1, 1, 'laxman', 'kolekar', '2014-11-08 12:02:51', '0000-00-00 00:00:00', 10000, '1,2', '1', 99993454545, 'wew adada', 'abs@gmail.com', '8102014124127-New Microsoft Office Word Document.docx', 'sds', 'employee', 'employee', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE IF NOT EXISTS `employment_type` (
`etid` int(11) NOT NULL,
  `employment_type` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`etid`, `employment_type`, `description`) VALUES
(1, 'Permanent', 'Permanent'),
(2, 'Contract', 'Contract');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
`lid` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`lid`, `leave_type_id`, `employee_id`, `start_date`, `end_date`, `days`, `status`) VALUES
(1, 2, 2, '2014-11-05', '2014-11-06', 1, 'Pending'),
(3, 2, 2, '2014-11-01', '2014-11-03', 2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `leave_plan`
--

CREATE TABLE IF NOT EXISTS `leave_plan` (
`lpid` int(11) NOT NULL,
  `leave_type` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leave_plan`
--

INSERT INTO `leave_plan` (`lpid`, `leave_type`, `description`) VALUES
(1, 'Vacation Leaves', 'Vacation Leaves'),
(2, 'Sick Leaves', 'Sick Leaves'),
(3, 'Compassionate Leaves', 'Compassionate Leaves');

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE IF NOT EXISTS `payslip` (
`pid` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payslip` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE IF NOT EXISTS `percentage` (
`pid` int(11) NOT NULL,
  `percentage` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`pid`, `percentage`) VALUES
(1, '0.10');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`pid` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `task_under_project` text NOT NULL,
  `bill_status` varchar(100) NOT NULL,
  `amount` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `project_name`, `client_name`, `task_under_project`, `bill_status`, `amount`) VALUES
(2, 'admin panel', 'devid', 'aa', 'Billable', '10000'),
(4, 'emp panel', 'cfdgd', 'fdgsdg', 'Non Billable', '');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`tkid` int(11) NOT NULL,
  `project_id` varchar(200) NOT NULL,
  `tast` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tkid`, `project_id`, `tast`) VALUES
(1, '2', 'database'),
(2, '2', 'ddggg');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
`tsid` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hrs` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `submit` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`tsid`, `employee_id`, `project_id`, `task_id`, `date`, `hrs`, `status`, `submit`, `created_on`) VALUES
(1, 2, 2, 1, '2014-11-03', '02:00', 'Rejected', 2, '2014-11-08 07:08:26'),
(2, 2, 2, 1, '2014-11-04', '02:10', 'Rejected', 2, '2014-11-08 07:08:26'),
(3, 2, 2, 1, '2014-11-05', '02:30', 'Rejected', 2, '2014-11-08 07:08:26'),
(4, 2, 2, 2, '2014-11-03', '02:00', 'Rejected', 2, '2014-11-08 07:08:26'),
(5, 2, 2, 2, '2014-11-04', '02:00', 'Rejected', 2, '2014-11-08 07:08:26'),
(6, 2, 2, 2, '2014-11-10', '02:00', 'Rejected', 2, '2014-11-08 12:25:42'),
(7, 2, 2, 2, '2014-11-11', '02:00', 'Rejected', 2, '2014-11-08 12:25:42'),
(8, 2, 2, 2, '2014-11-12', '02:00', 'Rejected', 2, '2014-11-08 12:25:42'),
(9, 2, 2, 2, '2014-11-13', '02:00', 'Rejected', 2, '2014-11-08 12:25:42'),
(10, 2, 2, 2, '2014-11-14', '02:00', 'Rejected', 2, '2014-11-08 12:25:42'),
(11, 2, 2, 1, '2014-11-17', '02:00', 'Rejected', 2, '2014-11-08 12:57:22'),
(12, 2, 2, 1, '2014-11-18', '02:00', 'Rejected', 2, '2014-11-08 12:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `timesheetapproval`
--

CREATE TABLE IF NOT EXISTS `timesheetapproval` (
`taid` int(11) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `timesheetapproval`
--

INSERT INTO `timesheetapproval` (`taid`, `date`, `employee_id`, `file`) VALUES
(2, '2014-11-12', 2, '10112014132320-new_hrm.docx');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
`utid` int(11) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`utid`, `user_type`, `description`) VALUES
(1, 'Employee', 'Employee'),
(2, 'Admin', 'Admin'),
(3, 'Approver', 'Approver'),
(4, 'Manager', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assignemployee`
--
ALTER TABLE `assignemployee`
 ADD PRIMARY KEY (`aid`), ADD KEY `app_emp_id` (`app_emp_id`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
 ADD PRIMARY KEY (`clmid`), ADD KEY `employee` (`employee`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
 ADD PRIMARY KEY (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`eid`), ADD KEY `user_type_id` (`user_type_id`), ADD KEY `employment_type_id` (`employment_type_id`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
 ADD PRIMARY KEY (`etid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
 ADD PRIMARY KEY (`lid`), ADD KEY `leave_type_id` (`leave_type_id`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `leave_plan`
--
ALTER TABLE `leave_plan`
 ADD PRIMARY KEY (`lpid`);

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
 ADD PRIMARY KEY (`pid`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`tkid`), ADD KEY `project_id` (`project_id`), ADD KEY `project_id_2` (`project_id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
 ADD PRIMARY KEY (`tsid`), ADD KEY `employee_id` (`employee_id`), ADD KEY `project_id` (`project_id`), ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `timesheetapproval`
--
ALTER TABLE `timesheetapproval`
 ADD PRIMARY KEY (`taid`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
 ADD PRIMARY KEY (`utid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assignemployee`
--
ALTER TABLE `assignemployee`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
MODIFY `clmid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
MODIFY `etid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_plan`
--
ALTER TABLE `leave_plan`
MODIFY `lpid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payslip`
--
ALTER TABLE `payslip`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `tkid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
MODIFY `tsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `timesheetapproval`
--
ALTER TABLE `timesheetapproval`
MODIFY `taid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `utid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignemployee`
--
ALTER TABLE `assignemployee`
ADD CONSTRAINT `assignemployee_ibfk_1` FOREIGN KEY (`app_emp_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `assignemployee_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`utid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`employment_type_id`) REFERENCES `employment_type` (`etid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_plan` (`lpid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `leaves_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payslip`
--
ALTER TABLE `payslip`
ADD CONSTRAINT `payslip_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timesheet`
--
ALTER TABLE `timesheet`
ADD CONSTRAINT `timesheet_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `timesheet_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `timesheet_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`tkid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timesheetapproval`
--
ALTER TABLE `timesheetapproval`
ADD CONSTRAINT `timesheetapproval_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
