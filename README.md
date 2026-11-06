# University Management System

A web-based system for managing students, courses, lecturers and course registrations, built with **Laravel** and a relational database.

- **Administrators** manage students, courses, registrations and user access.
- **Lecturers** view the courses assigned to them and the students registered for each course.
- **Students** view the available courses, register for them and see their own registrations.

## Technology

| Part | Choice |
|---|---|
| Framework | Laravel 13 (PHP 8.3 or newer) |
| Database | SQLite by default, MySQL supported |
| Roles and permissions | `spatie/laravel-permission` |
| Front end | Blade templates, Tailwind CSS (CDN) and Lucide icons |

## Requirements

- PHP 8.3 or newer, with the `pdo_sqlite` extension (or `pdo_mysql` for MySQL)
- Composer
- An internet connection when viewing the pages (Tailwind CSS, Google Fonts and Lucide icons load from a CDN)

Node.js is **not** needed.

## Installation

1. **Get the code** and open the project folder.

   ```bash
   cd school
   ```

2. **Install the PHP packages.**

   ```bash
   composer install
   ```

3. **Create the environment file** and the application key.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set up the database** (see the next section), then create the tables and sample data.

   ```bash
   php artisan migrate --seed
   ```

5. **Start the server.**

   ```bash
   php artisan serve
   ```

6. Open **http://127.0.0.1:8000** in your browser.

## Database setup

### Option A: SQLite (default, nothing to install)

In `.env`:

```env
DB_CONNECTION=sqlite
```

Create the database file if it does not exist yet:

```bash
touch database/database.sqlite
```

### Option B: MySQL

1. Create an empty database, for example `university`.
2. In `.env`, set:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=university
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. Run `php artisan migrate --seed`.

### Resetting the data

```bash
php artisan migrate:fresh --seed
```

This drops every table, rebuilds them and loads the sample data again. Running only `php artisan db:seed` is also safe: the seeders use `updateOrCreate`, so they never create duplicate records.

### Database tables

| Table | Purpose |
|---|---|
| `users` | Login accounts |
| `roles`, `permissions` and the pivot tables | Roles and permissions (spatie package) |
| `lecturers` | Lecturer records, linked to a user account |
| `students` | Student records, linked to a user account |
| `courses` | Courses, each assigned to one lecturer |
| `course_registrations` | Which student is registered for which course, with a status |

Relationships:

- A lecturer **has many** courses; a course **belongs to** a lecturer.
- A student and a course are **many to many** through `course_registrations`.
- `course_registrations` has foreign keys to `students` and `courses` (deleted together with them) and a **unique index on `student_id` + `course_id`**, so a student can never register for the same course twice.

## User roles and permissions

| Role | Can do | Permissions |
|---|---|---|
| **Administrator** | Add, edit and delete students and courses; register students; approve or remove registrations | `manage students`, `manage lecturers`, `manage courses`, `manage registrations`, `manage users` |
| **Lecturer** | See only the courses assigned to them and the students registered for them | `view assigned courses`, `view course students` |
| **Student** | See all available courses, register for a course, see and drop their own registrations | `view available courses`, `view own registrations`, `register courses` |

Access is enforced three ways: route middleware (`auth`, `role:` and `permission:`), policies (a lecturer cannot open another lecturer's course; a student cannot drop someone else's registration) and menus and buttons that only appear when the user has the matching permission.

Student registrations start as **Pending** and an administrator approves them. Registration is refused when the student is already registered for the course or when the course is full.

## Sample login credentials

The password for every account is **`password`**. Change these before using the system anywhere real.

| Role | Email |
|---|---|
| Administrator | `admin@university.ac.ug` |
| Lecturer | `grace.nakato@university.ac.ug` |
| Lecturer | `ruth.achieng@university.ac.ug` |
| Lecturer | `peter.ssemwogerere@university.ac.ug` |
| Lecturer | `samuel.mugisha@university.ac.ug` |
| Student | `amina.kato@university.ac.ug` |
| Student | `brian.okello@university.ac.ug` |
| Student | `carol.namuli@university.ac.ug` |
| Student | `david.mugabi@university.ac.ug` |
| Student | `esther.atim@university.ac.ug` |
| Student | `felix.ochieng@university.ac.ug` |

Sign in at **/login**. Each user is sent to the dashboard for their role.

## Main pages

| Role | Pages |
|---|---|
| Administrator | `/admin/dashboard`, `/admin/students`, `/admin/courses`, `/admin/registrations` |
| Lecturer | `/lecturer/dashboard`, `/lecturer/courses`, `/lecturer/courses/{id}` |
| Student | `/student/dashboard`, `/student/courses`, `/student/registrations` |

## Screenshots

### Sign in
![Sign in](docs/screenshots/01-login.png)

### Administrator
![Admin dashboard](docs/screenshots/02-admin-dashboard.png)
![Students list](docs/screenshots/03-admin-students.png)
![Validation error on the add student form](docs/screenshots/04-student-validation.png)
![Courses list](docs/screenshots/05-admin-courses.png)
![Registrations list](docs/screenshots/06-admin-registrations.png)
![Duplicate registration error](docs/screenshots/07-duplicate-registration.png)

### Student
![Available courses](docs/screenshots/08-student-courses.png)
![My registrations](docs/screenshots/09-student-registrations.png)

### Lecturer
![My courses](docs/screenshots/10-lecturer-courses.png)
![Class list](docs/screenshots/11-lecturer-class-list.png)

### Access control
![403 when a student opens an admin page](docs/screenshots/12-forbidden.png)

## Project structure (main parts)

```
app/
├── Exceptions/RegistrationException.php
├── Http/Controllers/
│   ├── Auth/LoginController.php
│   ├── Admin/        (Dashboard, Student, Course, Registration)
│   ├── Lecturer/     (Dashboard, Course)
│   └── Student/      (Dashboard, Course, Registration)
├── Models/           (User, Student, Lecturer, Course, CourseRegistration)
├── Policies/         (CoursePolicy, CourseRegistrationPolicy)
└── Services/RegistrationService.php   (duplicate and capacity rules)
config/university.php                  (programmes, departments, statuses)
database/
├── migrations/
└── seeders/          (roles and permissions, users, lecturers, courses, students, registrations)
resources/views/      (layouts, components, auth, admin, lecturer, student)
routes/web.php
```
