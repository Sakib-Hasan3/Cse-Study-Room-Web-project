-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 06:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `answer`, `created_at`) VALUES
(1, 1, 1, 'gha', '2025-06-13 22:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `career_roadmap`
--

CREATE TABLE `career_roadmap` (
  `id` int(11) NOT NULL,
  `career_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `steps` text NOT NULL,
  `resources` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_roadmap`
--

INSERT INTO `career_roadmap` (`id`, `career_name`, `description`, `steps`, `resources`) VALUES
(1, 'Full Stack Developer', 'A Full Stack Developer works on both front-end and back-end of web applications.', 'Learn HTML, CSS, JavaScript\nMaster a front-end framework (React, Angular)\nLearn backend (Node.js, Express)\nUnderstand databases (MongoDB, SQL)\nBuild full projects\nDeploy using services like Netlify or Vercel', 'https://www.freecodecamp.org/learn/\nhttps://developer.mozilla.org/en-US/\nhttps://www.theodinproject.com/\nhttps://www.codecademy.com/learn/paths/full-stack-engineer-career-path'),
(2, 'Data Scientist', 'Data Scientists analyze large amounts of data to gain insights and solve problems.', 'Learn Python and libraries (NumPy, Pandas)\nStudy statistics and linear algebra\nExplore data visualization tools\nMaster machine learning basics\nWork on real-world datasets\nBuild a portfolio', 'https://www.kaggle.com/learn\nhttps://www.coursera.org/learn/what-is-datascience\nhttps://towardsdatascience.com/'),
(3, 'Mobile App Developer', 'Develop applications for iOS and Android using native or cross-platform tools.', 'Learn Java/Kotlin (Android) or Swift (iOS)\nUse cross-platform tools (Flutter, React Native)\nUnderstand mobile UI/UX principles\nCreate and publish mobile apps\nOptimize app performance', 'https://developer.android.com/courses\nhttps://flutter.dev/docs\nhttps://reactnative.dev/docs/getting-started'),
(4, 'Cybersecurity Analyst', 'Protect systems and networks from digital attacks and vulnerabilities.', 'Understand computer networks\nLearn about common vulnerabilities (OWASP)\nStudy cryptography and security tools\nGet certified (CompTIA Security+, CEH)\nPractice on platforms like TryHackMe or Hack The Box', 'https://tryhackme.com/\nhttps://www.hackthebox.com/\nhttps://owasp.org/\nhttps://www.coursera.org/specializations/cyber-security'),
(5, 'Machine Learning Engineer', 'Build intelligent systems that learn from data using algorithms and models.', 'Master Python and libraries (scikit-learn, TensorFlow)\nStudy supervised/unsupervised learning\nUnderstand model training and evaluation\nExplore deep learning (CNN, RNN)\nDeploy ML models', 'https://www.coursera.org/learn/machine-learning\nhttps://scikit-learn.org/\nhttps://www.tensorflow.org/tutorials'),
(6, 'DevOps Engineer', 'DevOps Engineers streamline the software development lifecycle by automating infrastructure and workflows.', 'Learn Linux basics\nUnderstand cloud services (AWS, Azure)\nLearn CI/CD tools (Jenkins, GitHub Actions)\nUse containerization (Docker)\nExplore orchestration (Kubernetes)\nMonitor and log systems', 'https://roadmap.sh/devops\nhttps://www.udemy.com/course/devops-project/\nhttps://docs.docker.com/\nhttps://kubernetes.io/docs/home/'),
(7, 'Game Developer', 'Design and build interactive video games across platforms.', 'Learn game engines (Unity, Unreal)\nMaster C# or C++\nUnderstand game physics and logic\nDesign game assets and UI\nBuild complete 2D/3D games\nPublish to platforms (Steam, mobile)', 'https://learn.unity.com/\nhttps://www.gamedev.tv/\nhttps://www.udemy.com/course/unrealcourse/'),
(8, 'Cloud Solutions Architect', 'Design scalable, secure, and cost-effective cloud architectures.', 'Understand cloud fundamentals (AWS, Azure, GCP)\nLearn about IaaS, PaaS, SaaS\nStudy system design principles\nExplore networking, storage, and security\nGet certified (AWS Solutions Architect)', 'https://aws.amazon.com/training/\nhttps://cloud.google.com/training\nhttps://azure.microsoft.com/en-us/training/'),
(9, 'Blockchain Developer', 'Develop decentralized applications using blockchain technologies.', 'Understand blockchain fundamentals\nLearn Solidity and Ethereum\nBuild smart contracts\nUse frameworks (Truffle, Hardhat)\nExplore DeFi and NFTs\nDeploy DApps', 'https://cryptozombies.io/\nhttps://ethereum.org/en/developers/\nhttps://soliditylang.org/'),
(10, 'UI/UX Designer', 'Design engaging and user-friendly digital interfaces.', 'Learn design principles and typography\nUse tools (Figma, Adobe XD)\nUnderstand user research and personas\nBuild wireframes and prototypes\nConduct usability testing', 'https://www.interaction-design.org/\nhttps://www.coursera.org/specializations/ui-ux-design\nhttps://www.figma.com/resources/learn-design/'),
(11, 'AI Researcher', 'Explore and develop new algorithms in Artificial Intelligence and Deep Learning.', 'Master linear algebra, calculus, and probability\nLearn Python and libraries (PyTorch, TensorFlow)\nStudy neural networks and NLP\nPublish papers or open-source code\nJoin AI research communities', 'https://www.deeplearning.ai/\nhttps://paperswithcode.com/\nhttps://arxiv.org/list/cs.AI/recent');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `correct_answer` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `difficulty` varchar(20) DEFAULT 'Easy',
  `attempted_by` int(11) DEFAULT 0,
  `option_a` text DEFAULT NULL,
  `option_b` text DEFAULT NULL,
  `option_c` text DEFAULT NULL,
  `option_d` text DEFAULT NULL,
  `type` enum('MCQ','Coding','Theory') DEFAULT 'Coding',
  `explanation` text DEFAULT NULL,
  `revealed_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `topic`, `question`, `correct_answer`, `category`, `difficulty`, `attempted_by`, `option_a`, `option_b`, `option_c`, `option_d`, `type`, `explanation`, `revealed_count`) VALUES
(2, 'Favourite Singer', NULL, 'Print the name of your favorite singer.', 'Any', 'Input/Output', 'Easy', 39386, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(3, 'Maximum borders', NULL, 'Find the maximum number of borders in a square pattern.', '10', 'Input/Output', 'Easy', 34643, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(4, 'Number of steps', NULL, 'Given N, print number of steps from 1 to N.', 'N', 'Input/Output', 'Medium', 33228, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(5, 'Bit Flip Counter', NULL, 'Count the minimum number of bit flips needed to make all 1s.', '2', 'Implementation', 'Medium', 12345, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(6, 'String Reversal', NULL, 'Reverse a given string.', 'gnirts', 'Implementation', 'Easy', 15400, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(7, 'Modulo Mastery', NULL, 'Find A mod B for given A and B.', '4', 'Operators', 'Easy', 18309, NULL, NULL, NULL, NULL, 'Coding', NULL, 2),
(8, 'Odd or Even', NULL, 'Check if a number is even.', 'Even', 'Operators', 'Easy', 20002, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(9, 'Bit Magic', NULL, 'Check if a number is power of two.', 'Yes', 'Bit Manipulation', 'Easy', 9000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(10, 'Factorial', NULL, 'Write a recursive function to compute factorial of N.', '120', 'Recursion', 'Easy', 24000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(11, 'Fibonacci', NULL, 'Print the N-th Fibonacci number using recursion.', '13', 'Recursion', 'Medium', 19700, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(12, 'Print Hello World', NULL, 'Print \"Hello World\" to standard output.', 'Hello World', 'Input/Output', 'Easy', 45000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(13, 'Echo Input', NULL, 'Take a number as input and print it.', '42', 'Input/Output', 'Easy', 39000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(14, 'Time Complexity Count', NULL, 'Count operations for a nested loop.', 'n^2', 'Complexity Analysis', 'Medium', 17000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(15, 'Big O Guess', NULL, 'Given code, guess Big O complexity.', 'O(nlogn)', 'Complexity Analysis', 'Hard', 12500, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(16, 'Palindrome Checker', NULL, 'Check if a string is a palindrome.', 'Yes', 'Implementation', 'Medium', 29800, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(17, 'Prime Filter', NULL, 'Filter prime numbers from a list.', '2 3 5 7', 'Implementation', 'Medium', 24100, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(18, 'Compare Two Numbers', NULL, 'Print the larger of two numbers.', 'B', 'Operators', 'Easy', 20400, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(19, 'Logical Test', NULL, 'Return true if both A and B are true.', 'True', 'Operators', 'Easy', 19000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(20, 'Count Set Bits', NULL, 'Count the number of 1s in binary representation.', '3', 'Bit Manipulation', 'Medium', 16800, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(21, 'Right Shift Test', NULL, 'Perform A >> 2 for A = 16.', '4', 'Bit Manipulation', 'Easy', 15900, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(22, 'GCD Recursive', NULL, 'Compute GCD of two numbers using recursion.', '6', 'Recursion', 'Medium', 17400, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(23, 'Tower of Hanoi', NULL, 'Minimum moves for n disks.', '7', 'Recursion', 'Hard', 12500, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(24, 'Area of Circle', NULL, 'Calculate area given radius.', '12.56', 'Math', 'Easy', 28700, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(25, 'LCM Finder', NULL, 'Find LCM of two integers.', '60', 'Math', 'Medium', 24500, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(26, 'Binary Search', NULL, 'Find target index in sorted array.', '3', 'Algorithms', 'Easy', 32000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(27, 'Merge Sort Steps', NULL, 'Count comparisons in merge sort.', '15', 'Algorithms', 'Hard', 14200, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(28, 'Stack Operations', NULL, 'Implement push and pop.', 'Valid', 'Data Structure', 'Easy', 26000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(29, 'Binary Tree Height', NULL, 'Find height of binary tree.', '3', 'Data Structure', 'Medium', 19000, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(30, 'Predict Output Shape', NULL, 'What is the shape after 2D convolution?', '28x28', 'Machine Learning', 'Medium', 15800, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(31, 'Overfitting Meaning', NULL, 'What is overfitting in ML?', 'High accuracy on training, low on test', 'Machine Learning', 'Easy', 17700, NULL, NULL, NULL, NULL, 'Coding', NULL, 0),
(32, 'Check Even Number', NULL, 'Write a function to check if a number is even.', 'Even', 'Operators', 'Easy', 0, NULL, NULL, NULL, NULL, 'Coding', 'Check if number % 2 == 0', 0),
(33, 'Print Hello', NULL, 'Print \"Hello World\" in your language.', 'Hello World', 'Input/Output', 'Easy', 0, NULL, NULL, NULL, NULL, 'Coding', 'Basic output', 0),
(34, 'Sum Two Numbers', NULL, 'Add two integers and return the result.', 'A + B', 'Math', 'Easy', 0, NULL, NULL, NULL, NULL, 'Coding', 'Basic arithmetic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `visibility` enum('public','admin-only') DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `provider`, `description`, `link`, `created_at`, `visibility`) VALUES
(1, 'Web Development Bootcamp', 'Udemy', 'Learn HTML, CSS, JavaScript, React, Node.js and more in this full-stack web dev course.', 'https://www.udemy.com/course/the-complete-web-development-bootcamp/', '2025-06-12 16:37:27', 'public'),
(2, 'Python for Data Science', 'Coursera', 'Master Python programming and data analysis with pandas, numpy, matplotlib, and more.', 'https://www.coursera.org/specializations/data-science-python', '2025-06-12 16:37:27', 'public'),
(3, 'Machine Learning by Andrew Ng', 'Coursera', 'Learn machine learning algorithms, linear regression, and neural networks with Andrew Ng.', 'https://www.coursera.org/learn/machine-learning', '2025-06-12 16:37:27', 'public'),
(4, 'Introduction to Cybersecurity', 'edX', 'Understand cybersecurity principles and defensive strategies for beginners.', 'https://www.edx.org/course/introduction-to-cybersecurity', '2025-06-12 16:37:27', 'public'),
(5, 'Mobile App Development with Flutter', 'Udemy', 'Build native Android and iOS apps using Google Flutter and Dart.', 'https://www.udemy.com/course/flutter-bootcamp-with-dart/', '2025-06-12 16:37:27', 'public'),
(6, 'SQL for Data Analysis', 'DataCamp', 'Learn how to analyze data using SQL queries and build reports efficiently.', 'https://www.datacamp.com/courses/sql-for-data-analysis', '2025-06-12 16:37:27', 'public'),
(8, 'Intro to Python', 'Coursera', 'Learn basic Python programming.', 'https://coursera.org/python', '2025-06-15 22:57:40', 'public'),
(9, 'Data Structures in C', 'Udemy', 'Master DS in C.', 'https://udemy.com/data-structures-c', '2025-06-15 22:57:40', 'public'),
(10, 'React for Beginners', 'edX', 'Learn ReactJS step by step.', 'https://edx.org/react-course', '2025-06-15 22:57:40', 'public');

--
-- Triggers `courses`
--
DELIMITER $$
CREATE TRIGGER `before_courses_update` BEFORE UPDATE ON `courses` FOR EACH ROW BEGIN
  INSERT INTO courses_history (
    course_id, old_title, new_title,
    old_description, new_description,
    action
  ) VALUES (
    OLD.id, OLD.title, NEW.title,
    OLD.description, NEW.description,
    'UPDATE'
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses_history`
--

CREATE TABLE `courses_history` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `old_title` varchar(255) DEFAULT NULL,
  `new_title` varchar(255) DEFAULT NULL,
  `old_description` text DEFAULT NULL,
  `new_description` text DEFAULT NULL,
  `action` enum('UPDATE','DELETE') DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `apply_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position`, `company`, `location`, `description`, `apply_link`, `created_at`) VALUES
(1, 'Software Intern', 'TechNova Ltd.', 'Dhaka', 'Learn real-world development in our summer program.', 'https://example.com/apply', '2025-06-13 03:25:25'),
(2, 'Junior Web Developer', 'Webify', 'Remote', 'Assist with frontend development projects.', 'https://example.com/webjob', '2025-06-13 03:25:25'),
(3, 'AI Research Assistant', 'AI Bangladesh', 'Chattogram', 'Support machine learning experiments and data collection.', 'https://example.com/ai-job', '2025-06-13 03:25:25'),
(4, 'Backend Developer', 'TechWave', 'Remote', 'Work on backend microservices.', 'https://techwave.com/careers', '2025-06-15 22:57:40'),
(5, 'QA Intern', 'Testly Inc.', 'Dhaka', 'Test web and mobile applications.', 'https://testly.com/intern', '2025-06-15 22:57:40'),
(6, 'Data Analyst', 'DataDrive', 'Chattogram', 'Analyze business data trends.', 'https://datadrive.com/jobs', '2025-06-15 22:57:40');

--
-- Triggers `jobs`
--
DELIMITER $$
CREATE TRIGGER `before_jobs_delete` BEFORE DELETE ON `jobs` FOR EACH ROW BEGIN
  INSERT INTO jobs_log (job_id, position, company, action, deleted_at)
  VALUES (OLD.id, OLD.position, OLD.company, 'DELETE', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `course_description` text DEFAULT NULL,
  `profile_link` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `full_name`, `designation`, `expertise`, `experience_years`, `course_name`, `course_description`, `profile_link`, `linkedin_url`, `photo`, `created_at`, `email`) VALUES
(1, 'John Doe', 'Senior Software Engineer', 'Web Development, PHP, MySQL', 8, 'Advanced Web Programming', 'Learn how to build dynamic websites with PHP and MySQL.', 'https://example.com/johndoe', 'https://linkedin.com/in/johndoe', 'john_doe.jpg', '2025-06-13 08:26:05', NULL),
(2, 'Jane Smith', 'Data Scientist', 'Data Science, Python, Machine Learning', 5, 'Introduction to Data Science', 'Basics of data analysis and machine learning with Python.', 'https://example.com/janesmith', 'https://linkedin.com/in/janesmith', 'jane_smith.jpg', '2025-06-13 08:26:05', NULL),
(3, 'Michael Lee', 'Mobile Developer Lead', 'Mobile App Development, Android', 7, 'Android Development', 'Create native Android apps using Java and Kotlin.', 'https://example.com/michaellee', 'https://linkedin.com/in/michaellee', 'michael_lee.jpg', '2025-06-13 08:26:05', NULL),
(4, 'Sara Ahmed', 'Cybersecurity Specialist', 'Cybersecurity, Network Security', 6, 'Fundamentals of Cybersecurity', 'Learn about protecting systems and networks.', 'https://example.com/saraahmed', 'https://linkedin.com/in/saraahmed', 'sara_ahmed.jpg', '2025-06-13 08:26:05', NULL),
(5, 'Sakib Hasan', NULL, NULL, NULL, 'Data Structures', NULL, NULL, NULL, NULL, '2025-06-13 18:29:44', 'sakib@example.com'),
(6, 'Shayak Tibra', NULL, NULL, NULL, 'Web Development', NULL, NULL, NULL, NULL, '2025-06-13 18:29:44', 'shayak@example.com'),
(7, 'Ariful Masum', NULL, NULL, NULL, 'Machine Learning', NULL, NULL, NULL, NULL, '2025-06-13 18:29:44', 'masum@example.com'),
(8, 'Dr. Emily Jones', 'Professor', 'Algorithms, Data Structures', 10, 'Data Structures Advanced', NULL, 'https://example.com/emily', NULL, NULL, '2025-06-15 16:57:40', NULL),
(9, 'Mr. Sam Carter', 'Senior Engineer', 'Frontend Development', 6, 'Modern React', NULL, 'https://example.com/sam', NULL, NULL, '2025-06-15 16:57:40', NULL),
(10, 'Lisa Ray', 'AI Specialist', 'Machine Learning, NLP', 8, 'ML with Python', NULL, 'https://example.com/lisa', NULL, NULL, '2025-06-15 16:57:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentorship_requests`
--

CREATE TABLE `mentorship_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `link`, `created_at`) VALUES
(1, 'New AI Research Breakthrough', 'Researchers at CSE Study Room have developed a new AI model that improves natural language understanding significantly. Stay tuned for more updates on this exciting progress!', 'https://example.com/ai-research', '2025-06-13 08:27:02'),
(2, 'Upcoming CSE Conference 2025', 'The annual CSE Conference will be held on March 10-12, 2025, featuring workshops, keynote speakers, and networking opportunities for students and professionals alike.', 'https://example.com/cse-conference-2025', '2025-06-13 08:27:02'),
(3, 'Cybersecurity Awareness Month', 'October is Cybersecurity Awareness Month. Join our free webinars and learn how to protect yourself from online threats and data breaches.', 'https://example.com/cybersecurity-awareness', '2025-06-13 08:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `user_id`, `content`, `created_at`) VALUES
(1, 3, 1, 'dkjsdk', '2025-06-14 19:14:19'),
(2, 3, 1, 'xyz', '2025-06-14 20:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `technologies`, `link`, `created_at`) VALUES
(1, 'Student Attendance System', 'A web-based attendance tracker using facial recognition and database logging.', 'Python, OpenCV, MySQL', 'https://github.com/yourusername/attendance-system', '2025-06-13 18:11:58'),
(2, 'Online Voting Platform', 'A secure online voting platform for university elections.', 'PHP, MySQL, Bootstrap', 'https://github.com/yourusername/online-voting', '2025-06-13 18:11:58'),
(3, 'Chat Application', 'Real-time chat app with user authentication and private messaging.', 'Node.js, Socket.io, MongoDB', 'https://github.com/yourusername/chat-app', '2025-06-13 18:11:58'),
(4, 'Portfolio Website', 'A personal portfolio website to showcase projects and resume.', 'HTML, CSS, JavaScript', 'https://yourusername.github.io/portfolio', '2025-06-13 18:11:58'),
(5, 'Weather Forecast App', 'Mobile-friendly app that provides weather forecasts based on location.', 'React, OpenWeather API', 'https://github.com/yourusername/weather-app', '2025-06-13 18:11:58'),
(6, 'Smart Attendance System', 'Uses face recognition to track attendance.', 'Python, OpenCV, Flask', 'https://github.com/example/attendance', '2025-06-15 16:57:40'),
(7, 'E-commerce Website', 'Full-stack web store with cart and admin panel.', 'PHP, MySQL, Bootstrap', 'https://github.com/example/shopapp', '2025-06-15 16:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `created_at`) VALUES
(1, 1, 'xyz', '2025-06-13 22:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `type`, `description`, `link`, `created_at`) VALUES
(1, 'Introduction to Algorithms', 'Book', 'A comprehensive textbook covering algorithms and data structures.', 'https://mitpress.mit.edu/books/introduction-algorithms-third-edition', '2025-06-13 08:30:14'),
(2, 'PHP Official Documentation', 'Website', 'The official PHP manual covering all PHP functions, examples, and best practices.', 'https://www.php.net/manual/en/', '2025-06-13 08:30:14'),
(3, 'Learn JavaScript', 'Tutorial', 'A beginner-friendly tutorial series to learn JavaScript programming.', 'https://www.learn-js.org/', '2025-06-13 08:30:14'),
(4, 'Linux Command Line Basics', 'Video', 'Video tutorial series explaining the basics of Linux command line usage.', 'https://www.youtube.com/playlist?list=PLS1QulWo1RIb9WVQGJ_vh-RQusbZgO_As', '2025-06-13 08:30:14'),
(5, 'Data Structures in C', 'Book', 'A practical guide on implementing data structures in C programming language.', 'https://www.goodreads.com/book/show/146957.Data_Structures_Using_C', '2025-06-13 08:30:14'),
(6, 'W3Schools HTML Guide', 'Website', 'Learn HTML basics and advanced.', 'https://w3schools.com/html', '2025-06-15 16:57:40'),
(7, 'Khan Academy Algorithms', 'Video', 'Learn core algorithm concepts.', 'https://khanacademy.org/algorithms', '2025-06-15 16:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `study_groups`
--

CREATE TABLE `study_groups` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `tip_text` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `tip_text`, `author`, `created_at`) VALUES
(1, 'Practice daily. Consistency beats intensity.', 'Arif', '2025-06-15 01:09:03'),
(2, 'Don’t memorize, understand the logic.', 'Sakib Hasan', '2025-06-15 01:09:03'),
(3, 'Break problems into smaller parts.', 'Das Tibra', '2025-06-15 01:09:03'),
(4, 'Take breaks. Refresh to focus better.', 'Productivity Coach', '2025-06-15 01:09:03'),
(5, 'Start with the basics. A strong foundation makes everything easier.', 'Md. Ariful Islam Masum', '2025-06-15 01:10:17'),
(6, 'Practice coding every day — even just 30 minutes matters.', 'Mohammed Sakib Hasan', '2025-06-15 01:10:17'),
(7, 'Break down complex problems into smaller, manageable steps.', 'Shayak Das Tibra', '2025-06-15 01:10:17'),
(8, 'Stay consistent, not perfect. Progress happens with small daily wins.', 'James Clear', '2025-06-15 01:10:17'),
(9, 'Ask questions. Learning accelerates when you\'re curious.', 'Sundar Pichai', '2025-06-15 01:10:17'),
(10, 'Teach what you learn. Explaining solidifies your understanding.', 'Khan Academy', '2025-06-15 01:10:17'),
(11, 'Use online platforms like LeetCode, HackerRank, and GitHub to sharpen skills.', 'Team River Rangers', '2025-06-15 01:10:17'),
(12, 'Don\'t be afraid to fail. Every mistake is part of the journey.', 'Elon Musk', '2025-06-15 01:10:17'),
(13, 'Take breaks. A rested mind works better than a tired one.', 'Study Coach', '2025-06-15 01:10:17'),
(14, 'Stay motivated by tracking your goals and celebrating progress.', 'Productivity Expert', '2025-06-15 01:10:17'),
(15, 'Practice solving problems daily.', 'Alice', '2025-06-15 22:57:40'),
(16, 'Use a whiteboard to brainstorm code logic.', 'Bob', '2025-06-15 22:57:40'),
(17, 'Start with small projects, then scale.', 'Charlie', '2025-06-15 22:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `created_at`, `user_id`) VALUES
(1, 'AI in Healthcare', 'Discuss the impact and future of AI in medical fields.', '2025-06-13 23:08:58', 1),
(2, 'xyz', '', '2025-06-14 19:12:05', 1),
(3, 'xyz', '', '2025-06-14 19:14:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'sakibnghs121@gmail.com', '$2y$10$IVmTW3WY2m3K5guf/WWXOuQY58h83l8iRUZjamqRYqAVE2BjaN9m.', 'student', '2025-06-10 23:16:37'),
(2, 'Arif Islam', 'password123', 'student', '2025-06-12 22:10:02'),
(3, 'qwe@gmail.com', '$2y$10$/lpRvtlupdjUSbo6aSk5QuYqHoNQ3E.B64VsHZNJ52/nFRV6la8wm', 'admin', '2025-06-10 23:24:07'),
(4, 'sakibnghs123@gmail.com', '$2y$10$a5DXpia3dgeCSXPvEsTjD.xks6nMacjcngGwLlo3Une4uM0kJ3uui', 'student', '2025-06-11 14:15:35'),
(5, 'abc@gmail.com', '$2y$10$73CY6Y0..70qOPvXlRhGA.lrC.GqzdUY4ZDckrRFU1ehVtVF5ax82', 'student', '2025-06-11 14:27:53'),
(6, 'sakib123@gmail.com', '$2y$10$g6OfZvzte.qEE5i/BUggO.0uEwdFzeTINYMYNcErEoYD6N1VdEoi6', 'admin', '2025-06-11 14:32:56'),
(7, 'bnm@gmail.com', '$2y$10$dcLFi1OYHrxiDvMqvsscMev3ITy9ERswkW1QRKpmNp0HqCVxW5X92', 'admin', '2025-06-12 10:34:02'),
(10, 'Sakib Hasan', 'password456', 'admin', '2025-06-12 22:10:02'),
(11, 'alice@example.com', 'hashed_password1', 'student', '2025-06-15 16:57:40'),
(12, 'bob@example.com', 'hashed_password2', 'admin', '2025-06-15 16:57:40'),
(13, 'charlie@example.com', 'hashed_password3', 'student', '2025-06-15 16:57:40');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_users_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
  INSERT INTO users_history (user_id, old_username, new_username, action)
  VALUES (OLD.id, OLD.username, NEW.username, 'UPDATE');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_history`
--

CREATE TABLE `users_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_username` varchar(100) DEFAULT NULL,
  `new_username` varchar(100) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` enum('UPDATE','DELETE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_attempts`
--

CREATE TABLE `user_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `user_answer` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `attempted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_attempts`
--

INSERT INTO `user_attempts` (`id`, `user_id`, `challenge_id`, `user_answer`, `is_correct`, `attempted_at`) VALUES
(1, 1, 8, 'shs', 0, '2025-06-15 15:46:07'),
(2, 1, 8, 'sgha', 0, '2025-06-15 15:46:16'),
(3, 1, 7, 'djds', 0, '2025-06-15 15:48:17'),
(4, 1, 7, 'sdjhds', 0, '2025-06-15 15:48:25'),
(5, 1, 7, 'sdjhds', 0, '2025-06-15 15:59:24'),
(6, 1, 7, 'sdjhds', 0, '2025-06-15 15:59:26'),
(7, 1, 7, 'sdjhds', 0, '2025-06-15 15:59:37'),
(8, 1, 7, 'sdjhds', 0, '2025-06-15 16:07:40'),
(9, 1, 7, 'sdjhds', 0, '2025-06-15 16:07:41'),
(10, 1, 7, 'dsk', 0, '2025-06-15 16:07:48'),
(11, 1, 7, 'dsk', 0, '2025-06-15 16:10:14'),
(12, 1, 1, 'Even', 1, '2025-06-15 16:57:40'),
(13, 1, 2, 'Hello', 0, '2025-06-15 16:57:40'),
(14, 2, 2, 'Hello World', 1, '2025-06-15 16:57:40'),
(15, 3, 3, 'A + B', 1, '2025-06-15 16:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `user_id` int(11) NOT NULL,
  `total_score` int(11) DEFAULT 0,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `career_roadmap`
--
ALTER TABLE `career_roadmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_history`
--
ALTER TABLE `courses_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_groups`
--
ALTER TABLE `study_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_history`
--
ALTER TABLE `users_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attempts`
--
ALTER TABLE `user_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_roadmap`
--
ALTER TABLE `career_roadmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses_history`
--
ALTER TABLE `courses_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `study_groups`
--
ALTER TABLE `study_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_history`
--
ALTER TABLE `users_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_attempts`
--
ALTER TABLE `user_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  ADD CONSTRAINT `mentorship_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mentorship_requests_ibfk_2` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `study_groups`
--
ALTER TABLE `study_groups`
  ADD CONSTRAINT `study_groups_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `study_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
