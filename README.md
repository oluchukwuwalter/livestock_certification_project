# NAQS Portal – Nigeria Agricultural Quarantine System

## Overview
**NAQS Portal** is a web-based platform developed to digitize and streamline the Nigeria Agricultural Quarantine System.  
The portal connects exporters, service providers, and administrators to efficiently manage sanitary and phytosanitary certifications for plants, animals, and agricultural products, ensuring compliance with national and international regulations.

The portal automates user registration, certificate application, service provider selection, and tracking while providing help desk support, notifications, and secure authentication.

---

## Core Features

### 👤 User Registration & Authentication
- Exporters, service providers, and administrators can register and log in securely.
- Role-based access ensures appropriate permissions for each user type.
- Forgot password and account recovery functionality.

### 📄 Certificate Application & Tracking
- Users can submit applications for phytosanitary and veterinary certificates.
- Portal validates applications and assigns the relevant service providers automatically.
- Track application status in real time.

### 🏢 Service Provider Management
- Registered service providers can view and manage assigned tasks.
- Exporters are automatically linked to approved service providers based on application requirements.

### 💬 Help & Support
- In-built help desk with contact details and guidance for users.
- FAQs to provide quick support for common issues.
- Support ticket system to handle complaints and queries.

### 🔔 Notifications
- System alerts users about status updates, approvals, and pending actions.

### 📊 Dashboard
- Role-based dashboards for exporters, service providers, and administrators.
- View ongoing applications, certificate statuses, and completed tasks.

---

## System Workflow (High Level)

1. User registers as an exporter or service provider.
2. Exporter submits application for quarantine/certification.
3. System assigns appropriate service provider(s) based on requirements.
4. Service provider processes the request, updates milestones/status.
5. Exporter tracks application progress in the portal.
6. Notifications alert users about updates or required actions.
7. Certificate is issued once all compliance checks are completed.

---

## Database Schema Design (Simplified)

### Users Table
- `id` (PK)
- `first_name`
- `last_name`
- `email` (unique)
- `password`
- `role` (exporter | service_provider | admin)
- `created_at`
- `updated_at`

### Applications Table
- `id` (PK)
- `user_id` (FK -> users.id)
- `application_type` (phytosanitary | veterinary | other)
- `status` (pending | in_progress | approved | rejected)
- `assigned_service_provider` (FK -> users.id)
- `submitted_at`
- `updated_at`

### Service_Providers Table
- `id` (PK)
- `user_id` (FK -> users.id)
- `service_type`
- `contact_info`
- `assigned_applications_count`

### Messages Table
- `id` (PK)
- `sender_id` (FK -> users.id)
- `receiver_id` (FK -> users.id)
- `subject`
- `message_body`
- `is_read`
- `created_at`

---

## Technology Stack
- Backend: PHP / Laravel
- Frontend: HTML, CSS, JavaScript, Bootstrap
- Database: MySQL
- Authentication: Role-based access control
- Notifications: System-generated alerts

---

## Use Cases
- Digitizing agricultural quarantine processes
- Linking exporters with certified service providers
- Ensuring compliance with international phytosanitary and veterinary standards
- Streamlining application and certificate issuance workflow

---

## Future Enhancements
- Real-time messaging and notifications
- Mobile app integration for exporters and service providers
- Advanced reporting and analytics
- Integration with international trade compliance APIs

---

## Author
**Ugwueze Walter Oluchukwu**  
Web Developer  
oluchukwuwalter

---

## License
This project is developed for demonstration and portfolio purposes.
