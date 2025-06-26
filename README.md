# 💻 CSE Study Room – Web-Based Academic Portal

## 📘 Project Overview

**CSE Study Room** is a comprehensive educational platform tailored for Computer Science & Engineering students. It provides a centralized space for learning materials, student-teacher interaction, coding practice, mentorship opportunities, career support, and academic discussions.

Developed as part of the **System Analysis & Design course**, the project showcases complete full-stack web development with real-world use-case features integrated into a collaborative online environment.

---

## 🧾 Project Structure

```
.
├── db.php                  # Database connection file
├── index.php              # Landing/Home page
├── focus3.png             # Static asset

├── .vscode/               # VSCode config files (optional)

├── admin/                 # Admin panel for course and user management
│   ├── dashboard.php
│   ├── manage_courses.php
│   ├── manage_users.php
│   ├── upload_course.php
│   └── view_reports.php

├── assets/                # All static assets
│   ├── css/               # Stylesheets for different modules/pages
│   ├── images/            # All image resources used across pages
│   └── js/
│       └── html2pdf.bundle.min.js   # Used for PDF generation

├── auth/                  # User authentication system
│   ├── login.php
│   ├── logout.php
│   └── register.php

├── challenges/            # Coding practice zone
│   ├── attempt_challenges.php
│   └── coding_challenges.php

├── community/
│   └── community.php      # Community and group discussions

├── cv/                    # CV builder module
│   ├── cv_form.php
│   └── generate_cv.php

├── includes/              # Reusable includes (header/footer/nav/auth)
│   ├── auth_chechk.php
│   ├── footer.php
│   ├── header.php
│   └── nav.php

├── pages/                 # Main content sections
│   ├── add_course.php
│   ├── approve_request.php
│   ├── career.php
│   ├── courses.php
│   ├── dashboard.php
│   ├── jobs.php
│   ├── mentorship.php
│   ├── news.php
│   ├── projects.php
│   ├── resources.php
│   ├── study_groups.php
│   └── tips.php

└── questions/             # Q&A and forum-related features
    ├── answer_question.php
    ├── ask_questions.php
    ├── forum.php
    └── questions_list.php
```

---

## 🌟 Features

### 🎓 Study & Course Management
- View, upload, and approve CSE courses and resources.
- Admin and teacher control for organizing academic materials.

### 💬 Community & Forum
- Ask and answer questions within topic-specific forums.
- Participate in discussions and view question history.

### 💡 Coding Challenges
- Practice programming challenges directly within the site.
- Submit and review attempts for improvement.

### 🧑‍🏫 Mentorship Program
- Dedicated page for mentorship matching and resources.

### 💼 Career & CV Tools
- Build CVs directly on the platform.
- Career guidance and job-related updates.

### 📰 News & Tips
- Academic news board.
- Tips and tricks for academic and career excellence.

### 🔐 Authentication
- Register/login system with session management.
- Role-based access control for students and admins.

---

## 🛠️ Tech Stack

| Layer         | Technology                        |
|---------------|------------------------------------|
| Frontend      | HTML, CSS, JavaScript, Bootstrap   |
| Backend       | PHP                                |
| Database      | MySQL                              |
| File Handling | PDF Generation with html2pdf.js    |

---

## 🚀 Setup Instructions

1. Clone or download the repository.
2. Import the SQL file (if available) into your MySQL database.
3. Configure your `db.php` with local database credentials.
4. Run the project using a local server (XAMPP recommended).
5. Navigate to `localhost/your-project-folder/index.php`.

---

## 🔮 Future Enhancements

- ✅ Real-time notifications
- ✅ Admin analytics dashboard
- 📱 Mobile responsiveness
- 📤 Assignment uploads & grading
- 🧠 AI-based learning suggestions

---

## 👨‍💻 Developed By

*Mohammed Sakib Hasan*  
Department of Computer Science & Engineering  
[Patuakhali Science And Technology University]

---
🌐 Live Website: http://csezone.infinityfreeapp.com



> ⚠️ Note: For production deployment, implement input sanitization, password hashing, CSRF protection, and secure session handling.

